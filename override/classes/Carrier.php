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
}

