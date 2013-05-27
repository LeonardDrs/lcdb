<?php

class Address extends AddressCore
{
	/**
	 * Get zone id for a given address
	 *
	 * @param integer $id_address Address id for which we want to get zone id
	 * @return integer Zone id
	 */
	public static function getZoneById($id_address)
	{
		if (isset(self::$_idZones[$id_address]))
			return self::$_idZones[$id_address];

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT s.`id_zone` AS id_zone_state, c.`id_zone`
		FROM `'._DB_PREFIX_.'address` a
		LEFT JOIN `'._DB_PREFIX_.'country` c ON c.`id_country` = a.`id_country`
		LEFT JOIN `'._DB_PREFIX_.'state` s ON s.`id_state` = a.`id_state`
		WHERE a.`id_address` = '.(int)$id_address);

		$cp = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
		SELECT a.`postcode`
		FROM `'._DB_PREFIX_.'address` a
		WHERE a.`id_address` = '.(int)$id_address);

		// var_dump($cp);
		if (substr($cp, 0, 2) == "75") {
			self::$_idZones[$id_address] = 1;
		} else if (ZoneCustom::isProche($cp)){
			self::$_idZones[$id_address] = 9;
		} else if (ZoneCustom::isGrande($cp)) {
			self::$_idZones[$id_address] = 10;
		} else {

		}

		// self::$_idZones[$id_address] = (int)((int)$result['id_zone_state'] ? $result['id_zone_state'] : $result['id_zone']);
		return self::$_idZones[$id_address];
	}
}

