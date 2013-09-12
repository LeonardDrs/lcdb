<?php

class AdminCarriersController extends AdminCarriersControllerCore
{
	public function __construct()
	{
		$this->_filter = 'AND type_carrier = 0';
		$this->table = 'carrier';
		$this->className = 'Carrier';
		$this->lang = false;
		$this->deleted = true;

		$this->addRowAction('edit');
		$this->addRowAction('delete');

		$this->_defaultOrderBy = 'position';

		$this->context = Context::getContext();

		$this->bulk_actions = array(
			'delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')),
			'enableSelection' => array('text' => $this->l('Enable selection')),
			'disableSelection' => array('text' => $this->l('Disable selection'))
			);

		$this->fieldImageSettings = array(
			'name' => 'logo',
			'dir' => 's'
		);

		$this->fields_list = array(
			'id_carrier' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'width' => 25
			),
			'name' => array(
				'title' => $this->l('Name'),
				'width' => 'auto'
			),
			'image' => array(
				'title' => $this->l('Logo'),
				'align' => 'center',
				'image' => 's',
				'orderby' => false,
				'search' => false,
				'width' => 120
			),
			'delay' => array(
				'title' => $this->l('Delay'),
				'width' => 30,
				'orderby' => false
			),
			'active' => array(
				'title' => $this->l('Status'),
				'align' => 'center',
				'active' => 'status',
				'type' => 'bool',
				'orderby' => false,
				'width' => 25
			),
			'is_free' => array(
				'title' => $this->l('Free Shipping'),
				'align' => 'center',
				'icon' => array(
					0 => 'disabled.gif',
					1 => 'enabled.gif',
					'default' => 'disabled.gif'
				),
				'type' => 'bool',
				'orderby' => false,
				'width' => 150
			),
			'position' => array(
				'title' => $this->l('Position'),
				'width' => 40,
				'filter_key' => 'a!position',
				'align' => 'center',
				'position' => 'position'
			)
		);

		$carrier_default_sort = array(
			array('value' => Carrier::SORT_BY_PRICE, 'name' => $this->l('Price')),
			array('value' => Carrier::SORT_BY_POSITION, 'name' => $this->l('Position'))
		);

		$carrier_default_order = array(
			array('value' => Carrier::SORT_BY_ASC, 'name' => $this->l('Ascending')),
			array('value' => Carrier::SORT_BY_DESC, 'name' => $this->l('Descending'))
		);

		$this->fields_options = array(
			'general' => array(
				'title' => $this->l('Carrier options'),
				'fields' => array(
					'PS_CARRIER_DEFAULT' => array(
						'title' => $this->l('Default carrier:'),
						'desc' => $this->l('Your shop\'s default carrier'),
						'cast' => 'intval',
						'type' => 'select',
						'identifier' => 'id_carrier',
						'list' => array_merge(
							array(
								-1 => array('id_carrier' => -1, 'name' => $this->l('Best price')),
								-2 => array('id_carrier' => -2, 'name' => $this->l('Best grade'))
							),
							Carrier::getCarriers((int)Configuration::get('PS_LANG_DEFAULT'), true, false, false, null, Carrier::ALL_CARRIERS))
					),
					'PS_CARRIER_DEFAULT_SORT' => array(
						'title' => $this->l('Sort by:'),
						'desc' => $this->l('This will only be visible in the Front Office'),
						'cast' => 'intval',
						'type' => 'select',
						'identifier' => 'value',
						'list' => $carrier_default_sort
					),
					'PS_CARRIER_DEFAULT_ORDER' => array(
						'title' => $this->l('Order by:'),
						'desc' => $this->l('This will only be visible in the Front Office'),
						'cast' => 'intval',
						'type' => 'select',
						'identifier' => 'value',
						'list' => $carrier_default_order
					),
				),
				'submit' => array()
			)
		);

		parent::__construct();
	}

	public function renderForm()
	{
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Carriers'),
				'image' => '../img/admin/delivery.gif'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Company:'),
					'name' => 'name',
					'size' => 25,
					'required' => true,
					'hint' => sprintf($this->l('Allowed characters: letters, spaces and %s'), '().-'),
					'desc' => array(
						$this->l('Carrier name displayed during checkout'),
						$this->l('For in-store pickup, enter 0 to replace the carrier name with your shop name')
					)
				),
				array(
					'type' => 'file',
					'label' => $this->l('Logo:'),
					'name' => 'logo',
					'desc' => $this->l('Upload a logo from your computer').' (.gif, .jpg, .jpeg '.$this->l('or').' .png)'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Description'),
					'name' => 'delay',
					'lang' => true,
					'required' => true,
					'size' => 41,
					'maxlength' => 255,
					'desc' => $this->l('Description affiché')
				),
				array(
					'type' => 'text',
					'label' => $this->l('Speed Grade:'),
					'name' => 'grade',
					'required' => false,
					'size' => 1,
					'desc' => $this->l('"0" for a longest shipping delay, "9" for the shortest shipping delay.')
				),
				array(
					'type' => 'text',
					'label' => $this->l('URL:'),
					'name' => 'url',
					'size' => 40,
					'desc' => $this->l('Delivery tracking URL; type \'@\' where the tracking number will appear, it will be automatically replaced by the tracking number')
				),
				array(
					'type' => 'checkbox',
					'label' => $this->l('Zone:'),
					'name' => 'zone',
					'values' => array(
						'query' => Zone::getZones(false),
						'id' => 'id_zone',
						'name' => 'name'
					),
					'desc' => $this->l('The zones in which this carrier is to be used')
				),
				array(
					'type' => 'group',
					'label' => $this->l('Group access:'),
					'name' => 'groupBox',
					'values' => Group::getGroups(Context::getContext()->language->id),
					'desc' => $this->l('Mark all groups for which you want to give access to this carrier')
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Status:'),
					'name' => 'active',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					),
					'desc' => $this->l('Enable carrier in the Front Office')
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Apply shipping cost:'),
					'name' => 'is_free',
					'required' => false,
					'class' => 't',
					'values' => array(
						array(
							'id' => 'is_free_on',
							'value' => 0,
							'label' => '<img src="../img/admin/enabled.gif" alt="'.$this->l('Yes').'" title="'.$this->l('Yes').'" />'
						),
						array(
							'id' => 'is_free_off',
							'value' => 1,
							'label' => '<img src="../img/admin/disabled.gif" alt="'.$this->l('No').'" title="'.$this->l('No').'" />'
						)
					),
					'desc' => $this->l('Apply both regular shipping cost and product-specific additional shipping costs')
				),
				array(
					'type' => 'select',
					'label' => $this->l('Tax:'),
					'name' => 'id_tax_rules_group',
					'options' => array(
						'query' => TaxRulesGroup::getTaxRulesGroups(true),
						'id' => 'id_tax_rules_group',
						'name' => 'name',
						'default' => array(
							'label' => $this->l('No Tax'),
							'value' => 0
						)
					)
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Shipping & handling:'),
					'name' => 'shipping_handling',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'shipping_handling_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'shipping_handling_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					),
					'desc' => $this->l('Include the shipping & handling costs in carrier price')
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Billing:'),
					'name' => 'shipping_method',
					'required' => false,
					'class' => 't',
					'br' => true,
					'values' => array(
						array(
							'id' => 'billing_default',
							'value' => Carrier::SHIPPING_METHOD_DEFAULT,
							'label' => $this->l('Default behavior')
						),
						array(
							'id' => 'billing_price',
							'value' => Carrier::SHIPPING_METHOD_PRICE,
							'label' => $this->l('According to total price')
						),
						array(
							'id' => 'billing_weight',
							'value' => Carrier::SHIPPING_METHOD_WEIGHT,
							'label' => $this->l('According to total weight')
						)
					)
				),
				array(
					'type' => 'select',
					'label' => $this->l('Out-of-range behavior:'),
					'name' => 'range_behavior',
					'options' => array(
						'query' => array(
							array(
								'id' => 0,
								'name' => $this->l('Apply the cost of the highest defined range')
							),
							array(
								'id' => 1,
								'name' => $this->l('Disable carrier')
							)
						),
						'id' => 'id',
						'name' => 'name'
					),
					'desc' => $this->l('Out-of-range behavior when none is defined (e.g. when a customer\'s cart weight is greater than the highest range limit)')
				),
				array(
					'type' => 'text',
					'label' => $this->l('Maximium package height:'),
					'name' => 'max_height',
					'required' => false,
					'size' => 10,
					'desc' => $this->l('Maximum height managed by this carrier. Set "0" or leave this field blank to ignore this.')
				),
				array(
					'type' => 'text',
					'label' => $this->l('Maximium package width:'),
					'name' => 'max_width',
					'required' => false,
					'size' => 10,
					'desc' => $this->l('Maximum width managed by this carrier. Set "0" or leave this field blank to ignore this.')
				),
				array(
					'type' => 'text',
					'label' => $this->l('Maximium package depth:'),
					'name' => 'max_depth',
					'required' => false,
					'size' => 10,
					'desc' => $this->l('Maximum depth managed by this carrier. Set "0" or leave this field blank to ignore this.')
				),
				array(
					'type' => 'text',
					'label' => $this->l('Maximium package weight:'),
					'name' => 'max_weight',
					'required' => false,
					'size' => 10,
					'desc' => $this->l('Maximum weight managed by this carrier. Set "0" or leave this field blank to ignore this.')
				),
				array(
					'type' => 'hidden',
					'name' => 'is_module'
				),
				array(
					'type' => 'hidden',
					'name' => 'external_module_name',
				),
				array(
					'type' => 'hidden',
					'name' => 'shipping_external'
				),
				array(
					'type' => 'hidden',
					'name' => 'need_range'
				),
			)
		);

		if (Shop::isFeatureActive())
		{
			$this->fields_form['input'][] = array(
				'type' => 'shop',
				'label' => $this->l('Shop association:'),
				'name' => 'checkBoxShopAsso',
			);
		}

		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);

		if (!($obj = $this->loadObject(true)))
			return;

		$this->getFieldsValues($obj);
		return AdminController::renderForm();
	}
}

