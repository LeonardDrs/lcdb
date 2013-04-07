<?php

class Zone extends ZoneCore
{

	public $calendar = true;

	public static $definition = array(
		'table' => 'zone',
		'primary' => 'id_zone',
		'fields' => array(
			'name' => 	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => true, 'size' => 64),
			'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'calendar' => array('type' => self::TYPE_STRING),
		),
	);
}

