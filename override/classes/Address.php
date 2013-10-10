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
		// if (isset(self::$_idZones[$id_address]))
			// return self::$_idZones[$id_address];

		$cp = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
		SELECT a.`postcode`
		FROM `'._DB_PREFIX_.'address` a
		WHERE a.`id_address` = '.(int)$id_address);

		// var_dump($cp);
		$_idZones[$id_address] = self::getZoneByZipCode($cp);

		// self::$_idZones[$id_address] = (int)((int)$result['id_zone_state'] ? $result['id_zone_state'] : $result['id_zone']);
		return self::$_idZones[$id_address];
	}

	public function getZoneByZipCode($cp)
	{
		if (substr($cp, 0, 2) == "75") {
			// Paris
			$idZone = 1;
		} else if (ZoneCustom::isProche($cp)){
			// Proche banlieue
			$idZone = 9;
		} else if (ZoneCustom::isGrande($cp)) {
			// Grande banlieue
			$idZone = 10;
		} else {
			// Province
			$idZone = 11;
		}

		return $idZone;
	}
}

