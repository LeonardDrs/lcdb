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
	
	public function initToolbar()
	{
		if ($this->display == 'view')
		{
			$order = new Order((int)Tools::getValue('id_order'));
			if ($order->hasBeenShipped())
				$type = $this->l('Return products');
			elseif ($order->hasBeenPaid())
				$type = $this->l('Standard refund');
			else
				$type = $this->l('Cancel products');

			if (!$order->hasBeenShipped() && !$this->lite_display)
				$this->toolbar_btn['new'] = array(
					'short' => 'Create',
					'href' => '#',
					'desc' => $this->l('Add a product'),
					'class' => 'add_product'
				);

			if (Configuration::get('PS_ORDER_RETURN') && !$this->lite_display)
				$this->toolbar_btn['standard_refund'] = array(
					'short' => 'Create',
					'href' => '',
					'desc' => $type,
					'class' => 'process-icon-standardRefund'
				);
			
			if ($order->hasInvoice() && !$this->lite_display)
				$this->toolbar_btn['partial_refund'] = array(
					'short' => 'Create',
					'href' => '',
					'desc' => $this->l('Partial refund'),
					'class' => 'process-icon-partialRefund'
				);
		}
		else if (!$this->display) //display import button only on listing
		{
			$this->toolbar_btn['export'] = array(
				'href' => self::$currentIndex.'&amp;export=true&amp;token='.$this->token,
				'desc' => $this->l('Export')
			);
		}
		
		$res = parent::initToolbar();
		if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP && isset($this->toolbar_btn['new']) && Shop::isFeatureActive())
			unset($this->toolbar_btn['new']);
		return $res;
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
		
		return $list;
	}
}

