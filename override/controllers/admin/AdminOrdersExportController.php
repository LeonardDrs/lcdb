<?php

class AdminOrdersExportController extends AdminProductsControllerCore
{
	
	public function __construct()
	{

		parent::__construct();

		// masquer les produits qui n'ont pas de commande 
		// afficher les declinaisons 

		// le nombre de produits total est faux
		// faire la fonction d'export 
		// rajouter une date de filtre -> compliqué (ou selon un etat de commande)
		// faire pour que la page produit soit rediriger sur product
		
		

		$this->_select .= ',
			(SELECT fvl.value FROM `'._DB_PREFIX_.'feature_value_lang` fvl
				LEFT JOIN '._DB_PREFIX_.'feature_product fp ON fvl.id_feature_value = fp.id_feature_value
				WHERE fp.id_product = a.id_product AND fp.id_feature=12 AND fvl.id_lang=1) as label_rouge,
			(SELECT fvl.value FROM `'._DB_PREFIX_.'feature_value_lang` fvl
				LEFT JOIN '._DB_PREFIX_.'feature_product fp ON fvl.id_feature_value = fp.id_feature_value
				WHERE fp.id_product = a.id_product AND fp.id_feature=11 AND fvl.id_lang=1) as label_bio,
			(SELECT fvl.value FROM `'._DB_PREFIX_.'feature_value_lang` fvl
				LEFT JOIN '._DB_PREFIX_.'feature_product fp ON fvl.id_feature_value = fp.id_feature_value
				WHERE fp.id_product = a.id_product AND fp.id_feature=7 AND fvl.id_lang=1) as count,
			(SELECT fvl.value FROM `'._DB_PREFIX_.'feature_value_lang` fvl
				LEFT JOIN '._DB_PREFIX_.'feature_product fp ON fvl.id_feature_value = fp.id_feature_value
				WHERE fp.id_product = a.id_product AND fp.id_feature=13 AND fvl.id_lang=1) as weight,
			(SELECT sum(od.product_quantity) FROM `'._DB_PREFIX_.'order_detail` od
				WHERE od.product_id = a.id_product) as orderNumber,
			(SELECT GROUP_CONCAT(distinct od.product_attribute_id SEPARATOR " | ") FROM `'._DB_PREFIX_.'order_detail` od
				WHERE od.product_id = a.id_product) as attribute';
	
			
		$this->fields_list = array();
		$this->fields_list['id_product'] = array(
			'title' => $this->l('ID'),
			'align' => 'center',
			'width' => 20
		);
		$this->fields_list['name'] = array(
			'title' => $this->l('Name'),
			'filter_key' => 'b!name',
			'width' => "auto"
		);
		$this->fields_list['orderNumber'] = array(
			'title' => $this->l('Quantité'),
			'width' => 90,
			'havingFilter' => true
		);
		$this->fields_list['attribute'] = array(
			'title' => $this->l('Déclinaison'),
			'width' => 90,
			'havingFilter' => true
		);
		$this->fields_list['label_bio'] = array(
			'title' => $this->l('Label Bio'),
			'width' => 60,
			'havingFilter' => true
		);
		$this->fields_list['label_rouge'] = array(
			'title' => $this->l('Label Rouge'),
			'width' => 60,
			'havingFilter' => true
		);
		$this->fields_list['count'] = array(
			'title' => $this->l('Personnes'),
			'width' => 60,
			'havingFilter' => true
		);
		$this->fields_list['weight'] = array(
			'title' => $this->l('Poids'),
			'width' => 60,
			'havingFilter' => true
		);
		if ((int)Tools::getValue('id_category'))
			$this->fields_list['position'] = array(
				'title' => $this->l('Position'),
				'width' => 70,
				'filter_key' => 'cp!position',
				'align' => 'center',
				'position' => 'position'
			);
	}

	public function initToolbar()
	{
		parent::initToolbar();
		if (!$this->display) //display import button only on listing
		{
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

		$new_list = Array();

		foreach ($this->_list as $key => $product) {
			if(isset($product['orderNumber']) && ($product['orderNumber'] > 0)){
				$new_list[] = $product;
			}
		}

		$list = $helper->generateList($new_list, $this->fields_list);
		
		return $list;
	}

	// public function getList($id_lang, $orderBy = null, $orderWay = null, $start = 0, $limit = null, $id_lang_shop = null)
	// {
	// 	$orderByPriceFinal = (empty($orderBy) ? ($this->context->cookie->__get($this->table.'Orderby') ? $this->context->cookie->__get($this->table.'Orderby') : 'id_'.$this->table) : $orderBy);
	// 	$orderWayPriceFinal = (empty($orderWay) ? ($this->context->cookie->__get($this->table.'Orderway') ? $this->context->cookie->__get($this->table.'Orderby') : 'ASC') : $orderWay);
	// 	if ($orderByPriceFinal == 'price_final')
	// 	{
	// 		$orderBy = 'id_'.$this->table;
	// 		$orderWay = 'ASC';
	// 	}
	// 	parent::getList($id_lang, $orderBy, $orderWay, $start, $limit, $this->context->shop->id);

	// 	/* update product quantity with attributes ...*/
	// 	$nb = count($this->_list);
	// 	if ($this->_list)
	// 	{
	// 		/* update product final price */
	// 		for ($i = 0; $i < $nb; $i++)
	// 		{
	// 			// convert price with the currency from context
	// 			$this->_list[$i]['price'] = Tools::convertPrice($this->_list[$i]['price'], $this->context->currency, true, $this->context);
	// 			$this->_list[$i]['price_tmp'] = Product::getPriceStatic($this->_list[$i]['id_product'], true, null, 2, null, false, true, 1, true);
	// 		}
	// 	}

	// 	if ($orderByPriceFinal == 'price_final')
	// 	{
	// 		if (strtolower($orderWayPriceFinal) == 'desc')
	// 			uasort($this->_list, 'cmpPriceDesc');
	// 		else
	// 			uasort($this->_list, 'cmpPriceAsc');
	// 	}
	// 	for ($i = 0; $this->_list && $i < $nb; $i++)
	// 	{
	// 		$this->_list[$i]['price_final'] = $this->_list[$i]['price_tmp'];
	// 		unset($this->_list[$i]['price_tmp']);
	// 	}
	// }

}

