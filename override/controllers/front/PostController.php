<?php

class PostControllerCore extends FrontController
{
	public $php_self = 'post';

	public function setMedia()
	{
		parent::setMedia();

		if ($this->assignCase == 1)
			$this->addJS(_THEME_JS_DIR_.'post.js');

		$this->addCSS(_THEME_CSS_DIR_.'post.css');
	}

	/**
	 * Assign template vars related to page content
	 * @see FrontController::initContent()
	 */
	public function initContent()
	{
		parent::initContent();

		$this->setTemplate(_PS_THEME_DIR_.'post.tpl');
	}
}
