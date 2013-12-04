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
		if (Tools::isSubmit('bouton_carre') || $this->ajax) {

			$zip = Tools::getValue("code_postal");

			if($zip != null){
				$address = new Address();
				$id_zone = $address->getZoneByZipCode($zip);
			}else{
				$id_zone = 0;
			}

			$delivery = array();
			$delivery['zone'] = $id_zone;

			if($id_zone == 1){
				// paris
				$delivery['minimum_order'] = "40 €";
				$delivery['infos'] = array(
					array(
						"mode" => "Livraison à domicile",
						"ship" => ($this->ajax) ? "<b class='rouge'>Offerte</b>" : "Offerts",
						"time" => "Entre 7h30 et 20h, un créneau de 1h"
					),array(
						"mode" =>"Livraison en Point Relais",
						"ship" => ($this->ajax) ? "<b class='rouge'>Offerte</b>" : "Offerts",
						"time" => "L'après-midi, les horaires<br/> varient selon le point relais"
					)
				);
				$delivery['content'] = "<p class='titre_vert_2'>Pour une livraison à domicile ou au bureau</p><p>Quoi de mieux que de se faire livrer chez soi, directement 
				d'Auvergne dans son frigo? <strong>Nous livrons à domicile ou au bureau de 7h30 à 20h</strong>, dans un créneau horaire  d'une heure minimum que vous 
				nous communiquez lors de la commande. Dans l'idéal deux créneaux  horaires sont souhaités, dont un le matin.</p><p class='titre_vert_2'>Pour une livraison en 
				Point Relais</p><p>Les Colis du Boucher veulent vous offrir le maximum de service et de souplesse. Pour cela nous vous proposons une livraison à domicile, 
				à votre bureau ou en Point Relais.<br><br>Le Point Relais donne l'avantage des horaires beaucoup plus souples. <strong>Vous récupérez votre Colis quand 
				cela vous arrange à partir de 12h</strong>. Les horaires de retrait de colis  varient selon le point relais.</p>
				<div class='lien_vert italique'>
					<a href='#' title='Voir la carte des points relais' id='show-map'><span>Voir la carte des points relais</span></a>
				</div>
				<div id='relays'>
					<div class='popin'>
						<a href='#' title='Fermer' class='popin-close'></a>
						<p class='popin-title'>Points relais</p>
						<div class='clearfix content-wrapper'>
							<div id='left-side'><ul id='relay-list'></ul></div>
							<div id='right-side'><div id='map'></div></div>
						</div>
					</div>
				</div>";
			}elseif($id_zone == 9){
				// proche banlieue
				$delivery['minimum_order'] = "65 €";
				$delivery['infos'] = array(
					array(
						"price" => "65 € à 100 €",
						"ship" => "20 €*"
					),array(
						"price" =>"Supérieur à 100 €",
						"ship" => ($this->ajax) ? "<b class='rouge'>Offerte</b>" : "Offerts"
					)
				);
				$delivery['time'] = "Entre 7h30 et 20h, un créneau de 2h minimum";
				$delivery['content'] = "<p class='titre_vert_2'>Pour une livraison à domicile ou au bureau</p><p>Quoi de mieux que de se faire livrer chez soi,
				 directement d'Auvergne dans son frigo? <strong>Nous livrons à domicile ou au bureau de 7h30 à 20h</strong>, dans un créneau horaire d'une heure minimum
				 que vous nous communiquez lors de la commande. Dans l'idéal deux créneaux  horaires sont souhaités, dont un le matin.</p";
			}elseif($id_zone == 10){
				// grande banlieue
				$delivery['minimum_order'] = "65 €";
				$delivery['infos'] = array(
					array(
						"price" => "65 € à 100 €",
						"ship" => "20 €*"
					),array(
						"price" =>"100 € à 190 €",
						"ship" => "14 €*"
					),array(
						"price" =>"Supérieur à 190 €",
						"ship" => ($this->ajax) ? "<b class='rouge'>Offerte</b>" : "Offerts"
					)
				);
				$delivery['time'] = "Entre 14h et 22h en semaine, un créneau de 2h <br/>Entre 8h et 13h le samedi";
				$delivery['content'] = "<p class='titre_vert_2'>Pour une livraison à domicile ou au bureau</p><p>Quoi de mieux que de se faire livrer chez soi, 
				directement d’Auvergne dans son frigo? Nous livrons à domicile ou au bureau de <strong>14h à 22h en semaine</strong>, dans un créneau horaire de 2 
				heures que vous nous communiquez lors de la commande, ou le <strong>samedi de 8h à 13h</strong>.</p><p class='titre_vert_2'>Regroupement de commande</p>
				<p>Parlez des Colis du Boucher à vous voisins ou au bureau et économisez les frais de livraison. En commandant à plusieurs pour le même jour et à la même 
				adresse de livraison vous pourrez ainsi plus facilement faire baisser les frais de livraison, voire les annuler complètement.</p>";
			}elseif($id_zone == 11){
				// province
				$delivery['minimum_order'] = "65 €";
				$delivery['infos'] = array(
					array(
						"price" => "65 € à 100 €",
						"ship" => "20 €*"
					),array(
						"price" =>"100 € à 190 €",
						"ship" => "14 €*"
					),array(
						"price" =>"Supérieur à 190 €",
						"ship" => ($this->ajax) ? "<b class='rouge'>Offerte</b>" : "Offerts"
					)
				);
				$delivery['time'] = "Entre 8h et 15h le mercredi et vendredi";
				$delivery['content'] = "<p class='titre_vert_2'>Regroupement de commande</p><p>Parlez des Colis du Boucher à vous voisins ou au bureau
				et économisez les frais de livraison. En commandant à plusieurs pour le même jour et à la même adresse de livraison vous pourrez ainsi
				plus facilement faire baisser les frais de livraison, voire les annuler complètement.</p>";
			}else{
				$delivery['content'] = 'error';
			}

			$delivery['more'] = '<span class="lien_vert italique"><a href="'._PS_BASE_URL_.__PS_BASE_URI__.'index.php?controller=delivery">En savoir plus sur la livraison</a></span>';

			if($this->ajax){
				echo Tools::jsonEncode($delivery);
			}else{
				$this->context->smarty->assign('delivery', $delivery);
			}
		}
	}
}

