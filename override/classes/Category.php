<?php

class Category extends CategoryCore
{
	
	public $id_lcdb_import;
	
	public static $definition = array(
		'table' => 'category',
		'primary' => 'id_category',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			'nleft' => 				array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'nright' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'level_depth' => 		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'active' => 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'id_parent' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_shop_default' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'is_root_category' => 	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position' => 			array('type' => self::TYPE_INT),
			'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'date_upd' => 			array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'id_lcdb_import' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),

			// Lang fields
			'name' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCatalogName', 'required' => true, 'size' => 64),
			'link_rewrite' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 64),
			'description' => 		array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'meta_title' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
			'meta_description' => 	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'meta_keywords' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
		),
	);
	
	public function getSubCategoriesByDepth($id_cat, $depth, $id_lang, $active = true)
	{
		if (!Validate::isBool($active))
	 		die(Tools::displayError());

		$groups = FrontController::getCurrentCustomerGroups();
		$sql_groups = (count($groups) ? 'IN ('.implode(',', $groups).')' : '= 1');

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, cl.id_lang, cl.name, cl.link_rewrite, cl.meta_title
			FROM `'._DB_PREFIX_.'category` c
			'.Shop::addSqlAssociation('category', 'c').'
			LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
				ON (c.`id_category` = cl.`id_category`
				AND `id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
			LEFT JOIN `'._DB_PREFIX_.'category_group` cg
				ON (cg.`id_category` = c.`id_category`)
			WHERE `id_parent` = '.(int)$id_cat.'
				'.($active ? 'AND `active` = 1' : '').'
				AND cg.`id_group` '.$sql_groups.'
			GROUP BY c.`id_category`
			ORDER BY `level_depth` ASC, category_shop.`position` ASC
		');
			
		foreach ($result as &$row)
		{
			$row['subcats'] = Category::getSubCategoriesByDepth($row['id_category'], $depth, $id_lang, $active);
		}

		return $result;
	}
	
	public function getFullSubCategories($id_lang, $active = true, $order_by_product = null, $order_way_product = null)
	{
	 	if (!Validate::isBool($active))
	 		die(Tools::displayError());

		$groups = FrontController::getCurrentCustomerGroups();
		$sql_groups = (count($groups) ? 'IN ('.implode(',', $groups).')' : '= 1');

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, cl.id_lang, cl.name, cl.description, cl.link_rewrite, cl.meta_title, cl.meta_keywords, cl.meta_description
			FROM `'._DB_PREFIX_.'category` c
			'.Shop::addSqlAssociation('category', 'c').'
			LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
				ON (c.`id_category` = cl.`id_category`
				AND `id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
			LEFT JOIN `'._DB_PREFIX_.'category_group` cg
				ON (cg.`id_category` = c.`id_category`)
			WHERE `id_parent` = '.(int)$this->id.'
				'.($active ? 'AND `active` = 1' : '').'
				AND cg.`id_group` '.$sql_groups.'
			GROUP BY c.`id_category`
			ORDER BY `level_depth` ASC, category_shop.`position` ASC
		');

		foreach ($result as &$row)
		{
			$row['id_image'] = file_exists(_PS_CAT_IMG_DIR_.$row['id_category'].'.jpg') ? (int)$row['id_category'] : Language::getIsoById($id_lang).'-default';
			$row['legend'] = 'no picture';
			// gets products of category
			$category = new Category($row['id_category'] , $id_lang);
			$row['products'] = $category->getProducts($id_lang, 0, 100, $order_by_product, $order_way_product);
		}
		return $result;
	}

	public static function getLeftColumn($lang){
		$parent = new Category(3, $lang);
		// voir si la zone est bien lcdb, sinon on retire le colis cadeau
		return $parent->getSubCategoriesByDepth(2, 4, $lang);
	}

	public static function getRightColumn($lang){
		$tips = CMS::getCMSPages($lang, 7);
		return $content = array("tips" => $tips);
	}
}

