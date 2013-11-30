<?php

class AdminOrdersController extends AdminOrdersControllerCore
{
	public function __construct()
	{
		
		parent::__construct();

		$this->_select = '
		a.id_currency,
		a.id_order AS id_pdf,
		(SELECT ad.postcode FROM `'._DB_PREFIX_.'address` ad WHERE ad.id_address = a.id_address_delivery) AS zip,
		CONCAT(LEFT(c.`firstname`, 1), \'. \', c.`lastname`) AS `customer`,
		osl.`name` AS `osname`,
		os.`color`,
		IF((SELECT COUNT(so.id_order) FROM `'._DB_PREFIX_.'orders` so WHERE so.id_customer = a.id_customer) > 1, 0, 1) as new';
		
		$statuses_array = array();
		$statuses = OrderState::getOrderStates((int)$this->context->language->id);

		foreach ($statuses as $status)
			$statuses_array[$status['id_order_state']] = $status['name'];

		$this->fields_list = array(
		'id_order' => array(
			'title' => $this->l('ID'),
			'align' => 'center',
			'width' => 25
		),
		'reference' => array(
			'title' => $this->l('Reference'),
			'align' => 'center',
			'width' => 65
		),
		'customer' => array(
			'title' => $this->l('Customer'),
			'havingFilter' => true,
		),
		'payment' => array(
			'title' => $this->l('Payment'),
			'width' => 100
		),
		'osname' => array(
			'title' => $this->l('Status'),
			'color' => 'color',
			'width' => 280,
			'type' => 'select',
			'list' => $statuses_array,
			'filter_key' => 'os!id_order_state',
			'filter_type' => 'int'
		),
		'zip' => array(
			'title' => $this->l('Arrondissement / Ville'),
			'align' => 'center',
			'width' => 100,
			'havingFilter' => true
		),
		'total_paid_tax_incl' => array(
			'title' => $this->l('Total'),
			'width' => 70,
			'align' => 'right',
			'prefix' => '<b>',
			'suffix' => '</b>',
			'type' => 'price',
			'currency' => true
		),
		// 'date_asdd' => array(
		// 	'title' => $this->l('Date delivery'),
		// 	'width' => 150,
		// 	'align' => 'right',
		// 	'type' => 'datetime',
		// 	'filter_key' => 'a!date_add'
		// ),
		'date_add' => array(
			'title' => $this->l('Date'),
			'width' => 150,
			'align' => 'right',
			'type' => 'datetime',
			'filter_key' => 'a!date_add'
		),
		'id_pdf' => array(
			'title' => $this->l('PDF'),
			'width' => 50,
			'align' => 'center',
			'callback' => 'printPDFIcons',
			'orderby' => false,
			'search' => false,
			'remove_onclick' => true)
		);

	}
	
	public function renderList()
	{
		if (!($this->fields_list && is_array($this->fields_list)))
			return false;

		$this->getList($this->context->language->id);

		// Empty list is ok
		if (!is_array($this->_list))
			return false;

		// export
		if (Tools::isSubmit('csv_orders'))
		{
			if (count($this->_list) > 0)
			{
				$this->renderCSV();
				die;
			}
		}

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

		$totalOrders = count($this->_list);
		$totalAmount = 0;

		echo "<pre>";
			print_r($this->_list);
		echo "</pre>";

		foreach ($this->_list as $key => $order){
			$totalAmount += $order['total_paid_tax_incl'];
		}

		$cartAverage = $totalAmount/$totalOrders;

		$this->context->smarty->assign(array(
			"totalOrders" => $totalOrders,
			"totalAmount" => $totalAmount,
			"cartAverage" => $cartAverage
		)); 


		$list = $helper->generateList($this->_list, $this->fields_list);
		
		return $list;
	}

	public function initToolbar()
	{

		parent::initToolbar();

		if (!$this->display)
		{
			$this->toolbar_btn['export'] = array(
				'href' => $this->context->link->getAdminLink('AdminOrders').'&amp;csv_orders',
				'desc' => $this->l('Export products')
			);
		}

	}

	protected function renderCSV()
	{
		// $ids = array();
		// foreach ($list as $entry)
		// 	$ids[] = $entry['id_product'];

		// if (count($ids) <= 0)
		// 	return;

		// $id_lang = Context::getContext()->language->id;
		// $products = new Collection('Product', $id_lang);
		// $products->where('id_product', 'in', $ids);
		// $products->getAll();

		// $csv = new CSV($products, $this->l('commandes'));
		// $csv->export();



		// exports orders
		// if (Tools::isSubmit('csv_orders'))
		// {
		// 	$ids = array();
		// 	foreach ($this->_list as $entry)
		// 		$ids[] = $entry['id_supply_order'];

		// 	if (count($ids) <= 0)
		// 		return;

		// 	$id_lang = Context::getContext()->language->id;
		// 	$orders = new Collection('SupplyOrder', $id_lang);
		// 	$orders->where('is_template', '=', false);
		// 	$orders->where('id_supply_order', 'in', $ids);
		// 	$id_warehouse = $this->getCurrentWarehouse();
		// 	if ($id_warehouse != -1)
		// 		$orders->where('id_warehouse', '=', $id_warehouse);
		// 	$orders->getAll();
		// 	$csv = new CSV($orders, $this->l('supply_orders'));
  //   		$csv->export();
		// }

		// exports details for all orders
		if (Tools::isSubmit('csv_orders'))
		{

			// header
			// header('Content-type: text/csv');
			// header('Content-Type: application/force-download; charset=UTF-8');
			// header('Cache-Control: no-store, no-cache');
   //      	header('Content-disposition: attachment; filename="'.$this->l('orders_products').'.csv"');

        	// echoes details
			$ids = array();
			foreach ($this->_list as $entry)
				$ids[] = $entry['id_order'];


			if (count($ids) <= 0)
				return;

			// for each supply order
			// $keys = array('id_product', 'id_product_attribute', 'reference', 'supplier_reference', 'ean13', 'upc', 'name',
			// 			  'unit_price_te', 'quantity_expected', 'quantity_received', 'price_te', 'discount_rate', 'discount_value_te',
			// 			  'price_with_discount_te', 'tax_rate', 'tax_value', 'price_ti', 'tax_value_with_order_discount',
			// 			  'price_with_order_discount_te', 'id_supply_order');

			// type de viande, label, nombre de pièce et poids, quantité
			$keys = array('id_product', 'reference', 'name');
			echo sprintf("%s\n", implode(';', array_map(array('CSVCore', 'wrap'), $keys)));

			// overrides keys (in order to add FORMAT calls)
			// $keys = array('p.id_product', 'p.reference', 'p.name',
			// 			  'FORMAT(p.unit_price_te, 2)', 'p.quantity_expected', 'p.quantity_received', 'FORMAT(p.price_te, 2)',
			// 			  'FORMAT(p.discount_rate, 2)', 'FORMAT(p.discount_value_te, 2)',
			// 			  'FORMAT(p.price_with_discount_te, 2)', 'FORMAT(p.tax_rate, 2)', 'FORMAT(p.tax_value, 2)',
			// 			  'FORMAT(p.price_ti, 2)', 'FORMAT(p.tax_value_with_order_discount, 2)',
			// 			  'FORMAT(p.price_with_order_discount_te, 2)');
			$number = "";
			$keys = array('p.id_product', 'p.reference', 'pl.name');

			foreach ($ids as $id)
			{
				$query = new DbQuery();
				$query->select(implode(', ', $keys));
				$query->from('product', 'p');
				$query->leftJoin('order_detail', 'od', 'p.id_product = od.product_id');
				$query->leftJoin('orders', 'o', 'o.id_order = od.id_order');
				$query->leftJoin('product_lang', 'pl', 'p.id_product = pl.id_product', 'id_lang=1');
				// $id_warehouse = $this->getCurrentWarehouse();
				// if ($id_warehouse != -1)
				// $query->where('so.id_warehouse = '.(int)$id_warehouse);
				$query->where('o.id_order = '.(int)$id);
				// $query->orderBy('p.id_supply_order_detail DESC');
				$resource = Db::getInstance()->query($query);
				// gets details
				while ($row = Db::getInstance()->nextRow($resource)){
					echo sprintf("%s\n", implode(';', array_map(array('CSVCore', 'wrap'), $row)));
					echo "<br/>";
				}

			}

		}

	}

}

