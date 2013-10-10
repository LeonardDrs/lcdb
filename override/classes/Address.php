<?php

class Address extends AddressCore
{
	
	/**
	 * Get zone id for a given address
	 *
	 * @param integer $id_address Address id for which we want to get zone id
	 * @return string zipcode
	 */
	public static function getZoneById($id_address)
	{

		$cp = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
		SELECT a.`postcode`
		FROM `'._DB_PREFIX_.'address` a
		WHERE a.`id_address` = '.(int)$id_address);

		return $this->getZoneByZip();
	}

	/**
	 * Get zone id for a given zipcode
	 *
	 * @param string $zipcode
	 * @return integer Zone id
	 */
	public static function getZoneByZip($cp)
	{

		if (substr($cp, 0, 2) == "75") {
			self::$_idZones[$id_address] = 1; // Paris
		} else if (ZoneCustom::isProche($cp)){
			self::$_idZones[$id_address] = 9; // Proche banlieue
		} else if (ZoneCustom::isGrande($cp)) {
			self::$_idZones[$id_address] = 10; // Grande banlieue
		} else {
			self::$_idZones[$id_address] = 11; // Province
		}

		return self::$_idZones[$id_address];

	}
}

