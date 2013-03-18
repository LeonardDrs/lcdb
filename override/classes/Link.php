<?php

class Link extends LinkCore
{
	/**
	 * Create a link to a Recipe category
	 *
	 * @param mixed $category RecipeCategory object (can be an ID category, but deprecated)
	 * @param string $alias
	 * @param int $id_lang
	 * @return string
	 */
	public function getRecipeCategoryLink($category, $alias = null, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$url = _PS_BASE_URL_.__PS_BASE_URI__.$this->getLangLink($id_lang);

		if (!is_object($category))
			$category = new RecipeCategory($category, $id_lang);

		// Set available keywords
		$params = array();
		$params['id'] = $category->id;
		$params['rewrite'] = (!$alias) ? $category->link_rewrite : $alias;
		$params['meta_keywords'] =	Tools::str2url($category->meta_keywords);
		$params['meta_title'] = Tools::str2url($category->meta_title);

		return $url.Dispatcher::getInstance()->createUrl('recipe_category_rule', $id_lang, $params, $this->allow);
	}
	
	/**
	 * Create a link to a Recipe page
	 *
	 * @param mixed $recipe Recipe object (can be an ID Recipe, but deprecated)
	 * @param string $alias
	 * @param bool $ssl
	 * @param int $id_lang
	 * @return string
	 */
	public function getRecipeLink($recipe, $alias = null, $ssl = false, $id_lang = null)
	{
		$base = (($ssl && $this->ssl_enable) ? _PS_BASE_URL_SSL_ : _PS_BASE_URL_);

		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$url = $base.__PS_BASE_URI__.$this->getLangLink($id_lang);

		if (!is_object($recipe))
			$recipe = new Recipe($recipe, $id_lang);

		// Set available keywords
		$params = array();
		$params['id'] = $recipe->id;
		$params['rewrite'] = (!$alias) ? (is_array($recipe->link_rewrite) ? $recipe->link_rewrite[(int)$id_lang] : $recipe->link_rewrite) : $alias;

		if (isset($recipe->meta_keywords) && !empty($recipe->meta_keywords))
			$params['meta_keywords'] = is_array($recipe->meta_keywords) ?  Tools::str2url($recipe->meta_keywords[(int)$id_lang]) :  Tools::str2url($recipe->meta_keywords);
		else
			$params['meta_keywords'] = '';

		if (isset($recipe->meta_title) && !empty($recipe->meta_title))
			$params['meta_title'] = is_array($recipe->meta_title) ? Tools::str2url($recipe->meta_title[(int)$id_lang]) : Tools::str2url($recipe->meta_title);
		else
			$params['meta_title'] = '';

		return $url.Dispatcher::getInstance()->createUrl('recipe_rule', $id_lang, $params, $this->allow);
	}
}

