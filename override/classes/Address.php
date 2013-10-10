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

		$_idZones[$id_address] = self::getZoneByZipCode($cp);

		return self::$_idZones[$id_address];
	}

	/**
	 * Get zone id for a given zipcode
	 *
	 * @param string $zipcode
	 * @return integer Zone id
	 */
	public static function getZoneByZipCode($cp)
	{

		if (substr($cp, 0, 2) == "75") {
			$idZone = 1; // Paris
		} else if (ZoneCustom::isProche($cp)){
			$idZone = 9; // Proche banlieue
		} else if (ZoneCustom::isGrande($cp)) {
			$idZone = 10; // Grande banlieue
		} else {
			$idZone = 11; // Province
		}

		return $idZone;

	}
}
