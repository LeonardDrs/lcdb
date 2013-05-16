<?php

class Tools extends ToolsCore
{
	public static function getFullPath($id_category, $end, $type_cat = 'products', Context $context = null)
	{
		if (!$context)
			$context = Context::getContext();

		$id_category = (int)$id_category;
		$pipe = (Configuration::get('PS_NAVIGATION_PIPE') ? Configuration::get('PS_NAVIGATION_PIPE') : '>');

		$default_category = 1;
		if ($type_cat === 'products')
		{
			$default_category = $context->shop->getCategory();
			$category = new Category($id_category, $context->language->id);
		}
		else if ($type_cat === 'CMS')
		    $category = new CMSCategory($id_category, $context->language->id);
		else if ($type_cat === 'Recipe')
		    $category = new RecipeCategory($id_category, $context->language->id);

		if (!Validate::isLoadedObject($category))
			$id_category = $default_category;
		if ($id_category == $default_category)
			return htmlentities($end, ENT_NOQUOTES, 'UTF-8');

		return Tools::getPath($id_category, $category->name, true, $type_cat).'<span class="navigation-pipe">'.$pipe.'</span> <span class="navigation_product">'.htmlentities($end, ENT_NOQUOTES, 'UTF-8').'</span>';
	}
}

