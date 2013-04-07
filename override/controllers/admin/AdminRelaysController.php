<?php

class AdminRelaysControllerCore extends AdminController
{
	protected $position_identifier = 'id_relay';

	public function __construct()
	{
		$this->table = 'relay';
		$this->className = 'Relay';
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
			'id_relay' => array(
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
				'width' => 300,
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

		$relay_default_sort = array(
			array('value' => Relay::SORT_BY_PRICE, 'name' => $this->l('Price')),
			array('value' => Relay::SORT_BY_POSITION, 'name' => $this->l('Position'))
		);

		$relay_default_order = array(
			array('value' => Relay::SORT_BY_ASC, 'name' => $this->l('Ascending')),
			array('value' => Relay::SORT_BY_DESC, 'name' => $this->l('Descending'))
		);

		$this->fields_options = array(
			'general' => array(
				'title' => $this->l('Relay options'),
				'fields' => array(
					'PS_RELAY_DEFAULT' => array(
						'title' => $this->l('Default relay:'),
						'desc' => $this->l('Your shop\'s default relay'),
						'cast' => 'intval',
						'type' => 'select',
						'identifier' => 'id_relay',
						'list' => array_merge(
							array(
								-1 => array('id_relay' => -1, 'name' => $this->l('Best price')),
								-2 => array('id_relay' => -2, 'name' => $this->l('Best grade'))
							),
							Relay::getRelays((int)Configuration::get('PS_LANG_DEFAULT'), true, false, false, null, Relay::ALL_RELAYS))
					),
					'PS_RELAY_DEFAULT_SORT' => array(
						'title' => $this->l('Sort by:'),
						'desc' => $this->l('This will only be visible in the Front Office'),
						'cast' => 'intval',
						'type' => 'select',
						'identifier' => 'value',
						'list' => $relay_default_sort
					),
					'PS_RELAY_DEFAULT_ORDER' => array(
						'title' => $this->l('Order by:'),
						'desc' => $this->l('This will only be visible in the Front Office'),
						'cast' => 'intval',
						'type' => 'select',
						'identifier' => 'value',
						'list' => $relay_default_order
					),
				),
				'submit' => array()
			)
		);

		parent::__construct();
	}

	public function renderList()
	{
		$this->displayInformation(
			'&nbsp;<b>'.$this->l('How do I create a new relay?').'</b>
			<br />
			<ul>
			<li>'.$this->l('Click "Add new."').'<br /></li>
				<li>'.$this->l('Fill in the fields and click "Save."').'</li>
				<li>'.
					$this->l('You need to set a price range or a weight range for which the new relay will be available.').' '.
					$this->l('Under the "Shipping" menu, click either "Price Ranges" or "Weight Ranges".').'
				</li>
				<li>'.$this->l('Click "Add new."').'</li>
				<li>'.
					$this->l('Select the name of the relay and define the price range or the weight range.').' '.
					$this->l('For example, the relay can be made available for a weight range between 0 and 5lbs. Another relay can have a range between 5 and 10lbs.').'
				</li>
				<li>'.$this->l('When you are done, click "Save."').'</li>
				<li>'.$this->l('Click on the "Shipping" menu.').'</li>
				<li>'.
					$this->l('You need to set the fees that will be applied for this relay.').' '.
					$this->l('At the bottom on the page, in the "Fees" section, select the name of the relay.').'
				</li>
				<li>'.$this->l('For each zone, enter a price and click "Save."').'</li>
				<li>'.$this->l('You\'re all set! The new relay will be displayed to your customers.').'</li>
			</ul>'
		);
		$this->_select = 'b.*';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'relay_lang` b ON a.id_relay = b.id_relay'.Shop::addSqlRestrictionOnLang('b').'
							LEFT JOIN `'._DB_PREFIX_.'relay_tax_rules_group_shop` ctrgs ON (a.`id_relay` = ctrgs.`id_relay`
								AND ctrgs.id_shop='.(int)$this->context->shop->id.')';
		$this->_where = 'AND b.id_lang = '.$this->context->language->id;

		return parent::renderList();
	}

	public function renderForm()
	{
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Relays'),
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
						$this->l('Relay name displayed during checkout'),
						$this->l('For in-store pickup, enter 0 to replace the relay name with your shop name')
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
					'label' => $this->l('Address:'),
					'name' => 'address',
					'size' => 40,
					'desc' => $this->l('localisation of the relay')
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
					'desc' => $this->l('The zones in which this relay is to be used')
				),
				array(
					'type' => 'group',
					'label' => $this->l('Group access:'),
					'name' => 'groupBox',
					'values' => Group::getGroups(Context::getContext()->language->id),
					'desc' => $this->l('Mark all groups for which you want to give access to this relay')
				),
				array(
					'type' => 'text',
					'label' => $this->l('keep:'),
					'name' => 'keep',
					'size' => 40
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
					'desc' => $this->l('Enable relay in the Front Office')
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
		return parent::renderForm();
	}

	public function postProcess()
	{
		if (Tools::getValue('submitAdd'.$this->table))
		{
			/* Checking fields validity */
			$this->validateRules();
			if (!count($this->errors))
			{
				$id = (int)Tools::getValue('id_'.$this->table);

				/* Object update */
				if (isset($id) && !empty($id))
				{
					try {
						if ($this->tabAccess['edit'] === '1')
						{
							$current_relay = new Relay($id);
							if (!Validate::isLoadedObject($current_relay))
								throw new PrestaShopException('Cannot load Relay object');
							
							// Duplicate current Relay
							$new_relay = $current_relay->duplicateObject();
							if (Validate::isLoadedObject($new_relay))
							{
								// Set flag deteled to true for historization
								$current_relay->deleted = true;
								$current_relay->update();

								// Fill the new relay object
								$this->copyFromPost($new_relay, $this->table);
								$new_relay->position = $current_relay->position;
								$new_relay->update();

								$this->updateAssoShop($new_relay->id);
								$new_relay->copyRelayData((int)$current_relay->id);
								$this->changeGroups($new_relay->id);
								// Call of hooks
								Hook::exec('actionRelayUpdate', array(
									'id_relay' => (int)$current_relay->id,
									'relay' => $new_relay
								));
								$this->postImage($new_relay->id);
								$this->changeZones($new_relay->id);
								$new_relay->setTaxRulesGroup((int)Tools::getValue('id_tax_rules_group'));
								Tools::redirectAdmin(self::$currentIndex.'&id_'.$this->table.'='.$current_relay->id.'&conf=4&token='.$this->token);
							}
							else
								$this->errors[] = Tools::displayError('An error occurred while updating object.').' <b>'.$this->table.'</b>';
						}
						else
							$this->errors[] = Tools::displayError('You do not have permission to edit here.');
					} catch (PrestaShopException $e) {
						$this->errors[] = $e->getMessage();
					}
				}

				/* Object creation */
				else
				{
					if ($this->tabAccess['add'] === '1')
					{
						// Create new Relay
						$relay = new Relay();
						$this->copyFromPost($relay, $this->table);
						$relay->position = Relay::getHigherPosition() + 1;
						if ($relay->add())
						{
							if (($_POST['id_'.$this->table] = $relay->id /* voluntary */) && $this->postImage($relay->id) && $this->_redirect)
							{
								$relay->setTaxRulesGroup((int)Tools::getValue('id_tax_rules_group'), true);
								$this->changeZones($relay->id);
								$this->changeGroups($relay->id);
								$this->updateAssoShop($relay->id);
								Tools::redirectAdmin(self::$currentIndex.'&id_'.$this->table.'='.$relay->id.'&conf=3&token='.$this->token);
							}
						}
						else
							$this->errors[] = Tools::displayError('An error occurred while creating object.').' <b>'.$this->table.'</b>';
					}
					else
						$this->errors[] = Tools::displayError('You do not have permission to add here.');
				}
			}
			parent::postProcess();
		}
		else if ((isset($_GET['status'.$this->table]) || isset($_GET['status'])) && Tools::getValue($this->identifier))
		{
			if ($this->tabAccess['edit'] === '1')
			{
				if (Tools::getValue('id_relay') == Configuration::get('PS_RELAY_DEFAULT'))
					$this->errors[] = Tools::displayError('You cannot disable the default relay, please change your default relay first.');
				else
					parent::postProcess();
			}
			else
				$this->errors[] = Tools::displayError('You do not have permission to edit here.');
		}
		else
		{
			if ((Tools::isSubmit('submitDel'.$this->table) && in_array(Configuration::get('PS_RELAY_DEFAULT'), Tools::getValue('relayBox')))
				|| (isset($_GET['delete'.$this->table]) && Tools::getValue('id_relay') == Configuration::get('PS_RELAY_DEFAULT')))
					$this->errors[] = $this->l('Please set another relay as default before deleting this one');
			else
			{
				// if deletion : removes the relay from the warehouse/relay association
				if (Tools::isSubmit('delete'.$this->table))
				{
					$id = (int)Tools::getValue('id_'.$this->table);
					// Delete from the reference_id and not from the relay id
					$relay = new Relay((int)$id);
					Warehouse::removeRelay($relay->id_reference);
				}
				else if (Tools::isSubmit($this->table.'Box') && count(Tools::isSubmit($this->table.'Box')) > 0)
				{
					$ids = Tools::getValue($this->table.'Box');
					array_walk($ids, 'intval');
					foreach ($ids as $id)
					{
						// Delete from the reference_id and not from the relay id
						$relay = new Relay((int)$id);
						Warehouse::removeRelay($relay->id_reference);
					}
				}
				parent::postProcess();
				Relay::cleanPositions();
			}
		}
	}

	/**
	 * Overload the property $fields_value
	 *
	 * @param object $obj
	 */
	public function getFieldsValues($obj)
	{
		if ($this->getFieldValue($obj, 'is_module'))
			$this->fields_value['is_module'] = 1;

		if ($this->getFieldValue($obj, 'shipping_external'))
			$this->fields_value['shipping_external'] = 1;

		if ($this->getFieldValue($obj, 'need_range'))
			$this->fields_value['need_range'] = 1;
		// Added values of object Zone
		$relay_zones = $obj->getZones();
		$relay_zones_ids = array();
		if (is_array($relay_zones))
			foreach ($relay_zones as $relay_zone)
				$relay_zones_ids[] = $relay_zone['id_zone'];

		$zones = Zone::getZones(false);
		foreach ($zones as $zone)
			$this->fields_value['zone_'.$zone['id_zone']] = Tools::getValue('zone_'.$zone['id_zone'], (in_array($zone['id_zone'], $relay_zones_ids)));

		// Added values of object Group
		$relay_groups = $obj->getGroups();
		$relay_groups_ids = array();
		if (is_array($relay_groups))
			foreach ($relay_groups as $relay_group)
				$relay_groups_ids[] = $relay_group['id_group'];

		$groups = Group::getGroups($this->context->language->id);

		foreach ($groups as $group)
			$this->fields_value['groupBox_'.$group['id_group']] = Tools::getValue('groupBox_'.$group['id_group'], (in_array($group['id_group'], $relay_groups_ids) || empty($relay_groups_ids) && !$obj->id));

		$this->fields_value['id_tax_rules_group'] = $this->object->getIdTaxRulesGroup($this->context);
	}

	protected function beforeDelete($object)
	{
		return $object->isUsed();
	}

	protected function changeGroups($id_relay, $delete = true)
	{
		if ($delete)
			Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'relay_group WHERE id_relay = '.(int)$id_relay);
		$groups = Db::getInstance()->executeS('SELECT id_group FROM `'._DB_PREFIX_.'group`');
		foreach ($groups as $group)
			if (Tools::getIsset('groupBox') && in_array($group['id_group'], Tools::getValue('groupBox')))
				Db::getInstance()->execute('
					INSERT INTO '._DB_PREFIX_.'relay_group (id_group, id_relay)
					VALUES('.(int)$group['id_group'].','.(int)$id_relay.')
				');
	}

	public function changeZones($id)
	{
		$relay = new $this->className($id);
		if (!Validate::isLoadedObject($relay))
			die (Tools::displayError('Object cannot be loaded'));
		$zones = Zone::getZones(false);
		foreach ($zones as $zone)
			if (count($relay->getZone($zone['id_zone'])))
			{
				if (!isset($_POST['zone_'.$zone['id_zone']]) || !$_POST['zone_'.$zone['id_zone']])
					$relay->deleteZone($zone['id_zone']);
			}
			else
				if (isset($_POST['zone_'.$zone['id_zone']]) && $_POST['zone_'.$zone['id_zone']])
					$relay->addZone($zone['id_zone']);
	}

	/**
	 * Modifying initial getList method to display position feature (drag and drop)
	 */
	public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
	{
		parent::getList($id_lang, $order_by, $order_way, $start, $limit, $id_lang_shop);

		foreach ($this->_list as $key => $list)
			if ($list['name'] == '0')
				$this->_list[$key]['name'] = Configuration::get('PS_SHOP_NAME');
	}

	public function ajaxProcessUpdatePositions()
	{
		$way = (int)(Tools::getValue('way'));
		$id_relay = (int)(Tools::getValue('id'));
		$positions = Tools::getValue($this->table);

		foreach ($positions as $position => $value)
		{
			$pos = explode('_', $value);

			if (isset($pos[2]) && (int)$pos[2] === $id_relay)
			{
				if ($relay = new Relay((int)$pos[2]))
					if (isset($position) && $relay->updatePosition($way, $position))
						echo 'ok position '.(int)$position.' for relay '.(int)$pos[1].'\r\n';
					else
						echo '{"hasError" : true, "errors" : "Can not update relay '.(int)$id_relay.' to position '.(int)$position.' "}';
				else
					echo '{"hasError" : true, "errors" : "This relay ('.(int)$id_relay.') can t be loaded"}';

				break;
			}
		}
	}

}


