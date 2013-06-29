<?php

class DeliveryControllerCore extends FrontController
{
	public $php_self = 'delivery';

	public function setMedia()
	{
		parent::setMedia();

		$this->addJS(_THEME_JS_DIR_.'delivery.js');
		$this->addCSS(_THEME_CSS_DIR_.'delivery.css');
	}

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
			
			$delivery = array();
			$delivery['id'] = "1";
			$delivery['minimum'] = "65€";
			$delivery['value'] = array("65€ à 100€", "100€ à 190€", "Supérieur à 190€");
			$delivery['shipping'] = array("20€", "14€", "Offerts");
			$delivery['time'] = "Entre 8h et 15h le mercredi et le vendredi";
			
			$this->context->smarty->assign('delivery', $delivery);
		}
	}
}

