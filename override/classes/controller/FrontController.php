<?php

class FrontController extends FrontControllerCore
{
	public function init()
	{
		parent::init();
		
		$menu_cats = Category::getChildren(2, $this->context->language->id);
		$menu_infos = CMS::getCMSPages($this->context->language->id, 6);
		$menu_approach = CMS::getCMSPages($this->context->language->id, 5);
		$menu_recipe = RecipeCategory::getChildren(1, $this->context->language->id);
		
		$this->context->smarty->assign(array(
			'menu_cats' => $menu_cats,
			'menu_infos' => $menu_infos,
			'menu_recipes' => $menu_cats,
			'menu_approach' => $menu_approach,
			'menu_recipe' => $menu_recipe
		));
	}
}

