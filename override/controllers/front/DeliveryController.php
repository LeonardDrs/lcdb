<?php

class DeliveryControllerCore extends FrontController
{
	public $php_self = 'delivery';

	public function setMedia()
	{
		parent::setMedia();

		if ($this->assignCase == 1)
			$this->addJS(_THEME_JS_DIR_.'delivery.js');

		$this->addCSS(_THEME_CSS_DIR_.'delivery.css');
	}

	/**
	 * Assign template vars related to page content
	 * @see FrontController::initContent()
	 */
	public function initContent()
	{
		parent::initContent();

		$this->setTemplate(_PS_THEME_DIR_.'delivery.tpl');
	}
	
}

