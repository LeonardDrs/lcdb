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
		) as connect,
		(SELECT GROUP_CONCAT(distinct gl.name SEPARATOR " | ") FROM `'._DB_PREFIX_.'group_lang` gl
		LEFT JOIN '._DB_PREFIX_.'customer_group cg ON gl.id_group = cg.id_group
		WHERE cg.id_customer = a.id_customer) as userGroup,
		(SELECT count(o.id_order) FROM `'._DB_PREFIX_.'orders` o
		WHERE o.id_customer = a.id_customer) as orderDone,
		a.note as memo';


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
				'width' => 100
			),
			'firstname' => array(
				'title' => $this->l('First name'),
				'width' => 100
			),
			'email' => array(
				'title' => $this->l('E-mail address'),
				'width' => 140,
			),
			'userGroup' => array(
				'title' => $this->l('Group'),
				'width' => "auto",
				'havingFilter' => true
			),
			'orderDone' => array(
				'title' => $this->l('Commandes'),
				'width' => 60,
			),
			// 'orderNext' => array(
			// 	'title' => $this->l('Commandes à venir'),
			// 	'width' => 140,
			// ),
			'memo' => array(
				'title' => $this->l('memo'),
				'width' => 'auto',
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

}

