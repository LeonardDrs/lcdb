<?php

class AdminCustomersController extends AdminCustomersControllerCore
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->required_database = true;
		$this->required_fields = array('newsletter','optin');
		$this->table = 'customer';
		$this->className = 'Customer';
		$this->lang = false;
		$this->deleted = true;
		$this->explicitSelect = true;

		$this->context = Context::getContext();

		$this->default_form_language = $this->context->language->id;

		$genders = array();
		$genders_icon = array('default' => 'unknown.gif');
		foreach (Gender::getGenders() as $gender)
		{
			$gender_file = 'genders/'.$gender->id.'.jpg';
			if (file_exists(_PS_IMG_DIR_.$gender_file))
				$genders_icon[$gender->id] = '../'.$gender_file;
			else
				$genders_icon[$gender->id] = $gender->name;
			$genders[$gender->id] = $gender->name;
		}

		$this->_select = '
		a.date_add,
		IF (YEAR(`birthday`) = 0, "-", (YEAR(CURRENT_DATE)-YEAR(`birthday`)) - (RIGHT(CURRENT_DATE, 5) < RIGHT(birthday, 5))) AS `age`, (
			SELECT c.date_add FROM '._DB_PREFIX_.'guest g
			LEFT JOIN '._DB_PREFIX_.'connections c ON c.id_guest = g.id_guest
			WHERE g.id_customer = a.id_customer
			ORDER BY c.date_add DESC
			LIMIT 1
		) as connect, (SELECT rp.id_sponsor FROM '._DB_PREFIX_.'referralprogram rp WHERE
		rp.id_sponsor=a.id_customer and rp.id_customer!=0 group by  rp.id_sponsor) as godfather';
		$this->fields_list = array(
			'id_customer' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'width' => 20
			),
			'id_gender' => array(
				'title' => $this->l('Titles'),
				'width' => 70,
				'align' => 'center',
				'icon' => $genders_icon,
				'orderby' => false,
				'type' => 'select',
				'list' => $genders,
				'filter_key' => 'a!id_gender',
			),
			'lastname' => array(
				'title' => $this->l('Last Name'),
				'width' => 'auto'
			),
			'firstname' => array(
				'title' => $this->l('First name'),
				'width' => 'auto'
			),
			'email' => array(
				'title' => $this->l('E-mail address'),
				'width' => 140,
			),
			'email' => array(
				'title' => $this->l('Group'),
				'width' => 140,
			),
			'email' => array(
				'title' => $this->l('Subscription'),
				'width' => 140,
			),
			'email' => array(
				'title' => $this->l('Commandes Faites'),
				'width' => 140,
			),
			'email' => array(
				'title' => $this->l('Commandes à venir'),
				'width' => 140,
			),
			'email' => array(
				'title' => $this->l('memo'),
				'width' => 140,
			),
			'active' => array(
				'title' => $this->l('Enabled'),
				'width' => 70,
				'align' => 'center',
				'active' => 'status',
				'type' => 'bool',
				'orderby' => false,
				'filter_key' => 'a!active',
			),
			'date_add' => array(
				'title' => $this->l('Registration'),
				'width' => 150,
				'type' => 'date',
				'align' => 'right'
			),
			'connect' => array(
				'title' => $this->l('Last visit'),
				'width' => 100,
				'type' => 'datetime',
				'search' => false,
				'havingFilter' => true
			)
		);

	}
	
	public function initContent()
	{
		
		if ($this->action == 'select_delete')
			$this->context->smarty->assign(array(
				'delete_form' => true,
				'url_delete' => htmlentities($_SERVER['REQUEST_URI']),
				'boxes' => $this->boxes,
			));

		if (!$this->can_add_customer && !$this->display)
			$this->informations[] = $this->l('You have to select a shop if you want to create a customer');

		parent::initContent();
	}
	
	public function initToolbar()
	{
		parent::initToolbar();
		if (!$this->can_add_customer)
			unset($this->toolbar_btn['new']);
		else if (!$this->display) //display import button only on listing
		{
			$this->toolbar_btn['import'] = array(
				'href' => $this->context->link->getAdminLink('AdminImport', true).'&import_type='.$this->table,
				'desc' => $this->l('Import')
			);
			$this->toolbar_btn['export'] = array(
				'href' => self::$currentIndex.'&amp;export=true&amp;token='.$this->token,
				'desc' => $this->l('Export')
			);
		}
	}
	
	public function renderList()
	{
		if (!($this->fields_list && is_array($this->fields_list)))
			return false;
		$this->getList($this->context->language->id);
		
		// Empty list is ok
		if (!is_array($this->_list))
			return false;

		$helper = new HelperList();

		$this->setHelperDisplay($helper);
		$helper->tpl_vars = $this->tpl_list_vars;
		$helper->tpl_delete_link_vars = $this->tpl_delete_link_vars;

		// For compatibility reasons, we have to check standard actions in class attributes
		foreach ($this->actions_available as $action)
		{
			if (!in_array($action, $this->actions) && isset($this->$action) && $this->$action)
				$this->actions[] = $action;
		}

		$list = $helper->generateList($this->_list, $this->fields_list);
		
		// if($_GET['export']==true){
		// 	echo "<pre>";
		// 		print_r($this->_list);
		// 	echo "</pre>";
		// 	
		// 	// define('CSV_SEPERATOR',';');
		// 	// define('CSV_PATH','\\');
		// 	// define('CSV_FILENAME','results.csv');
		// 	// 
		// 	// $records = array (array('aaa','bbb','ccc','dddd'), 
		// 	// 	array('123','456','789'),
		// 	// 	array('"test1"', '"test2"', '"test3"')
		// 	// 	);
		// 	// 
		// 	// $fileName = $_SERVER['DOCUMENT_ROOT'] . CSV_PATH . CSV_FILENAME;                 
		// 	// $this->WriteCsv($fileName,';',$records);                 
		// 	// 
		// 	// echo '<a href="' . CSV_PATH . CSV_FILENAME . '" target="_blanc">CSV File</a>';
		// }
		
		return $list;
	}
	

	function fputcsv(&$handle, $fields = array(), $delimiter = ';', $enclosure = '"') 
	{
		$str = '';
		$escape_char = '\\';
		foreach ($fields as $value) 
		{
			if (strpos($value, $delimiter) !== false ||
				strpos($value, $enclosure) !== false ||
				strpos($value, "\n") !== false ||
				strpos($value, "\r") !== false ||
				strpos($value, "\t") !== false ||
				strpos($value, ' ') !== false) 
			{
				$str2 = $enclosure;
				$escaped = 0;
				$len = strlen($value);
				for ($i=0;$i<$len;$i++) 
				{
					if ($value[$i] == $escape_char) 
						$escaped = 1;
					else if (!$escaped && $value[$i] == $enclosure) 
						$str2 .= $enclosure;
					else 
						$escaped = 0;
					$str2 .= $value[$i];
				}
				$str2 .= $enclosure;
				$str .= $str2.$delimiter;
			} 
			else 
				$str .= $value.$delimiter;
		}
		$str = substr($str,0,-1);
		$str .= "\n";
		return fwrite($handle, $str);
	}

	function WriteCsv($fileName, $delimiter = ';', $records)
	{

		$result = array();
		foreach($records as $key => $value)
			$results[] = implode($delimiter, $value);
		$fp = fopen($fileName, 'w');
		foreach ($results as $result) 
			$this->fputcsv($fp, split($delimiter, $result));
		fclose($fp);
	}

}

