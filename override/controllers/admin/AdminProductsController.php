<?php

class AdminProductsController extends AdminProductsControllerCore
{
	
	public function __construct()
	{

		parent::__construct();
			
		$this->fields_list = array();
		$this->fields_list['id_product'] = array(
			'title' => $this->l('ID'),
			'align' => 'center',
			'width' => 20
		);
		$this->fields_list['name'] = array(
			'title' => $this->l('Name'),
			'filter_key' => 'b!name',
			'width' => 120
		);
		$this->fields_list['name_category'] = array(
			'title' => $this->l('Category'),
			'width' => 120,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ0'] = array(
			'title' => $this->l('Labels '),
			'width' => 120,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ1'] = array(
			'title' => $this->l('Nombre de pièces '),
			'width' => 90,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ2'] = array(
			'title' => $this->l('Poids d achat '),
			'width' => 90,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ3'] = array(
			'title' => $this->l('Poids cible '),
			'width' => 90,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ4'] = array(
			'title' => $this->l('Poids '),
			'width' => 90,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ5'] = array(
			'title' => $this->l('Prix au kilo '),
			'width' => 90,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ6'] = array(
			'title' => $this->l('Prix d achat '),
			'width' => 90,
			'filter_key' => 'cl!name',
		);
		$this->fields_list['champ7'] = array(
			'title' => $this->l('prix HT'),
			'width' => 90,
			'type' => 'price',
			'align' => 'right',
			'filter_key' => 'a!price'
		);
		$this->fields_list['price'] = array(
			'title' => $this->l('prix au kilo'),
			'width' => 90,
			'type' => 'price',
			'align' => 'right',
			'filter_key' => 'a!price'
		);
		$this->fields_list['price_final'] = array(
			'title' => $this->l('Final price'),
			'width' => 90,
			'type' => 'price',
			'align' => 'right',
			'havingFilter' => true,
			'orderby' => false
		);
		if ((int)Tools::getValue('id_category'))
			$this->fields_list['position'] = array(
				'title' => $this->l('Position'),
				'width' => 70,
				'filter_key' => 'cp!position',
				'align' => 'center',
				'position' => 'position'
			);
	}
	
	public function initFormAssociations($obj)
	{
		$product = $obj;
		$data = $this->createTemplate($this->tpl_form);
		// Prepare Categories tree for display in Associations tab
		$root = Category::getRootCategory();
		$default_category = Tools::getValue('id_category', Context::getContext()->shop->id_category);

		if (!$product->id || !$product->isAssociatedToShop())
			$selected_cat = Category::getCategoryInformations(Tools::getValue('categoryBox', array($default_category)), $this->default_form_language);
		else
		{
			if (Tools::isSubmit('categoryBox'))
				$selected_cat = Category::getCategoryInformations(Tools::getValue('categoryBox', array($default_category)), $this->default_form_language);
			else
				$selected_cat = Product::getProductCategoriesFull($product->id, $this->default_form_language);
		}

		// Multishop block
		$data->assign('feature_shop_active', Shop::isFeatureActive());
		$helper = new HelperForm();
		if ($this->object && $this->object->id)
			$helper->id = $this->object->id;
		else
			$helper->id = null;
		$helper->table = $this->table;
		$helper->identifier = $this->identifier;

		// Accessories block
		$accessories = Product::getAccessoriesLight($this->context->language->id, $product->id);
		if ($post_accessories = Tools::getValue('inputAccessories'))
		{
			$post_accessories_tab = explode('-', Tools::getValue('inputAccessories'));
			foreach ($post_accessories_tab as $accessory_id)
				if (!$this->haveThisAccessory($accessory_id, $accessories) && $accessory = Product::getAccessoryById($accessory_id))
					$accessories[] = $accessory;
		}
		$data->assign('accessories', $accessories);
		
		// recipe block
		$recipes = Product::getRecipesLight($this->context->language->id, $product->id);
		if ($post_recipes = Tools::getValue('inputRecipes'))
		{
			$post_recipes_tab = explode('-', Tools::getValue('inputRecipes'));
			foreach ($post_recipes_tab as $recipe_id)
				if (!$this->haveThisRecipe($recipe_id, $recipes) && $recipe = Product::getRecipeById($recipe_id))
					$recipes[] = $recipe;
		}
		$data->assign('recipes', $recipes);
		
		$product->manufacturer_name = Manufacturer::getNameById($product->id_manufacturer);

		$tab_root = array('id_category' => $root->id, 'name' => $root->name);
		$helper = new Helper();
		$category_tree = $helper->renderCategoryTree($tab_root, $selected_cat, 'categoryBox', false, true, array(), false, true);
		$data->assign(array('default_category' => $default_category,
					'selected_cat_ids' => implode(',', array_keys($selected_cat)),
					'selected_cat' => $selected_cat,
					'id_category_default' => $product->getDefaultCategory(),
					'category_tree' => $category_tree,
					'product' => $product,
					'link' => $this->context->link,
					'is_shop_context' => Shop::getContext() == Shop::CONTEXT_SHOP
		));

		$this->tpl_form_vars['custom_form'] = $data->fetch();
	}
	
	public function updateRecipes($recipe)
	{
		$recipe->deleteAccessories();
		if ($recipes = Tools::getValue('inputRecipes'))
		{
			$recipes_id = array_unique(explode('-', $recipes));
			if (count($recipes_id))
			{
				array_pop($recipes_id);
				$recipe->changeAccessories($recipes_id);
			}
		}
	}
	
	public function renderForm()
	{
		// This nice code (irony) is here to store the product name, because the row after will erase product name in multishop context
		$this->product_name = $this->object->name[$this->context->language->id];

		if (!method_exists($this, 'initForm'.$this->tab_display))
			return;

		$product = $this->object;
		$this->product_exists_in_shop = true;
		if ($this->display == 'edit' && Validate::isLoadedObject($product) && Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP && !$product->isAssociatedToShop($this->context->shop->id))
		{
			$this->product_exists_in_shop = false;
			if ($this->tab_display == 'Informations')
				$this->displayWarning($this->l('Warning: this product does not exist in this shop.'));
			
			$default_product = new Product();
			$fields_to_copy = array('minimal_quantity',
											'price',
											'additional_shipping_cost',
											'wholesale_price',
											'on_sale',
											'online_only',
											'unity',
											'unit_price_ratio',
											'ecotax',
											'active',
											'available_for_order',
											'available_date',
											'show_price',
											'indexed',
											'id_tax_rules_group',
											'advanced_stock_management');
			foreach ($fields_to_copy as $field)
				$product->$field = $default_product->$field;
		}

		// Product for multishop
		$this->context->smarty->assign('bullet_common_field', '');
		if (Shop::isFeatureActive() && $this->display == 'edit')
		{
			if (Shop::getContext() != Shop::CONTEXT_SHOP)
			{
				$this->context->smarty->assign(array(
					'display_multishop_checkboxes' => true,
					'multishop_check' => Tools::getValue('multishop_check'),
				));
			}

			if (Shop::getContext() != Shop::CONTEXT_ALL)
			{
				$this->context->smarty->assign('bullet_common_field', '<img src="themes/'.$this->context->employee->bo_theme.'/img/bullet_orange.png" style="vertical-align: bottom" />');
				$this->context->smarty->assign('display_common_field', true);
			}
		}

		$this->tpl_form_vars['tabs_preloaded'] = $this->available_tabs;

		$this->tpl_form_vars['product_type'] = (int)Tools::getValue('type_product', $product->getType());

		$this->getLanguages();

		$this->tpl_form_vars['id_lang_default'] = Configuration::get('PS_LANG_DEFAULT');

		$this->tpl_form_vars['currentIndex'] = self::$currentIndex;
		$this->tpl_form_vars['display_multishop_checkboxes'] = (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP && $this->display == 'edit');
		$this->fields_form = array('');
		$this->display = 'edit';
		$this->tpl_form_vars['token'] = $this->token;
		$this->tpl_form_vars['combinationImagesJs'] = $this->getCombinationImagesJs();
		$this->tpl_form_vars['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');
		$this->tpl_form_vars['post_data'] = Tools::jsonEncode($_POST);
		$this->tpl_form_vars['save_error'] = !empty($this->errors);

		// autoload rich text editor (tiny mce)
		$this->tpl_form_vars['tinymce'] = true;
		$iso = $this->context->language->iso_code;
		$this->tpl_form_vars['iso'] = file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en';
		$this->tpl_form_vars['ad'] = dirname($_SERVER['PHP_SELF']);

		if (Validate::isLoadedObject(($this->object)))
			$id_product = (int)$this->object->id;
		else
			$id_product = (int)Tools::getvalue('id_product');

		$this->tpl_form_vars['form_action'] = $this->context->link->getAdminLink('AdminProducts').'&amp;'.($id_product ? 'id_product='.(int)$id_product : 'addproduct');
		$this->tpl_form_vars['id_product'] = $id_product;

		// Transform configuration option 'upload_max_filesize' in octets
		$upload_max_filesize = Tools::getOctets(ini_get('upload_max_filesize'));

		// Transform configuration option 'upload_max_filesize' in MegaOctets
		$upload_max_filesize = ($upload_max_filesize / 1024) / 1024;

		$this->tpl_form_vars['upload_max_filesize'] = $upload_max_filesize;
		$this->tpl_form_vars['country_display_tax_label'] = $this->context->country->display_tax_label;
		$this->tpl_form_vars['has_combinations'] = $this->object->hasAttributes();

		// let's calculate this once for all
		if (!Validate::isLoadedObject($this->object) && Tools::getValue('id_product'))
			$this->errors[] = 'Unable to load object';
		else
		{
			$this->_displayDraftWarning($this->object->active);

			// if there was an error while saving, we don't want to lose posted data
			if (!empty($this->errors))
				$this->copyFromPost($this->object, $this->table);

			$this->initPack($this->object);
			$this->{'initForm'.$this->tab_display}($this->object);
			$this->tpl_form_vars['product'] = $this->object;
			if ($this->ajax)
				if (!isset($this->tpl_form_vars['custom_form']))
					throw new PrestaShopException('custom_form empty for action '.$this->tab_display);
				else
					return $this->tpl_form_vars['custom_form'];
		}
		$parent = parent::renderForm();
		$this->addJqueryPlugin(array('autocomplete', 'fancybox', 'typewatch'));
		return $parent;
	}
	
	public function initFormPrices($obj)
	{
		$data = $this->createTemplate($this->tpl_form);
		$product = $obj;
		if ($obj->id)
		{
			$shops = Shop::getShops();
			$countries = Country::getCountries($this->context->language->id);
			$groups = Group::getGroups($this->context->language->id);
			$currencies = Currency::getCurrencies();
			$attributes = $obj->getAttributesGroups((int)$this->context->language->id);
			$combinations = array();
			foreach ($attributes as $attribute)
			{
				$combinations[$attribute['id_product_attribute']]['id_product_attribute'] = $attribute['id_product_attribute'];
				if (!isset($combinations[$attribute['id_product_attribute']]['attributes']))
					$combinations[$attribute['id_product_attribute']]['attributes'] = '';
				$combinations[$attribute['id_product_attribute']]['attributes'] .= $attribute['attribute_name'].' - ';

				$combinations[$attribute['id_product_attribute']]['price'] = Tools::displayPrice(
					Tools::convertPrice(
						Product::getPriceStatic((int)$obj->id, false, $attribute['id_product_attribute']),
						$this->context->currency
					), $this->context->currency
				);
			}
			foreach ($combinations as &$combination)
				$combination['attributes'] = rtrim($combination['attributes'], ' - ');
			$data->assign('specificPriceModificationForm', $this->_displaySpecificPriceModificationForm(
				$this->context->currency, $shops, $currencies, $countries, $groups)
			);

			$data->assign('ecotax_tax_excl', $obj->ecotax);
			$this->_applyTaxToEcotax($obj);

			$data->assign(array(
				'shops' => $shops,
				'admin_one_shop' => count($this->context->employee->getAssociatedShops()) == 1,
				'currencies' => $currencies,
				'countries' => $countries,
				'groups' => $groups,
				'combinations' => $combinations,
				'product' => $product,
				'multi_shop' => Shop::isFeatureActive(),
				'link' => new Link()
			));
		}
		else
			$this->displayWarning($this->l('You must save this product before adding specific prices'));

		// prices part
		$data->assign(array(
			'link' => $this->context->link,
			'currency' => $currency = $this->context->currency,
			'tax_rules_groups' => TaxRulesGroup::getTaxRulesGroups(true),
			'taxesRatesByGroup' => TaxRulesGroup::getAssociatedTaxRatesByIdCountry($this->context->country->id),
			'ecotaxTaxRate' => Tax::getProductEcotaxRate(),
			'tax_exclude_taxe_option' => Tax::excludeTaxeOption(),
			'ps_use_ecotax' => Configuration::get('PS_USE_ECOTAX'),
			'ecotax_tax_excl' => 0
		));

		$product->price = Tools::convertPrice($product->price, $this->context->currency, true, $this->context);
		if ($product->unit_price_ratio != 0)
			$data->assign('unit_price', Tools::ps_round($product->price / $product->unit_price_ratio, 2));
		else
			$data->assign('unit_price', 0);
		$data->assign('ps_tax', Configuration::get('PS_TAX'));

		$data->assign('country_display_tax_label', $this->context->country->display_tax_label);
		$data->assign(array(
			'currency', $this->context->currency,
			'product' => $product,
			'token' => $this->token
		));
		
		// display gap
		$gap = $product->price - $product->wholesale_price ;
		$data->assign(array(
			'gap' => $gap
		));

		$this->tpl_form_vars['custom_form'] = $data->fetch();
	}

}

