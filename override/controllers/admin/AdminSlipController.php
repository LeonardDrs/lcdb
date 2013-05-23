<?php

class AdminSlipController extends AdminSlipControllerCore
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_select = '
			a.amount as price,
			CONCAT(LEFT(c.`firstname`, 1), \'. \', c.`lastname`) AS `customer`
		';

		$this->_join = '
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = a.`id_customer`) 
		LEFT JOIN `'._DB_PREFIX_.'customer_group` cg ON (cg.`id_customer` = a.`id_customer`)
		LEFT JOIN `'._DB_PREFIX_.'group_lang` gl ON (gl.`id_group` = cg.`id_group` AND gl.`id_lang` = '.(int)$this->context->language->id.')
		';
		
		$this->fields_list = array(
			'id_order_slip' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'width' => 25
 			),
			'customer' => array(
				'title' => $this->l("Customer's name"),
				'align' => 'left'
			),
			'tsts' => array(
				'title' => $this->l("Customer's type"),
				'align' => 'left',
				'width' => 200
			),
			'id_order' => array(
				'title' => $this->l('ID Order'),
				'align' => 'left',
				'width' => 100
 			),
			'price' => array(
				'title' => $this->l("Price"),
				'align' => 'left',
				'width' => 120
			),
			'tssts' => array(
				'title' => $this->l("Balance LCDB"),
				'align' => 'left',
				'width' => 120
			),
			'date_add' => array(
				'title' => $this->l('Date issued'),
				'width' => 150,
				'type' => 'date',
				'align' => 'right'
 			),
 			'id_pdf' => array(
				'title' => $this->l('PDF'),
				'width' => 35,
				'align' => 'center',
				'callback' => 'printPDFIcons',
				'orderby' => false,
				'search' => false,
				'remove_onclick' => true)
		);

		
	}
}

