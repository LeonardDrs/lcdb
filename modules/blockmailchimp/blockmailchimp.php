<?php

if (!defined('_PS_VERSION_'))
	exit;

if (!class_exists('MCAPI')){
	include_once(_PS_MODULE_DIR_.'blockmailchimp/api/mailchimp/MCAPI.class.php');
}

class BlockMailchimp extends Module
{

	public function __construct()
	{
		$this->name = 'blockmailchimp';
		$this->tab = 'front_office_features';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Mailchimp block');
		$this->description = $this->l('Display block for the newsletter subscrition');
		$this->confirmUninstall = $this->l('Are you sure you want to delete all your contacts ?');

		$this->version = '1.5';
		$this->author = 'Hetic';
	}

	public function install()
	{
		if (parent::install() == false || $this->registerHook('Footer') == false || $this->registerHook('header') == false)
			return false;
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
	}

	public function getContent()
	{
		
	}

	private function _prepareHook($params)
	{

		if (Tools::isSubmit('submitNewsletter'))
		{

			// datas
		    $apikey = '487a3033242f00767788293a1d0a6b1f-us7';
		    $listId = 'fcb21548db';
		    $apiUrl = 'http://api.mailchimp.com/1.3/';
		    $merge_vars = null;

			$api = new MCAPI($apikey);

			if(!$email = Tools::getValue('emailNewsletter')){
				$this->ajaxResponse(false, "Votre email est vide !");
			}

			$retval = $api->listSubscribe( $listId, $email, $merge_vars, $email_type='html', $double_optin=false, $update_existing=false, $replace_interests=true, $send_welcome=true );

			if ($api->errorCode){
				switch ($api->errorCode) {
				    case 214:
				    	$this->ajaxResponse(false, "Cet email est déjà enregistré dans notre base.");
				        break;
				    default:
				    	$this->ajaxResponse(false, "Une erreur est survenue, veuillez réessayer. Merci de nous contacter si le problème persiste.");
				}
			} else {
				$this->ajaxResponse(true);
			}

		}

	}

	public function ajaxResponse($success = false, $message = null)
	{
		die( Tools::jsonEncode( array(
			'newsletterRequest' => array(
				"success" => $success,
				"message" => $message
			)
		)));
	}

	public function hookDisplayFooter($params)
	{
		$this->_prepareHook($params);
		return $this->display(__FILE__, 'blockmailchimp.tpl');
	}

	public function hookDisplayHeader($params)
	{
		$this->context->controller->addCSS($this->_path.'blockmailchimp.css', 'all');
	}
}
