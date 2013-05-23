<?php

class Product extends ProductCore
{
	public $tricks;
	public $breeder;
	public $is_subscription;
	public $product_type;
	public $serving;
	
	public static $definition = array(
		'table' => 'product',
		'primary' => 'id_product',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			/* Classic fields */
			'id_shop_default' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'id_manufacturer' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'id_supplier' => 				array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'reference' => 					array('type' => self::TYPE_STRING, 'validate' => 'isReference', 'size' => 32),
			'supplier_reference' => 		array('type' => self::TYPE_STRING, 'validate' => 'isReference', 'size' => 32),
			'location' => 					array('type' => self::TYPE_STRING, 'validate' => 'isReference', 'size' => 64),
			'width' => 						array('type' => self::TYPE_FLOAT, 'validate' => 'isUnsignedFloat'),
			'height' => 					array('type' => self::TYPE_FLOAT, 'validate' => 'isUnsignedFloat'),
			'depth' => 						array('type' => self::TYPE_FLOAT, 'validate' => 'isUnsignedFloat'),
			'weight' => 					array('type' => self::TYPE_FLOAT, 'validate' => 'isUnsignedFloat'),
			'quantity_discount' => 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'ean13' => 						array('type' => self::TYPE_STRING, 'validate' => 'isEan13', 'size' => 13),
			'upc' => 						array('type' => self::TYPE_STRING, 'validate' => 'isUpc', 'size' => 12),
			'cache_is_pack' => 				array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'cache_has_attachments' => 		array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'is_virtual' => 				array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'is_subscription' => 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'product_type' => 				array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 50),
			'serving' => 					array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 50),

			/* Shop fields */
			'id_category_default' => 		array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isUnsignedId'),
			'id_tax_rules_group' => 		array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isUnsignedId'),
			'on_sale' => 					array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),
			'online_only' => 				array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),
			'ecotax' => 					array('type' => self::TYPE_FLOAT, 'shop' => true, 'validate' => 'isPrice'),
			'minimal_quantity' => 			array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isUnsignedInt'),
			'price' => 						array('type' => self::TYPE_FLOAT, 'shop' => true, 'validate' => 'isPrice', 'required' => true),
			'wholesale_price' => 			array('type' => self::TYPE_FLOAT, 'shop' => true, 'validate' => 'isPrice'),
			'unity' => 						array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isString'),
			'unit_price_ratio' => 			array('type' => self::TYPE_FLOAT, 'shop' => true),
			'additional_shipping_cost' => 	array('type' => self::TYPE_FLOAT, 'shop' => true, 'validate' => 'isPrice'),
			'customizable' => 				array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isUnsignedInt'),
			'text_fields' => 				array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isUnsignedInt'),
			'uploadable_files' => 			array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isUnsignedInt'),
			'active' => 					array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),
			'redirect_type' => 				array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isString'),
			'id_product_redirected' => 		array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isUnsignedId'),
			'available_for_order' => 		array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),
			'available_date' => 			array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDateFormat'),
			'condition' => 					array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isGenericName', 'values' => array('new', 'used', 'refurbished'), 'default' => 'new'),
			'show_price' => 				array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),
			'indexed' => 					array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),
			'visibility' => 				array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isProductVisibility', 'values' => array('both', 'catalog', 'search', 'none'), 'default' => 'both'),
			'cache_default_attribute' => 	array('type' => self::TYPE_INT, 'shop' => true),
			'advanced_stock_management' => 	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),
			'date_add' => 					array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDateFormat'),
			'date_upd' => 					array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDateFormat'),

			/* Lang fields */
			'meta_description' => 			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'meta_keywords' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'meta_title' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
			'link_rewrite' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128),
			'name' => 						array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCatalogName', 'required' => true, 'size' => 128),
			'description' => 				array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'description_short' => 			array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'tricks' => 					array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'breeder' => 					array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'available_now' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'available_later' => 			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'IsGenericName', 'size' => 255),
		),
		'associations' => array(
			'manufacturer' => 				array('type' => self::HAS_ONE),
			'supplier' => 					array('type' => self::HAS_ONE),
			'default_category' => 			array('type' => self::HAS_ONE, 'field' => 'id_category_default', 'object' => 'Category'),
			'tax_rules_group' => 			array('type' => self::HAS_ONE),
			'categories' =>					array('type' => self::HAS_MANY, 'field' => 'id_category', 'object' => 'Category', 'association' => 'category_product'),
			'stock_availables' =>			array('type' => self::HAS_MANY, 'field' => 'id_stock_available', 'object' => 'StockAvailable', 'association' => 'stock_availables'),
		),
	);
	
	/**
	 * Delete product accessories
	 *
	 * @return mixed Deletion result
	 */
	public function deleteAccessories()
	{
		return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'accessory` WHERE `id_product_1` = '.(int)$this->id);
	}

	/**
	 * Delete product from other products accessories
	 *
	 * @return mixed Deletion result
	 */
	public function deleteFromAccessories()
	{
		return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'accessory` WHERE `id_product_2` = '.(int)$this->id);
	}

	/**
	 * Get product accessories (only names)
	 *
	 * @param integer $id_lang Language id
	 * @param integer $id_product Product id
	 * @return array Product accessories
	 */
	public static function getRecipesLight($id_lang, $id_product, Context $context = null)
	{
		if (!$context)
			$context = Context::getContext();

		$sql = 'SELECT p.`id_product`, p.`reference`, pl.`name`
				FROM `'._DB_PREFIX_.'accessory`
				LEFT JOIN `'._DB_PREFIX_.'product` p ON (p.`id_product`= `id_product_2`)
				'.Shop::addSqlAssociation('product', 'p').'
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
				)
				WHERE `id_product_1` = '.(int)$id_product;

		return Db::getInstance()->executeS($sql);
	}

	/**
	 * Get product accessories
	 *
	 * @param integer $id_lang Language id
	 * @return array Product accessories
	 */
	public function getRecipes($id_lang, $active = true, Context $context = null)
	{
		if (!$context)
			$context = Context::getContext();

		$sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, pl.`description`, pl.`description_short`, pl.`link_rewrite`,
					pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`,
					i.`id_image`, il.`legend`, m.`name` as manufacturer_name, cl.`name` AS category_default,
					DATEDIFF(
						p.`date_add`,
						DATE_SUB(
							NOW(),
							INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY
						)
					) > 0 AS new
				FROM `'._DB_PREFIX_.'accessory`
				LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = `id_product_2`
				'.Shop::addSqlAssociation('product', 'p').'
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
				)
				LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (
					product_shop.`id_category_default` = cl.`id_category`
					AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').'
				)
				LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product`)'.
				Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON (p.`id_manufacturer`= m.`id_manufacturer`)
				'.Product::sqlStock('p', 0).'
				WHERE `id_product_1` = '.(int)$this->id.'
				AND ((image_shop.id_image IS NOT NULL OR i.id_image IS NULL) OR (image_shop.id_image IS NULL AND i.cover=1))'.
				($active ? ' AND product_shop.`active` = 1' : '');
		if (!$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql))
			return false;
		foreach ($result as &$row)
			$row['id_product_attribute'] = Product::getDefaultAttribute((int)$row['id_product']);
		return $this->getProductsProperties($id_lang, $result);
	}

	public static function getRecipeById($recipe_id)
	{
		return Db::getInstance()->getRow('SELECT `id_recipe`, `title` FROM `'._DB_PREFIX_.'recipe_lang` WHERE `id_recipe` = '.(int)$recipe_id);
	}

	/**
	 * Link accessories with product
	 *
	 * @param array $accessories_id Accessories ids
	 */
	public function changeRecipes($recipes_id)
	{
		foreach ($recipes_id as $id_recipe_2)
			Db::getInstance()->insert('recipe', array(
				'id_recipe_1' => (int)$this->id,
				'id_recipe_2' => (int)$id_recipe_2
			));
	}
}

