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

			$zip = Tools::getValue("code_postal");

			if($zip != null){
				$address = new Address();
				$id_zone = $address->getZoneByZipCode($zip);
			}else{
				$id_zone = 0;
			}

			// requete avec le zip code
			// on remplis le tableau suivant les resultats
			// si pas de resultat, on retourne 0
			
			$delivery = array();
			$delivery['id'] = $id_zone;
			$delivery['minimum'] = "65€";
			$delivery['value'] = array("65€ à 100€", "100€ à 190€", "Supérieur à 190€");
			$delivery['shipping'] = array("20€", "14€", "Offerts");
			$delivery['time'] = "Entre 8h et 15h le mercredi et le vendredi";
			
			$this->context->smarty->assign('delivery', $delivery);
		}
	}
}

