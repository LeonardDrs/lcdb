<?php

class Carrier extends CarrierCore
{
	public function getOrders()
	{
		$sql = 'SELECT *
				FROM `'._DB_PREFIX_.'orders`';
			//		.Shop::addSqlRestriction();
		$result = Db::getInstance()->getRow($sql);

		return $result;
	}

	/**
	 * Get all carriers in a given language
	 *
	 * @param integer $id_lang Language id
	 * @param $modules_filters, possible values:
			PS_CARRIERS_ONLY
			CARRIERS_MODULE
			CARRIERS_MODULE_NEED_RANGE
			PS_CARRIERS_AND_CARRIER_MODULES_NEED_RANGE
			ALL_CARRIERS
	 * @param boolean $active Returns only active carriers when true
	 * @return array Carriers
	 */
	public static function getCarriers($id_lang, $active = false, $delete = false, $id_zone = false, $ids_group = null, $modules_filters = self::PS_CARRIERS_ONLY)
	{
		if (!Validate::isBool($active))
			die(Tools::displayError());
		if ($ids_group)
		{
			$ids = '';
			foreach ($ids_group as $id)
				$ids .= (int)$id.', ';
			$ids = rtrim($ids, ', ');
			if ($ids == '')
				return array();
		}

		$sql = 'SELECT c.*, cl.delay
				FROM `'._DB_PREFIX_.'carrier` c
				LEFT JOIN `'._DB_PREFIX_.'carrier_lang` cl ON (c.`id_carrier` = cl.`id_carrier` AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
				LEFT JOIN `'._DB_PREFIX_.'carrier_zone` cz ON (cz.`id_carrier` = c.`id_carrier`)'.
				($id_zone ? 'LEFT JOIN `'._DB_PREFIX_.'zone` z ON (z.`id_zone` = '.(int)$id_zone.')' : '').'
				'.Shop::addSqlAssociation('carrier', 'c').'
				WHERE c.`deleted` = '.($delete ? '1' : '0').
					($active ? ' AND c.`active` = 1' : '').
					($id_zone ? ' AND cz.`id_zone` = '.(int)$id_zone.'
					AND c.`type_carrier` = 0
					AND z.`active` = 1 ' : ' ');
		switch ($modules_filters)
		{
			case 1 :
				$sql .= 'AND c.is_module = 0 ';
			break;
			case 2 :
				$sql .= 'AND c.is_module = 1 ';
			break;
			case 3 :
				$sql .= 'AND c.is_module = 1 AND c.need_range = 1 ';
			break;
			case 4 :
				$sql .= 'AND (c.is_module = 0 OR c.need_range = 1) ';
			break;
			case 5 :
				$sql .= '';
			break;

		}
		$sql .= ($ids_group ? ' AND c.id_carrier IN (SELECT id_carrier FROM '._DB_PREFIX_.'carrier_group WHERE id_group IN ('.$ids.')) ' : '').'
			GROUP BY c.`id_carrier`
			ORDER BY c.`position` ASC';

		$carriers = Db::getInstance()->executeS($sql);

		if (is_array($carriers) && count($carriers))
		{
			foreach ($carriers as $key => $carrier)
				if ($carrier['name'] == '0')
					$carriers[$key]['name'] = Configuration::get('PS_SHOP_NAME');
		}
		else
			$carriers = array();

		return $carriers;
	}


}

