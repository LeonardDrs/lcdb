<?php

class atos extends PaymentModule
{
	private $bankArray = array(
		'elysnet' => 'HSBC / CCF',
		'mercanet' => 'BNP Paribas',
		'sogenactif' => 'Soci&eacute;t&eacute; G&eacute;n&eacute;rale',
		'etransactions' => 'Cr&eacute;dit Agricole',
		'webaffaires' => 'Cr&eacute;dit du Nord / Kolb',
		'sherlocks' => 'Cr&eacute;dit Lyonnais',
		'cyberplus' => 'Banque Populaire / SMC',
		'scelliusnet' => 'Banque Postale',
		'citelis' => 'Cr&eacute;dit Mutuel'
	);
	
	public function __construct()
	{
		$this->name = 'atos';
        $this->version = '2.7';

        if (preg_match("/1\.4/", _PS_VERSION_) OR preg_match("/1\.5/", _PS_VERSION_))
            $this->tab = 'payments_gateways';
        else
            $this->tab = 'Payment';	
            	
        $this->page = basename(__FILE__, '.php');
        
		parent::__construct();
		
		$this->initCompatibility();
		
		if (!Configuration::get('ATOS_BIN_DIR'))
			Configuration::updateValue('ATOS_BIN_DIR', dirname(__FILE__).'/bin/');

        $this->displayName = $this->l('Atos');
        $this->description = $this->l('This payment module for banks using ATOS allows your customers to pay by Credit Card');
	}
	
	public function initCompatibility()
	{
		if (strpos(dirname(__FILE__), $this->name) === false)
			return $this;
		
		if (!class_exists('Context'))
			require_once(realpath(dirname(__FILE__))  . '/backward_compatibility/Context.php');
			
		return $this;
	}
	
	public function install()
	{
		return (parent::install() AND $this->registerHook('orderConfirmation') AND $this->registerHook('payment') AND $this->registerHook('header'));
	}
	
    public function hookOrderConfirmation($params)
	{
		global $smarty, $cookie;
		
		if ($params['objOrder']->module != $this->name)
			return;
		
		if ($params['objOrder']->valid)
			$smarty->assign(array('status' => 'ok', 'id_order' => $params['objOrder']->id));
		else
			$smarty->assign('status', 'failed');
		return $this->display(__FILE__, 'hookorderconfirmation.tpl');
	}
	
	function getContent()
    {
		global $currentIndex;
        $this->_html = '<h2>'.$this->displayName.'</h2>';

		if (Tools::isSubmit('submitAtos'))
		{
			Configuration::updateValue('ATOS_MERCHANT_ID', trim(Tools::getValue('ATOS_MERCHANT_ID')));
			Configuration::updateValue('ATOS_REDIRECT', (int)Tools::getValue('ATOS_REDIRECT'));
			Configuration::updateValue('ATOS_ERROR_BEHAVIOR', (int)Tools::getValue('ATOS_ERROR_BEHAVIOR'));
			if (isset($_FILES['ATOS_CERTIF']) AND !$_FILES['ATOS_CERTIF']['error'])
			{
				if (!Configuration::get('ATOS_MERCHANT_ID'))
					$this->_html .= $this->displayError($this->l('Please to fill the MERCHANT ID before uploading certificate'));
				else
				{
					if (move_uploaded_file($_FILES['ATOS_CERTIF']['tmp_name'], dirname(__FILE__).'/certif.fr.'.Configuration::get('ATOS_MERCHANT_ID')))
						$this->_html .= $this->displayConfirmation($this->l('Certificate updated'));
					else
						$this->_html .= $this->displayError($this->l('Error in copying the certificat'));
				}
			}
					
			$email = Tools::getValue('ATOS_NOTIFICATION_EMAIL');
			if (empty($email) OR Validate::isEmail($email))
				Configuration::updateValue('ATOS_NOTIFICATION_EMAIL', $email);
			else
				$this->_html .= $this->displayError($this->l('please specify a valid e-mail address or nothing at all'));
			$this->_html .= $this->displayConfirmation($this->l('Settings updated'));
		}
		elseif ($atoscode = Tools::getValue('atoscode'))
		{
			$pathfileContent = 'DEBUG!NO!'."\n".'D_LOGO!'.__PS_BASE_URI__.'modules/atos/logos/!'."\n".'F_CERTIFICATE!'.dirname(__FILE__).'/certif!'."\n".'F_PARAM!'.dirname(__FILE__).'/parmcom!'."\n".'F_DEFAULT!'.dirname(__FILE__).'/parmcom.'.$atoscode.'!';
			if (file_put_contents(dirname(__FILE__).'/pathfile', $pathfileContent))
				$this->_html .= $this->displayConfirmation($this->l('pathfile created'));
			else
				$this->_html .= $this->displayError($this->l('impossible to create pathfile'));
			if (file_put_contents(dirname(__FILE__).'/parmcom.'.Configuration::get('ATOS_MERCHANT_ID'), "\nADVERT!merchant.gif!\n"))
				$this->_html .= $this->displayConfirmation($this->l('parmcom created'));
			else
				$this->_html .= $this->displayError($this->l('impossible to create parmcom'));
		}
		
		// Check configuration
		$safe_mode = ini_get('safe_mode');
		$exec = is_callable('exec');
		$request = is_executable(Configuration::get('ATOS_BIN_DIR').'request');
		$response = is_executable(Configuration::get('ATOS_BIN_DIR').'response');
		$warningDom = '';
		if ($safe_mode OR !$exec OR !$request OR !$response)
		{
			$warningDom = '
			<div class="warning warn">
				'.(!$safe_mode ? '' : '<h3>'.$this->l('safe_mode is enabled').'</h3>').'
				'.($exec ? '' : '<h3>'.$this->l('exec() function is forbidden').'</h3>').'
				'.($request ? '' : '<h3>'.Configuration::get('ATOS_BIN_DIR').'request '.$this->l('is not executable').'</h3>').'
				'.($response ? '' : '<h3>'.Configuration::get('ATOS_BIN_DIR').'response '.$this->l('is not executable').'</h3>').'
			</div>';
		}
		
		$id_merchant = Configuration::get('ATOS_MERCHANT_ID');
		$link = $currentIndex.'&configure='.$this->name.'&token='.Tools::getValue('token');
		$ok = '<img src="../img/admin/enabled.gif" />';
		$ko = '<img src="../img/admin/disabled.gif" />';
		
        $this->_html .=
        $warningDom .
        '<fieldset>
			<legend>'.$this->l('Information').'</legend>
			'.($id_merchant ? $this->l('Click your bank name in order to create the configuration files:') : $this->l('Banking company using Atos SIPS:')).'
			<ul style="list-style-type:circle;padding-left:20px">';
		foreach ($this->bankArray as $code => $bank)
			 $this->_html .= '<li>'.($id_merchant ? '<a href="'.$link.'&atoscode='.$code.'">' : '').$bank.' ('.$code.')'.($id_merchant ? '</a>' : '').'</li>';
        $this->_html .= '
			</ul><br />
			'.$this->l('Notice that if you want to enable AMEX payment card you need to edit the parmcom file corresponding to your bank').'.<br />
			'.$this->l('Find the line that looks like that:').' PAYMENT_MEANS!VISA,2,MASTERCARD,2! <br />
			'.$this->l('and add an AMEX parameter:').' PAYMENT_MEANS!VISA,2,MASTERCARD,2,AMEX,2!
		</fieldset>
		<div class="clear">&nbsp;</div>
		<fieldset>
			<legend>'.$this->l('Checkup').'</legend>
			<ul style="list-style-type:circle;padding-left:20px">
				<li>'.$this->l('Merchant ID').' '.(intval($id_merchant) ? $ok : $ko).'</li>
				<li>pathfile '.(file_exists(dirname(__FILE__).'/pathfile') ? $ok : $ko).'</li>
				<li>parmcom '.(file_exists(dirname(__FILE__).'/parmcom.'.$id_merchant) ? $ok : $ko).'</li>
				<li>certif '.(file_exists(dirname(__FILE__).'/certif.fr.'.$id_merchant) ? $ok : $ko).'</li>
			</ul>
		</fieldset>
		<div class="clear">&nbsp;</div>
		<fieldset><legend>'.$this->l('Configuration').'</legend>
			<form action="" method="post" enctype="multipart/form-data">
				<label>'.$this->l('Merchant ID').'</label>
				<div class="margin-form">
					<input type="text" name="ATOS_MERCHANT_ID" value="'.Tools::getValue('ATOS_MERCHANT_ID', Configuration::get('ATOS_MERCHANT_ID')).'" />
				</div>
				<div class="clear">&nbsp;</div>
				<label>'.$this->l('Certificat').'</label>
				<div class="margin-form">
					<input type="file" name="ATOS_CERTIF" />
				</div>
				<div class="clear">&nbsp;</div>
				<label>'.$this->l('Redirection after payment').'</label>
				<div class="margin-form">
					<ul>
						<li><input type="radio" name="ATOS_REDIRECT" value="1" '.(Tools::getValue('ATOS_REDIRECT', Configuration::get('ATOS_REDIRECT')) ? 'checked="checked"' : '').'>&nbsp;&nbsp;'.$this->l('Your shop').'</li>
						<li><input type="radio" name="ATOS_REDIRECT" value="0" '.(!Tools::getValue('ATOS_REDIRECT', Configuration::get('ATOS_REDIRECT')) ? 'checked="checked"' : '').'>&nbsp;&nbsp;'.$this->l('Atos confirmation page').'</li>
					</ul>
				</div>
				<div class="clear">&nbsp;</div>
				<label>'.$this->l('Payment error behavior').'</label>
				<div class="margin-form">
					<ul>
						<li><input type="radio" name="ATOS_ERROR_BEHAVIOR" value="0" '.(!Tools::getValue('ATOS_ERROR_BEHAVIOR', Configuration::get('ATOS_ERROR_BEHAVIOR')) ? 'checked="checked"' : '').'>
						&nbsp;&nbsp;'.$this->l('Save order as a payment error').'</li>
						<li><input type="radio" name="ATOS_ERROR_BEHAVIOR" value="1" '.(Tools::getValue('ATOS_ERROR_BEHAVIOR', Configuration::get('ATOS_ERROR_BEHAVIOR')) == 1 ? 'checked="checked"' : '').'>
						&nbsp;&nbsp;'.$this->l('Send me an e-mail').'</li>
						<li><input type="radio" name="ATOS_ERROR_BEHAVIOR" value="2" '.(Tools::getValue('ATOS_ERROR_BEHAVIOR', Configuration::get('ATOS_ERROR_BEHAVIOR')) == 2 ? 'checked="checked"' : '').'>
						&nbsp;&nbsp;'.$this->l('Do nothing').'</li>
					</ul>
				</div>
				<label>'.$this->l('Notification e-mail').'</label>
				<div class="margin-form">
					<input type="text" name="ATOS_NOTIFICATION_EMAIL" value="'.Tools::getValue('ATOS_NOTIFICATION_EMAIL', Configuration::get('ATOS_NOTIFICATION_EMAIL')).'" />
				</div>
				<div class="clear">&nbsp;</div>
				<input type="submit" name="submitAtos" value="'.$this->l('   Save   ').'" class="button" />
        	</form>
		</fieldset>
		<div class="clear">&nbsp;</div>
		<fieldset>
			<legend>Prestashop Addons</legend>
			'.$this->l('This module has been developped by PrestaShop and can only be sold through').' <a href="http://addons.prestashop.com">addons.prestashop.com</a>.<br />
			'.$this->l('Please report all bugs to').' <a href="mailto:addons@prestashop.com">addons@prestashop.com</a> '.$this->l('or using our').' <a href="http://addons.prestashop.com/contact-form.php">'.$this->l('contact form').'</a>.
		</fieldset>';
        return $this->_html;
    }
	 
	private function getAtosForm($cart)
	{
		$lang = new Language($cart->id_lang);
		
		$customer = new Customer($cart->id_customer);
		$currency = new Currency($cart->id_currency);
		$returnPage = 'http://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'order-confirmation.php?id_cart='.$cart->id.'&id_module='.$this->id.'&key='.$customer->secure_key.'&';
		$cancelPage = (Configuration::get('ATOS_ERROR_BEHAVIOR') ? 'http://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'order.php?step=3&' : $returnPage);
		$ipnPage = 'http://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'modules/'.$this->name.'/validation.php';
		$redirect = Configuration::get('ATOS_REDIRECT') ? ' data=NO_RESPONSE_PAGE="'.$returnPage.'"' : '';
		
		
		// for 1.3 compatibility
		if(!isset($currency->iso_code_num) OR $currency->iso_code_num == '')
		{
			$array_currency_iso_num = array(
				'DKK'	=> 208,
				'EUR'	=> 978,
				'USD'	=> 840,
				'GBP'	=> 826,
				'SEK'	=> 752,
				'AUD'	=> 036,
				'CAD'	=> 124,
				'ISK'	=> 352,
				'JPY'	=> 392,
				'NZD'	=> 554,
				'NOK'	=> 578,
				'CHF'	=> 756,
				'TRY'	=> 949,
			);
			$currency_num = $array_currency_iso_num[$currency->iso_code];
		}
		else
			$currency_num = $currency->iso_code_num;
		
		// Do not add \n or something else
		$parm = 'merchant_id='.Configuration::get('ATOS_MERCHANT_ID').' language='.$lang->iso_code.' customer_id='.intval($cart->id_customer).' caddie='.intval($cart->id).' merchant_country=fr amount='.(int)round(sprintf('%f', $cart->getOrderTotal() * 100)).' currency_code='.$currency_num.' pathfile="'.dirname(__FILE__).'/pathfile" normal_return_url="'.$returnPage.'" cancel_return_url="'.$cancelPage.'" automatic_response_url="'.$ipnPage.'" customer_ip_address='.substr($_SERVER['REMOTE_ADDR'], 0, 16).$redirect;

		if (!$result = exec(Configuration::get('ATOS_BIN_DIR').'request '.$parm))
			return $this->l('Atos error: can\'t execute binary');
		
		$resultArray = explode('!', $result);
		if ($resultArray[1] == -1)
			return $this->l('Atos error:').' '.$resultArray[2];
		elseif (!isset($resultArray[3]))
			return $this->l('Atos error: can\'t execute request');
		return $resultArray[3];
	}
	
    public function hookPayment($params)
	{
		global $smarty;
		
		if ($params['cart']->getOrderTotal() < 1.00)
			return $this->display(__FILE__, 'payment.tpl');
			
		$smarty->assign('atos', $this->getAtosForm($params['cart']));
		return $this->display(__FILE__, 'payment.tpl');
	}
	
	public function hookHeader($params)
	{
		return '<link rel="stylesheet" type="text/css" href="'.__PS_BASE_URI__.'modules/'.$this->name.'/atos.css" />';
	}
}

?>
