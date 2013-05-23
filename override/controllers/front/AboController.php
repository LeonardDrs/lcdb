<?php

class AboControllerCore extends FrontController
{
	
	public function __construct(){	
		parent::__construct();
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$this->postAction();
		}
		
		// echo "<pre>";
		// $product = new Product(1);
		// print_r($product);
		// exit;
	}
	
	public function displayContent()
	{
		parent::displayContent();
		self::$smarty->display(_PS_THEME_DIR_.'abo.tpl');
	}
	
	public function postAction(){
	
		global $cookie;
		$var = $_POST;
		
		try {
			
			if(!empty($cookie->id_customer)){
		
				Db::getInstance()->delete('abo', sprintf('customer_id = %s', (int)$cookie->id_customer));
				
				$insert = array();
				$insert["customer_id"] = (int)$cookie->id_customer;

				$product_type = array();
				$product_type_default = array("colis_sans_port", "colis_sans_agneau", "colis_100_bio", "colis_cuisine_facile");
				
				if(!empty($var["colis_sans_port"])){
					$product_type["colis_sans_port"] = pSQL($var["colis_sans_port"]);
				}
				
				if(!empty($var["colis_sans_agneau"])){
					$product_type["colis_sans_agneau"] = pSQL($var["colis_sans_agneau"]);
				}
				
				if(!empty($var["colis_100_bio"])){
					$product_type["colis_100_bio"] = pSQL($var["colis_100_bio"]);
				}
				
				if(!empty($var["colis_cuisine_facile"])){
					$product_type["colis_cuisine_facile"] = pSQL($var["colis_cuisine_facile"]);
				}
				
				
				$product_type = implode(",", $product_type);
				$insert["product_type"] = !empty($product_type) ? $product_type : implode(",", $product_type_default);
				
				if(!empty($var["portion"])){
					$insert["portion"] = pSQL($var["portion"]);
				}
				
				if(!empty($var["frequency"])){
					$insert["frequency"] = pSQL($var["frequency"]);
				}
				
				if(!empty($var["expedition_date"])){
					$insert["expedition_date"] = pSQL($var["expedition_date"]);
				}
				
				if(!empty($var["payment_mode"])){
					$insert["payment_mode"] = pSQL($var["payment_mode"]);
				}
			
			
				if($insert["frequency"] = "hebdo"){
					$livraision = date('d-m-Y', strtotime("+1 week"));
					$insert["script_parsing_day"] = date('d-m-Y', strtotime("$livraision -4 days"));
				}
				
				if($insert["frequency"] = "bi"){
					$livraision = date('d-m-Y', strtotime("+2 week"));
					$insert["script_parsing_day"] = date('d-m-Y', strtotime("$livraision -4 days"));
				}
				
				if($insert["frequency"] = "men"){
					$livraision = date('d-m-Y', strtotime("+1 month"));
					$insert["script_parsing_day"] = date('Y-m-d H:i:s', strtotime("$livraision -4 days"));
				}
				
				Db::getInstance()->insert('abo', $insert);	
				
			}else{
				throw new PrestaShopException('No found customer user id');
			}

		} catch (Exception $e) {
			throw new PrestaShopException($e->getMessage());
		}

	}
	
}