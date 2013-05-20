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

	public function setMedia()
	{
		// if website is accessed by mobile device
		// @see FrontControllerCore::setMobileMedia()
		if ($this->context->getMobileDevice() != false)
		{
			$this->setMobileMedia();
			return true;
		}
		$this->addCSS(_THEME_CSS_DIR_.'global.css', 'all');
		$this->addjquery();
		$this->addJquery('1.9.0');
		$this->addjqueryPlugin('easing');
		// Theme lcdb
		$this->addCSS(_THEME_CSS_DIR_.'lib/normalize.css');
		$this->addJS(_THEME_JS_DIR_.'plugins/glDatePicker.js');
		$this->addJS(_THEME_JS_DIR_.'plugins/cufon.js');
		$this->addJS(_THEME_JS_DIR_.'plugins/font-cufon.js');
		$this->addJS(_THEME_JS_DIR_.'plugins/jquery.placeholder.min.js');
		$this->addJS(_THEME_JS_DIR_.'plugins/modernizr-2.6.2.min.js');
		$this->addJS(_THEME_JS_DIR_.'plugins/custom_checkbox_and_radio.js');
		$this->addJS(_THEME_JS_DIR_.'plugins/jquery.scroll.min.js');
		$this->addJS(_THEME_JS_DIR_.'plugins/jquery.selectbox-0.2.min.js');
		$this->addJS(_THEME_JS_DIR_.'main.js');
		$this->addJS(_THEME_JS_DIR_.'googleAnalytics.js');

		if (Tools::isSubmit('live_edit') && Tools::getValue('ad') && Tools::getAdminToken('AdminModulesPositions'.(int)Tab::getIdFromClassName('AdminModulesPositions').(int)Tools::getValue('id_employee')))
		{
			$this->addJqueryUI('ui.sortable');
			$this->addjqueryPlugin('fancybox');
			$this->addJS(_PS_JS_DIR_.'hookLiveEdit.js');
			$this->addCSS(_PS_CSS_DIR_.'jquery.fancybox-1.3.4.css', 'all'); // @TODO
		}
		if ($this->context->language->is_rtl)
			$this->addCSS(_THEME_CSS_DIR_.'rtl.css');

		// Execute Hook FrontController SetMedia
		Hook::exec('actionFrontControllerSetMedia', array());
	}
}

