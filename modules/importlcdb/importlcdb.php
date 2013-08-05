<?php

if (!defined('_PS_VERSION_'))
	exit;

define('UNFRIENDLY_ERROR', false);

class Importlcdb extends Module
{
	public function __construct()
	{
		$this->name = 'importlcdb';
		$this->tab = 'migration_tools';
		$this->version = '2.0';
		$this->author = 'PrestaShop';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Import LCDB');
		$this->description = $this->l('Synchronizes previous database of shop');
		$path = dirname(__FILE__);
		if (strpos(__FILE__, 'Module.php') !== false)
			$path .= '/../modules/'.$this->name;
		// include_once $path.'/EditorialClass.php';
	}

	public function install()
	{
		if (!parent::install())
			return false;
	}
	
	public function uninstall()
	{

		if (!parent::uninstall())
			return false;

		return true;
	}

	public function displayForm()
	{
		// Get default Language
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		// Init Fields form array
		$fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Settings'),
			),
			'input' => array(
				array(
					'type' => 'checkbox',
					'label' => $this->l('Tables:'),
					'name' => 'table',
					'values' => array(
						'query' => array(
							array(
								'id' => 0,
								'name' => $this->l('Produits')
							),
							array(
								'id' => 1,
								'name' => $this->l('Clients / Adresses / Parrainage')
							),
							array(
								'id' => 2,
								'name' => $this->l('Commandes')
							),
							array(
								'id' => 3,
								'name' => $this->l('Messages')
							),
							array(
								'id' => 4,
								'name' => $this->l('Temoignages')
							),
							array(
								'id' => 5,
								'name' => $this->l('Presse')
							)
							
						),
						'id' => 'id',
						'name' => 'name'
					),
					'desc' => $this->l('Base that you want synchronize')
				),
			),
			'submit' => array(
				'title' => $this->l('Save'),
				'class' => 'button'
			)
		);

		$helper = new HelperForm();

		// Module, t    oken and currentIndex
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

		// Language
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;

		// Title and toolbar
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;        // false -> remove toolbar
		$helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
		$helper->submit_action = 'submit'.$this->name;
		$helper->toolbar_btn = array(
			'synchronize' =>
		array(
			'desc' => $this->l('Synchronize'),
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
			'&token='.Tools::getAdminTokenLite('AdminModules'),
			),
		'back' => array(
			'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->l('Back to list')
			)
			);

		// Load current value
		$helper->fields_value['MYMODULE_NAME'] = Configuration::get('MYMODULE_NAME');

		return $helper->generateForm($fields_form);
	}
	
	public function updateProducts($content)
	{
		
		foreach ($content as $row){
			
			echo "id_produit ".$row->idproduit;
			echo "<br/>";
			echo "type ".$row->type;
			echo "<br/>";
			echo "libellé ".$row->libelle;
			echo "<br/>";
			echo "conditionnement ".$row->conditionnement;
			echo "<br/>";
			echo "personnes ".$row->pers;
			echo "<br/>";
			echo "frais ".$row->frais;
			echo "<br/>";
			echo "bio ? ".$row->bio;
			echo "<br/>";
			echo "label rouge ? ".$row->labelrouge;
			echo "<br/>";
			echo "prix ".$row->prix;
			echo "<br/>";
			echo "tva".$row->tva;
			echo "<br/>";
			echo "poids ".$row->poids;
			echo "<br/>";
			echo "prix kg ".$row->prixkg;
			echo "<br/>";
			echo "etat ".$row->etat;
			echo "<br/>";
			echo "cible ".$row->cible;
			echo "<br/>";
			echo "date limite ".$row->datelimite;
			echo "<br/>";
			echo "<br/>";

			if($row->libelle == null){
				echo "Erreur : Nom vide !";
				echo "<br/>";
			}else{
				$sql = 'SELECT p.id_product
						FROM '._DB_PREFIX_.'product p
						WHERE p.id_lcdb_import = '.(int)$row->idproduit;

				$result = Db::getInstance()->getValue($sql);

				if($result !=null){
					echo 'le produit existe <br/>';
				}else{
					
					$product = new Product();
					$product->id_lcdb_import = $row->idproduit;
					
					$link_rewrite = Tools::link_rewrite($row->libelle);
					$valid_link = Validate::isLinkRewrite($link_rewrite);
					if (!$valid_link)
						$this->warnings[] = sprintf(
							Tools::displayError('Rewrite link for %1$s was re-written.'),
							$link_rewrite
						);
					
					$product->name = Importlcdb::createMultiLangField($row->libelle);
					$product->link_rewrite = Importlcdb::createMultiLangField($link_rewrite);
					
					$product->id_shop_default = 1;
					$product->id_category_default = 14;
					
					// if($row->cible == "pro"){
					// 	$product->addToCategories(array(14, 6)); // ug
					// }else{
					// 	$product->addToCategories(array(14));
					// }
					
					$product->price = $row->prix;
					$product->unit_price = $row->prixkg;
					$product->unity = "kg";
					
					// type (épicerie, volaille...)
					
					// conditionnement : $row->conditionnement
					// personnes : $row->pers
					// frais :  $row->frais
					// bio ? : $row->bio (oui)
					// label rouge ? : $row->labelrouge (oui)
					if($row->bio == "oui"){
					
					}elseif($row->labelrouge == "oui"){
					
					}

					// poids : $row->poids
					
					// add feature
					//$product->addFeaturesCustomToDB(777, $lang, $cust);
					// associe feature to product
					//$product->addFeaturesToDB("", 777);
					
					//if (isset($product->id_category))
					//	$product->updateCategories(array_map('intval', $product->id_category));
					
//					
//					
//	
//					// Features import
//					$features = get_object_vars($product);
//	
//					if (isset($features['features']) && !empty($features['features']))
//						foreach (explode($this->multiple_value_separator, $features['features']) as $single_feature)
//						{
//							$tab_feature = explode(':', $single_feature);
//							$feature_name = trim($tab_feature[0]);
//							$feature_value = trim($tab_feature[1]);
//							$position = isset($tab_feature[2]) ? $tab_feature[2]: false;

//							$id_feature = Feature::addFeatureImport($feature_name, $position);
//							$id_feature_value = FeatureValue::addFeatureValueImport($id_feature, $feature_value);
//							Product::addFeatureProductImport($product->id, $id_feature, $id_feature_value);
//						}
//					// clean feature positions to avoid conflict
//					Feature::cleanPositions();
//						
						
					$product->date_start = date("Y-m-d H:i:s");
					$product->date_end = $row->datelimite;
					
					if($row->etat == "off"){
						$product->active = 0;
					}
					
					$res = false;
					$field_error = $product->validateFields(UNFRIENDLY_ERROR, true);
					$lang_field_error = $product->validateFieldsLang(UNFRIENDLY_ERROR, true);

					if ($field_error === true && $lang_field_error === true)
					{

						// If no id_product or update failed
						if (!$res)
						{
							if (isset($product->date_add) && $product->date_add != '')
								$res = $product->add(false);
							else
								$res = $product->add();
						}
					}else{
						echo "<br/><br/>error<br/><br/>";
					}

					if (!$res)
					{
						$this->errors[] = sprintf(
							Tools::displayError('product cannot be saved')
						);
						$this->errors[] = ($field_error !== true ? $field_error : '').($lang_field_error !== true ? $lang_field_error : '').
							Db::getInstance()->getMsgError();

					}else{
						echo "Produit enregistré <br/>";
					}

				}

				die();
			}

		}
		
	}
	
	public function updateCustomers($content)
	{
		
		foreach ($content as $row){
			
			if($row->email == null){
				echo "Erreur : User vide !";
				echo "<br/>";
			}else{
				$sql = 'SELECT c.id_customer
						FROM '._DB_PREFIX_.'customer c
						WHERE c.id_lcdb_import = '.(int)$row->idclient;
				
				$result = Db::getInstance()->getValue($sql);
				
				if($result !=null){
					echo 'l utilisateur existe <br/>';
				}else{
					
					echo "id ".$row->idclient;
					echo "<br/>";
					echo "civilite ".$row->civil;
					echo "<br/>";
					echo "nom ".$row->nom;
					echo "<br/>";
					echo "prenom ".$row->prenom;
					echo "<br/>";
					echo "adresse".$row->adresse;
					echo "<br/>";
					echo "cp ".$row->cp;
					echo "<br/>";
					echo "ville ".$row->ville;
					echo "<br/>";
					echo "acces ".$row->acces;
					echo "<br/>";
					echo "tel1 ".$row->tel1;
					echo "<br/>";
					echo "tel2 ".$row->tel2;
					echo "<br/>";
					echo "email ".$row->email;
					echo "<br/>";
					echo "password ".$row->password;
					echo "<br/>";
					echo "actif ".$row->actif;
					echo "<br/>";
					echo "insicrption ".$row->inscription;
					echo "<br/>";
					echo "vic ".$row->vic;
					echo "<br/>";
					echo "statut ".$row->statut;
					echo "<br/>";
					echo "abonnement ".$row->abonne;
					echo "<br/>";
					echo "pro ".$row->pro;
					echo "<br/>";
					echo "last ".$row->last;
					echo "<br/>";
					echo "ce ".$row->ce;
					echo "<br/>";
					echo "kelce ".$row->kelce;
					echo "<br/>";
					echo "parrainde ".$row->parrainde;
					echo "<br/>";
					echo "filleulde ".$row->filleulde;
					echo "<br/>";
					echo "status ".$row->status;
					echo "<br/>";
					echo "prov ".$row->prov;
					echo "<br/>";
					echo "detailprov1 ".$row->detailprov1;
					echo "<br/>";
					echo "promo parrain ".$row->promo_parrain;
					echo "<br/>";
					echo "detailprov2 ".$row->detailprov2;
					echo "<br/>";
					echo "prime_parrain ".$row->prime_parrain;
					echo "<br/>";
					echo "prime vic ".$row->prime_vic;
					echo "<br/>";
					echo "avoir ".$row->avoir;
					echo "<br/>";
					echo "optin ".$row->optin;
					echo "<br/>";
					echo "note ".$row->note;
					echo "<br/>";
					echo "extract ".$row->extract;
					echo "<br/>";
					
					// ajouter un thread 
					// ajouter un message 
					// associer au bon client
					// l'adresser au bon destinataire 
					
					
					
					
					
					
					
					// $guestbook = new Guestbook();
					// 					$guestbook->id_lcdb_import = $row->idcomment;
					// 					$guestbook->firstname = "Utilisateur";
					// 					$guestbook->lastname = "inconnu";
					// 					$guestbook->message = Importlcdb::createMultiLangField($row->comment);
					// 					$guestbook->active = 1;
					// 					
					// 					$res = false;
					// 					$field_error = $guestbook->validateFields(UNFRIENDLY_ERROR, true);
					// 					$lang_field_error = $guestbook->validateFieldsLang(UNFRIENDLY_ERROR, true);
					// 					
					// 					if ($field_error === true && $lang_field_error === true)
					// 					{
					// 					
					// 						if (!$res)
					// 						{
					// 							$res = $guestbook->add();
					// 						}
					// 					}else{
					// 						echo "<br/>error<br/><br/>";
					// 					}
					// 					
					// 					if (!$res)
					// 					{
					// 						$this->errors[] = sprintf(
					// 							Tools::displayError('post cannot be saved')
					// 						);
					// 						$this->errors[] = ($field_error !== true ? $field_error : '').($lang_field_error !== true ? $lang_field_error : '').
					// 							Db::getInstance()->getMsgError();
					// 						
					// 					}else{
					// 						echo "Commentaire enregistré <br/><br/>";
					// 					}
					// 					
				}
			}
			
		}
		
	}
	
	public function updateOrders($content)
	{
		
		
		foreach ($content as $row){
			
			if($row->idcommande == null){
				echo "Erreur : Commande vide !";
				echo "<br/>";
			}else{
				$sql = 'SELECT o.id_order
						FROM '._DB_PREFIX_.'orders o
						WHERE o.id_lcdb_import = '.(int)$row->idcommande;
				
				$result = Db::getInstance()->getValue($sql);
				
				if($result !=null){
					echo 'le message existe <br/>';
				}else{
					
					echo "id commande ".$row->idcommande;
					echo "<br/>";
					echo "id client ".$row->idclient;
					echo "<br/>";
					echo "type ".$row->document;
					echo "<br/>";
					echo "date ".$row->date;
					echo "<br/>";
					echo "montant ".$row->montant;
					echo "<br/>";
					echo "paiement ".$row->paiement;
					echo "<br/>";
					echo "nom ".$row->cp;
					echo "<br/>";
					echo "adresse ".$row->adresse;
					echo "<br/>";
					echo "facturation ".$row->facturation;
					echo "<br/>";
					echo "facture ".$row->facture;
					echo "<br/>";
					echo "facturedone ".$row->facturedone;
					echo "<br/>";
					echo "facturedone2 ".$row->facturedone2;
					echo "<br/>";
					echo "keltype ".$row->keltype;
					echo "<br/>";
					echo "pr ".$row->pr;
					echo "<br/>";
					echo "creneau_de1 ".$row->creneau_de1;
					echo "<br/>";
					echo "creneau_hor ".$row->creneau_hor;
					echo "<br/>";
					echo "creneau_a1 ".$row->creneau_a1;
					echo "<br/>";
					echo "creneau_de2 ".$row->creneau_de2;
					echo "<br/>";
					echo "creneau_a2 ".$row->creneau_a2;
					echo "<br/>";
					echo "creneau_de3 ".$row->creneau_de3;
					echo "<br/>";
					echo "creneau_a3 ".$row->creneau_a3;
					echo "<br/>";
					echo "timestamp ".$row->timestamp;
					echo "<br/>";
					echo "status ".$row->status;
					echo "<br/>";
					echo "ip ".$row->ip;
					echo "<br/>";
					echo "compta_valide ".$row->compta_valide;
					echo "<br/>";
					echo "recup_avoir ".$row->recup_avoir;
					echo "<br/>";
					echo "passe_le ".$row->passe_le;
					echo "<br/>";
					
					// order, order detail, order carrier, order invoice...
					
					
					
					
					// $order = new Order();
					// // content
					// $order->name = "Test de produit";
					// $order->id_address_delivery = 2;
					// $order->id_address_invoice = 2;
					// $order->secure_key = "81cbf1e93f9bbd6c87413fd21822e537";
					// $order->id_cart = 2;
					// $order->id_currency = 1;
					// $order->id_lang = 5;
					// $order->id_customer = 2;
					// $order->id_carrier = 1;
					// $order->payment = "Banane";
					// $order->total_paid = 100;
					// $order->total_paid_real = 0;
					// $order->total_products = 80;
					// $order->total_products_wt = 88;
					// $order->conversion_rate = 1.0;
					
					
					
					
					
					
					// $guestbook = new Guestbook();
					// 					$guestbook->id_lcdb_import = $row->idcomment;
					// 					$guestbook->firstname = "Utilisateur";
					// 					$guestbook->lastname = "inconnu";
					// 					$guestbook->message = Importlcdb::createMultiLangField($row->comment);
					// 					$guestbook->active = 1;
					// 					
					// 					$res = false;
					// 					$field_error = $guestbook->validateFields(UNFRIENDLY_ERROR, true);
					// 					$lang_field_error = $guestbook->validateFieldsLang(UNFRIENDLY_ERROR, true);
					// 					
					// 					if ($field_error === true && $lang_field_error === true)
					// 					{
					// 					
					// 						if (!$res)
					// 						{
					// 							$res = $guestbook->add();
					// 						}
					// 					}else{
					// 						echo "<br/>error<br/><br/>";
					// 					}
					// 					
					// 					if (!$res)
					// 					{
					// 						$this->errors[] = sprintf(
					// 							Tools::displayError('post cannot be saved')
					// 						);
					// 						$this->errors[] = ($field_error !== true ? $field_error : '').($lang_field_error !== true ? $lang_field_error : '').
					// 							Db::getInstance()->getMsgError();
					// 						
					// 					}else{
					// 						echo "Commentaire enregistré <br/><br/>";
					// 					}
					// 					
				}
			}
			
		}
		
	}
	
	public function updateMessages($content)
	{
		
		foreach ($content as $row){
			
			if($row->comment == null){
				echo "Erreur : Message vide !";
				echo "<br/>";
			}else{
				$sql = 'SELECT g.id_guestbook
						FROM '._DB_PREFIX_.'guestbook g
						WHERE g.id_lcdb_import = '.(int)$row->idcomment;
				
				$result = Db::getInstance()->getValue($sql);
				
				if($result !=null){
					echo 'le message existe <br/>';
				}else{
					
					echo "id_msg ".$row->idmsg;
					echo "<br/>";
					echo "objet ".$row->objet;
					echo "<br/>";
					echo "message ".$row->message;
					echo "<br/>";
					echo "date ".$row->date;
					echo "<br/>";
					echo "fichier joint ".$row->fichierjoint;
					echo "<br/>";
					echo "etat ".$row->etat;
					echo "<br/>";
					
					
					// ajouter un thread 
					// ajouter un message 
					// associer au bon client
					// l'adresser au bon destinataire 
					
					
					
					
					
					
					
					// $guestbook = new Guestbook();
					// 					$guestbook->id_lcdb_import = $row->idcomment;
					// 					$guestbook->firstname = "Utilisateur";
					// 					$guestbook->lastname = "inconnu";
					// 					$guestbook->message = Importlcdb::createMultiLangField($row->comment);
					// 					$guestbook->active = 1;
					// 					
					// 					$res = false;
					// 					$field_error = $guestbook->validateFields(UNFRIENDLY_ERROR, true);
					// 					$lang_field_error = $guestbook->validateFieldsLang(UNFRIENDLY_ERROR, true);
					// 					
					// 					if ($field_error === true && $lang_field_error === true)
					// 					{
					// 					
					// 						if (!$res)
					// 						{
					// 							$res = $guestbook->add();
					// 						}
					// 					}else{
					// 						echo "<br/>error<br/><br/>";
					// 					}
					// 					
					// 					if (!$res)
					// 					{
					// 						$this->errors[] = sprintf(
					// 							Tools::displayError('post cannot be saved')
					// 						);
					// 						$this->errors[] = ($field_error !== true ? $field_error : '').($lang_field_error !== true ? $lang_field_error : '').
					// 							Db::getInstance()->getMsgError();
					// 						
					// 					}else{
					// 						echo "Commentaire enregistré <br/><br/>";
					// 					}
					// 					
				}
			}
			
		}
		
	}
	
	public function updatePost($content)
	{
		
		foreach ($content as $row){
			
			if($row->titre == null){
				echo "Erreur : Nom vide !";
				echo "<br/>";
			}else{
				$sql = 'SELECT p.id_post
						FROM '._DB_PREFIX_.'post p
						WHERE p.id_lcdb_import = '.(int)$row->idpresse;
				
				$result = Db::getInstance()->getValue($sql);
				
				if($result !=null){
					echo 'le post existe <br/>';
				}else{
					
					$post = new Post();
					$post->id_lcdb_import = $row->idpresse;
					$post->title = Importlcdb::createMultiLangField($row->titre);
					$post->content = Importlcdb::createMultiLangField($row->article);
					$post->link = Importlcdb::createMultiLangField($row->url);
					
					// copier l'image
					//
					//
					//
					//
					
					$post->position = $row->ordre;
					
					if($row->etat == "ko"){
						$post->active = 0;
					}else{
						$post->active = 1;
					}
					
					
					$res = false;
					$field_error = $post->validateFields(UNFRIENDLY_ERROR, true);
					$lang_field_error = $post->validateFieldsLang(UNFRIENDLY_ERROR, true);
					
					if ($field_error === true && $lang_field_error === true)
					{
					
						if (!$res)
						{
							if (isset($post->date_add) && $post->date_add != '')
								$res = $post->add(false);
							else
								$res = $post->add();
						}
					}else{
						echo "<br/>error<br/><br/>";
					}
					
					if (!$res)
					{
						$this->errors[] = sprintf(
							Tools::displayError('post cannot be saved')
						);
						$this->errors[] = ($field_error !== true ? $field_error : '').($lang_field_error !== true ? $lang_field_error : '').
							Db::getInstance()->getMsgError();
						
					}else{
						echo "Post enregistré <br/><br/>";
					}
					
				}
			}
			
		}
		
	}
	
	public function updateGuestbook($content)
	{
		
		foreach ($content as $row){
			
			if($row->comment == null){
				echo "Erreur : Commentaire vide !";
				echo "<br/>";
			}else{
				$sql = 'SELECT g.id_guestbook
						FROM '._DB_PREFIX_.'guestbook g
						WHERE g.id_lcdb_import = '.(int)$row->idcomment;
				
				$result = Db::getInstance()->getValue($sql);
				
				if($result !=null){
					echo 'le commentaire existe <br/>';
				}else{
					
					echo "id_comment ".$row->idcomment;
					echo "<br/>";
					echo "commentaire ".$row->comment;
					echo "<br/>";
					
					$guestbook = new Guestbook();
					$guestbook->id_lcdb_import = $row->idcomment;
					$guestbook->firstname = "Utilisateur";
					$guestbook->lastname = "inconnu";
					$guestbook->message = Importlcdb::createMultiLangField($row->comment);
					$guestbook->active = 1;
					
					$res = false;
					$field_error = $guestbook->validateFields(UNFRIENDLY_ERROR, true);
					$lang_field_error = $guestbook->validateFieldsLang(UNFRIENDLY_ERROR, true);
					
					if ($field_error === true && $lang_field_error === true)
					{
					
						if (!$res)
						{
							$res = $guestbook->add();
						}
					}else{
						echo "<br/>error<br/><br/>";
					}
					
					if (!$res)
					{
						$this->errors[] = sprintf(
							Tools::displayError('post cannot be saved')
						);
						$this->errors[] = ($field_error !== true ? $field_error : '').($lang_field_error !== true ? $lang_field_error : '').
							Db::getInstance()->getMsgError();
						
					}else{
						echo "Commentaire enregistré <br/><br/>";
					}
					
				}
			}
			
		}
		
	}
	
	public function getTable($table)
	{
		
		$ch = curl_init() ;
		
		curl_setopt($ch, CURLOPT_URL, 'http://www.lescolisduboucher.com/export/export.php?table='.$table);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$content = curl_exec($ch) ;
		curl_close($ch) ;
		
		return $content;
	}

	public function getContent()
	{
		$output = null;
		
		// commandes et associations (paniers, commandes details...)
		// messages
		// temoignages
		// clients et associations (adresses, parrainages, non inscrits ??...)
		// produits et associations ()
		
		if (Tools::isSubmit('submit'.$this->name))
		{
			if($input_product = Tools::getValue('table_0')){
				$content = json_decode($this->getTable("carte"));
				$this->updateProducts($content);
			}
			if($input_product = Tools::getValue('table_1')){
				$content = json_decode($this->getTable("clients"));
				$this->updateCustomers($content);
			}
			if($input_product = Tools::getValue('table_2')){
				$content = json_decode($this->getTable("commandes"));
				$this->updateOrders($content);
			}
			if($input_product = Tools::getValue('table_3')){
				$content = json_decode($this->getTable("messages"));
				$this->updateMessages($content);
			}
			if($input_product = Tools::getValue('table_4')){
				$content = json_decode($this->getTable("livredor"));
				$this->updateGuestbook($content);
			}
			if($input_product = Tools::getValue('table_5')){
				$content = json_decode($this->getTable("presse"));
				$this->updatePost($content);
			}
			
		}
		
		return $output.$this->displayForm();
	}
	
	protected static function createMultiLangField($field)
	{
		$languages = Language::getLanguages(false);
		$res = array();
		foreach ($languages as $lang)
			$res[$lang['id_lang']] = $field;
		return $res;
	}

}
