<?php

class AdminOrdersExportController extends AdminProductsControllerCore
{
	
	public function __construct()
	{

		parent::__construct();

		$this->addRowAction('view');

		// masquer les produits qui n'ont pas de commande 
		// filtrer selon un etat de commande
		// le nombre de produits total est faux

		// rajouter une date de filtre 

		// faire la fonction d'export
		// afficher les declinaisons par nombre +labels

		// faire pour que la page produit soit rediriger sur product

		// verifier le bon fonctionnement de la pagination
		
		

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
				LEFT JOIN '._DB_PREFIX_.'orders o ON o.id_order = od.id_order
				WHERE od.product_id = a.id_product AND o.valid=0) as orderNumber,
			(SELECT GROUP_CONCAT(distinct od.product_attribute_id SEPARATOR " | ") FROM `'._DB_PREFIX_.'order_detail` od
				WHERE od.product_id = a.id_product) as attribute';
	
			
		$this->fields_list = array();
		$this->fields_list['id_product'] = array(
			'title' => $this->l('ID Produit'),
			'align' => 'center',
			'width' => 20
		);
		$this->fields_list['name'] = array(
			'title' => $this->l('Name'),
			'filter_key' => 'b!name',
			'width' => "auto"
		);
		$this->fields_list['orderNumber'] = array(
			'title' => $this->l('Quantité achetée'),
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
		$this->fields_list['date_add'] = array(
			'title' => $this->l('Date'),
			'width' => 150,
			'align' => 'right',
			'type' => 'datetime',
			'filter_key' => 'a!date_add'
		);
	}

	public function initToolbar()
	{
		parent::initToolbar();
		if (!$this->display)
		{
			unset($this->toolbar_btn['import']);

			$this->toolbar_btn['export-csv-orders'] = array(
				'short' => 'Exporter Orders',
				'href' => $this->context->link->getAdminLink('AdminOrdersExport').'&amp;csv_orders',
				'desc' => $this->l('Exporter'),
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

		$helper->listTotal = count($new_list);
		$list = $helper->generateList($new_list, $this->fields_list);

		if (Tools::isSubmit('csv_orders'))
		{
			if (count($this->_list) > 0){
				$this->renderCSV($new_list);
				die;
			}else{
				$this->displayWarning($this->l('There is nothing to export as a CSV.'));
			}
		}
		
		return $list;
	}

	protected function renderCSV($list)
	{
		$ids = array();
		foreach ($list as $entry)
			$ids[] = $entry['id_product'];

		if (count($ids) <= 0)
			return;

		$id_lang = Context::getContext()->language->id;
		$products = new Collection('Product', $id_lang);
		$products->where('id_product', 'in', $ids);
		$products->getAll();

		// echo "<pre>";
		// print_r($products[]);
		// echo "</pre>";
		// die();

		$csv = new CSV($products, $this->l('commandes'));
		$csv->export();
	}

}

