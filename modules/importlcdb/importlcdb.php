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
			
			// echo "id_produit ".$row->idproduit;
			// echo "<br/>";
			// echo "type ".$row->type;
			// echo "<br/>";
			// echo "libellé ".$row->libelle;
			// echo "<br/>";
			// echo "conditionnement ".$row->conditionnement;
			// echo "<br/>";
			// echo "personnes ".$row->pers;
			// echo "<br/>";
			// echo "frais ".$row->frais;
			// echo "<br/>";
			// echo "bio ? ".$row->bio;
			// echo "<br/>";
			// echo "label rouge ? ".$row->labelrouge;
			// echo "<br/>";
			// echo "prix ".$row->prix;
			// echo "<br/>";
			// echo "tva".$row->tva;
			// echo "<br/>";
			// echo "poids ".$row->poids;
			// echo "<br/>";
			// echo "prix kg ".$row->prixkg;
			// echo "<br/>";
			// echo "etat ".$row->etat;
			// echo "<br/>";
			// echo "cible ".$row->cible;
			// echo "<br/>";
			// echo "date limite ".$row->datelimite;
			// echo "<br/>";
			// echo "<br/>";

			if($row->libelle == null){
				$row->libelle = "Nom manquant !";
			}

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
				
				$product->price = $row->prix;
				$product->unit_price = $row->prixkg;
				$product->unity = "kg";
					
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

					if (!$res)
					{
						if (isset($product->date_add) && $product->date_add != '')
							$res = $product->add(false);
						else
							$res = $product->add();

						if($row->cible == "pro"){
							$product->addToCategories(array(14, 6)); // ug
						}else{
							$product->addToCategories(array(14));
						}

						$product->id_category_default = 14;

						// conditionnement 
						if(isset($row->conditionnement) && ($row->conditionnement != "")){
							// $id_feature = Feature::addFeatureImport($feature_name, $position);
							$id_feature_value = FeatureValue::addFeatureValueImport(1, $row->conditionnement);
							Product::addFeatureProductImport($product->id, 1, $id_feature_value);
						}

						// nombre de personnes
						if(isset($row->pers) && ($row->pers != "")){
							$id_feature_value = FeatureValue::addFeatureValueImport(2, $row->pers);
							Product::addFeatureProductImport($product->id, 2, $id_feature_value);
						}

						// durée de conservation
						if(isset($row->frais) && ($row->frais != "")){
							$id_feature_value = FeatureValue::addFeatureValueImport(5, $row->frais);
							Product::addFeatureProductImport($product->id, 5, $id_feature_value);
						}

						// poids 
						if(isset($row->poids) && ($row->poids != "")){
							$id_feature_value = FeatureValue::addFeatureValueImport(6, $row->poids);
							Product::addFeatureProductImport($product->id, 6, $id_feature_value);
						}

						// label rouge
						if($row->labelrouge == "oui"){
							Product::addFeatureProductImport($product->id, 7, 8);
						}else{
							Product::addFeatureProductImport($product->id, 7, 9);
						}

						// bio
						if($row->bio == "oui"){
							Product::addFeatureProductImport($product->id, 8, 10);
						}else{
							Product::addFeatureProductImport($product->id, 8, 11);
						}

						Feature::cleanPositions();
						$product->update();

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

		}
		
	}
	
	public function updateCustomers($content)
	{


		foreach ($content as $row){
			
					echo "New client :";
					echo "<br/>";
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
					echo "<br/>";
					echo "<br/>";

					// NEED 
					// id -> (stocké dans id_lcdb)
					// gender -> OK (traitement ?)
					// firstname -> OK
					// lastname -> OK
					// address -> (traitement)
					// cp -> (traitement)
					// ville -> (traitement)
					// acces -> (traitement)
					// tel1 -> (traitement)
					// tel2 -> (traitement)
					// email -> OK 
					// password -> (cryptage)
					// actif -> OK
					// inscription -> ?????
					// vic -> ???
					// statut -> ?????
					// abonnement -> OK
					// pro -> (traitement)
					// last -> "dernier visite" -> OK
					// ce -> (traitement)
					// kelce	??????
					// parrainde -> ?????
					// filleuilde -> ?????
					// status -> ??????
					// prov -> ???????
					// detail prov -> ??????
					// detailsprov1 -> ??????
					// promo parrain -> ?????
					// detail prov 2 -> ??????
					// prime parrain -> ?????
					// prime vic -> ?????
					// avoir -> ?????
					// optin -> ?????
					// note -> OK
					// extract -> ??????



					// HAVE 
					// id
					// shop group : 1
					// shop : 1
					// gender 
					// default_group
					// lang
					// risk ?????
					// company 
					// siret 
					// ape 
					// firstname
					// lastname 
					// email 
					// passwd 
					// birthday
					// newsletter ????
					// optin 
					// outstanding allow amount ???
					// show public prices 
					// max payment days
					// secure key 
					// note
					// active
					// date_add 
					// date_update
					// id lcdb import

			if($row->email == null){
				$row->libelle = "Email manquant !";
			}

			$sql = 'SELECT c.id_customer
					FROM '._DB_PREFIX_.'customer c
					WHERE c.id_lcdb_import = '.(int)$row->idclient;

			$result = Db::getInstance()->getValue($sql);

			if($result !=null){
				echo 'l utilisateur existe <br/>';
			}else{

					$customer = new Customer();
					$customer->id_lcdb_import = $row->idclient;

					$customer->id_shop_default = 1;
					//$customer->id_lang = 1;

					if($row->civil == "M."){
					 	$customer->gender = 1;
					}else{
						$customer->gender = 2;
					}

					$customer->firstname = $row->prenom ? $row->prenom : " ";
					$customer->lastname = $row->nom ? $row->nom : " ";
					$customer->email = $row->email;
					$customer->passwd = Tools::encrypt($row->password);

					$customer->date_add = $row->inscription;
					
					
					//$customer->add();		
					
					
					// if($row->actif == "off"){
					// 	$customer->active = 0;
					// }
					
					$res = false;
					$field_error = $customer->validateFields(UNFRIENDLY_ERROR, true);
					$lang_field_error = $customer->validateFieldsLang(UNFRIENDLY_ERROR, true);

					// if ($field_error === true && $lang_field_error === true){

					// 	if (!$res){
					// 		if (isset($product->date_add) && $product->date_add != '')
					// 			$res = $product->add(false);
					// 		else
					// 			$res = $product->add();

					// 		if($row->cible == "pro"){
					// 			$product->addToCategories(array(14, 6)); // ug
					// 		}else{
					// 			$product->addToCategories(array(14));
					// 		}

					// 		$product->id_category_default = 14;

					// 		// conditionnement 
					// 		if(isset($row->conditionnement) && ($row->conditionnement != "")){
					// 			// $id_feature = Feature::addFeatureImport($feature_name, $position);
					// 			$id_feature_value = FeatureValue::addFeatureValueImport(1, $row->conditionnement);
					// 			Product::addFeatureProductImport($product->id, 1, $id_feature_value);
					// 		}

					// 		// nombre de personnes
					// 		if(isset($row->pers) && ($row->pers != "")){
					// 			$id_feature_value = FeatureValue::addFeatureValueImport(2, $row->pers);
					// 			Product::addFeatureProductImport($product->id, 2, $id_feature_value);
					// 		}

					// 		// durée de conservation
					// 		if(isset($row->frais) && ($row->frais != "")){
					// 			$id_feature_value = FeatureValue::addFeatureValueImport(5, $row->frais);
					// 			Product::addFeatureProductImport($product->id, 5, $id_feature_value);
					// 		}

					// 		// poids 
					// 		if(isset($row->poids) && ($row->poids != "")){
					// 			$id_feature_value = FeatureValue::addFeatureValueImport(6, $row->poids);
					// 			Product::addFeatureProductImport($product->id, 6, $id_feature_value);
					// 		}

					// 		// label rouge
					// 		if($row->labelrouge == "oui"){
					// 			Product::addFeatureProductImport($product->id, 7, 8);
					// 		}else{
					// 			Product::addFeatureProductImport($product->id, 7, 9);
					// 		}

					// 		// bio
					// 		if($row->bio == "oui"){
					// 			Product::addFeatureProductImport($product->id, 8, 10);
					// 		}else{
					// 			Product::addFeatureProductImport($product->id, 8, 11);
					// 		}

					// 		Feature::cleanPositions();
					// 		$product->update();

					// 	}
					// }else{
					// 	echo "<br/><br/>error<br/><br/>";
					// }

					// if (!$res){
					// 	$this->errors[] = sprintf(
					// 		Tools::displayError('product cannot be saved')
					// 	);
					// 	$this->errors[] = ($field_error !== true ? $field_error : '').($lang_field_error !== true ? $lang_field_error : '').
					// 		Db::getInstance()->getMsgError();

					// }else{
					//		echo "Produit enregistré <br/>";
					// }

			}

			//die();

		}

		die();
		
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
