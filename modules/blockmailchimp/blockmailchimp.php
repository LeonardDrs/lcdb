<?php

if (!defined('_PS_VERSION_'))
	exit;

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
/*		if (Tools::isSubmit('submitNewsletter'))
		{
			$this->newsletterRegistration();
			if ($this->error)
			{
				$this->smarty->assign(array('color' => 'red',
						'msg' => $this->error,
						'nw_value' => isset($_POST['email']) ? pSQL($_POST['email']) : false,
						'nw_error' => true,
						'action' => $_POST['action'])
				);
			}
			else if ($this->valid)
			{
				$this->smarty->assign(array('color' => 'green',
						'msg' => $this->valid,
						'nw_error' => false)
				);
			}
		}
		$this->smarty->assign('this_path', $this->_path);*/
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
