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
	
	public function postProcess()
	{
		if (Tools::isSubmit('bouton_carre'))
		{
			// montant de la commande en fonction des tranches de prix 
			// tranches de prix qu'on obtient en fonction de la zone 
			// zone qu'on obtient à partir du code postal
			// on affiche le creneau horaire de cette zone
			
			// a quelle endroit la zone est linké à un cp ? 
		}
	}
}

