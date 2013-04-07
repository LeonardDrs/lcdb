<?php

class AdminProductsController extends AdminProductsControllerCore
{
	
	
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
		$recipes = Product::getAccessoriesLight($this->context->language->id, $product->id);

		if ($post_recipes = Tools::getValue('inputRecipes'))
		{
			$post_recipes_tab = explode('-', Tools::getValue('inputRecipes'));
			foreach ($post_recipes_tab as $recipe_id)
				if (!$this->haveThisAccessory($recipe_id, $recipes) && $recipe = Product::getAccessoryById($recipe_id))
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
}
