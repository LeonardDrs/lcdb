<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/atos.php');

if (!isset($_POST['DATA']) AND !isset($_GET['DATA']))
	throw new Exception('error in atos module: data is required');
else
{
        if (!isset($_POST['DATA']))
                $_POST['DATA'] = $_GET['DATA'];
        
	$atos = new Atos();
	$result = exec(Configuration::get('ATOS_BIN_DIR').'response pathfile='.dirname(__FILE__).'/pathfile message='.preg_replace("#[^a-z0-9]#Ui", '', $_POST['DATA']));
	$resultArray = explode('!', $result);
	
	if (!sizeof($resultArray) OR !isset($resultArray[3]) OR !isset($resultArray[6]))
	{
		Mail::Send(
			Configuration::get('PS_LANG_DEFAULT'),
			'notification',
			$atos->l('Atos notification'),
			array('message' => $atos->l('error in atos payment module: can\'t execute request')),
			Configuration::get('ATOS_NOTIFICATION_EMAIL'),
			NULL,NULL,NULL,NULL,NULL,
			dirname(__FILE__).'/mails/');
	}
	elseif ($resultArray[1] == -1)
	{
		Mail::Send(
			Configuration::get('PS_LANG_DEFAULT'),
			'notification',
			$atos->l('Atos notification'),
			array('message' => $atos->l('error in atos payment module:').' '.$resultArray[2]),
			Configuration::get('ATOS_NOTIFICATION_EMAIL'),
			NULL,NULL,NULL,NULL,NULL,
			dirname(__FILE__).'/mails/');
	}
	else
	{
		$message =
			$atos->l('Transaction ID:').' '.$resultArray[6].'<br />'.
			$atos->l('Payment mean:').' '.$resultArray[7].'<br />'.
			$atos->l('Payment has began at:').' '.$resultArray[8].'<br />'.
			$atos->l('Payment received at:').' '.$resultArray[10].' '.$resultArray[9].'<br />'.
			$atos->l('Authorization ID:').' '.$resultArray[13].'<br />'.
			$atos->l('Currency:').' '.$resultArray[14].'<br />'.
			$atos->l('Customer IP address:').' '.$resultArray[29].'<br />';
			$atos->l('Cart ID:').' '.$resultArray[22].'<br />';
		$orderState = _PS_OS_PAYMENT_;
		
		/* Checking whether merchant ID is OK */
		$merchantId = Configuration::get('ATOS_MERCHANT_ID');
		if ($resultArray[3] != $merchantId)
		{
			$orderState = _PS_OS_ERROR_;
			$message .= '<span style="color: red;">'.$atos->l('Merchant ID is not valid').' ('.$resultArray[3].' '.$atos->l('should be').' '.$merchantId.')</span>';
		}
		
		/* Checking for currency */
		if ($orderState == _PS_OS_PAYMENT_)
		{
			$cart = new Cart(intval($resultArray[22]));
			$currencies = array(1 => '978');
			if (isset($currencies[$cart->id_currency]))
			{
				if ($currencies[$cart->id_currency] != strtoupper($resultArray[14]))
				{
				 	$orderState = _PS_OS_ERROR_;
					$message .= '<span style="color: red;">'.$atos->l('Currency is not the right one (should be ').$currencies[$cart->id_currency].')</span>';
				}
			}
		}
		
		/* Checking for bank code response */
		if ($orderState == _PS_OS_PAYMENT_)
		{
		 	$responseCode = intval($resultArray[11]);
		 	
		 	switch ($responseCode)
		 	{
				case 3:
					// Contrat VAD r�sili� 
					$message .= '<span style="color: red;">'.$atos->l('Merchand ID is not valid').'</span>';
					$orderState = _PS_OS_ERROR_;
					break;
				case 5:
					$message .= '<span style="color: red;">'.$atos->l('Bank has rejected payment').'</span>';
					$orderState = _PS_OS_ERROR_;
					break;
				case 12:
				case 17:
					die;
				case 30:
					$message .= '<span style="color: red;">'.$atos->l('Format error').'</span>';
					$orderState = _PS_OS_ERROR_;
					break;
				case 34:
					$message .= '<span style="color: red;">'.$atos->l('Bank said that transaction might be fraudulous').'</span>';
					$orderState = _PS_OS_ERROR_;
					break;
				case 75:
					$message .= '<span style="color: red;">'.$atos->l('Customer has exceeded max tries for its card number').'</span>';
					$orderState = _PS_OS_ERROR_;
					break;
				case 90:
					$message .= '<span style="color: red;">'.$atos->l('Bank server was unavailable').'</span>';
					$orderState = _PS_OS_ERROR_;
					break;
			}
		}
		
		$customer = new Customer((int)$cart->id_customer);
		
		if ($orderState == _PS_OS_PAYMENT_ OR Configuration::get('ATOS_ERROR_BEHAVIOR') == '0')
		{
			$atos->validateOrder(intval($resultArray[22]), $orderState, ($resultArray[5] / 100), $atos->displayName, $message, array(), NULL, false, $customer->secure_key);
			
			if (version_compare(_PS_VERSION_, '1.5.0.0') >= '0')
			{
				$amount = ($resultArray[5] / 100);

				$order_id = Order::getOrderByCartId($resultArray[22]); // Récupération de l'order id via id_cart (result array 22).
				$order = new Order($order_id);
				$id_order_payment = Db::getInstance()->getValue('SELECT id_order_payment FROM `'._DB_PREFIX_.'order_payment` WHERE `order_reference` LIKE \'%'.pSQL($order->reference).'%\'');

				if ($id_order_payment == false)
					$order->addOrderPayment($amount, NULL, $resultArray[6]);
				else
				{
					$orderPayment = new OrderPayment($id_order_payment); // instanciation de l'objet avec l'id trouvé juste avant.
					$orderPayment->transaction_id = $resultArray[6];
					$orderPayment->save();
				}			
			}
		}
		elseif (Configuration::get('ATOS_ERROR_BEHAVIOR') == 1)
			Mail::Send(
				Configuration::get('PS_LANG_DEFAULT'),
				'notification',
				$atos->l('Atos notification'),
				array('message' => 'Order: '.$resultArray[22].' / '.$message),
				Configuration::get('ATOS_NOTIFICATION_EMAIL'),
				NULL,NULL,NULL,NULL,NULL,
				dirname(__FILE__).'/mails/');
		
	}
}

?>