<?php

class Group extends GroupCore
{
	
	public $is_group;
	
	public static $definition = array(
		'table' => 'group',
		'primary' => 'id_group',
		'multilang' => true,
		'fields' => array(
			'reduction' => 				array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
			'price_display_method' => 	array('type' => self::TYPE_INT, 'validate' => 'isPriceDisplayMethod', 'required' => true),
			'show_prices' => 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'date_add' => 				array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'date_upd' => 				array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'is_group' => 				array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),

			// Lang fields
			'name' => 					array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 32),
		),
	);

}

