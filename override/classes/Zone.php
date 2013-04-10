<?php

class Zone extends ZoneCore
{

	public $horaire = true;
	public $h_start = true;
	public $h_end = true;
	public $tranche = true;
	public $creneau = true;
	public $calendar = true;

	public static $definition = array(
		'table' => 'zone',
		'primary' => 'id_zone',
		'fields' => array(
			'name' => 	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => true, 'size' => 64),
			'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'horaire' => array('type' => self::TYPE_BOOL, 'validate' => 'isInt'),
			'h_start' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
			'h_end' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
			'tranche' => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
			'creneau' => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'calendar' => array('type' => self::TYPE_STRING),
		),
	);
}

