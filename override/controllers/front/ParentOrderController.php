<?php

class ParentOrderController extends ParentOrderControllerCore
{
	public function setMedia()
	{
		FrontController::setMedia();
		if ($this->context->getMobileDevice() == false)
		{
			// Adding CSS style sheet
			$this->addCSS(_THEME_CSS_DIR_.'addresses.css');
			$this->addCSS(_THEME_CSS_DIR_.'checkout.css');
			// Adding JS files
			$this->addJS('http://maps.googleapis.com/maps/api/js?key=AIzaSyDvWSB_8JhCl-0moGJVn2iMPt8-9xlP2r8&amp;sensor=true');
			$this->addJS(_THEME_JS_DIR_.'plugins/infobox_packed.js');
			$this->addJS(_THEME_JS_DIR_.'tools.js');
			$this->addJS(_THEME_JS_DIR_.'relay.js');
			if ((Configuration::get('PS_ORDER_PROCESS_TYPE') == 0 && Tools::getValue('step') == 1) || Configuration::get('PS_ORDER_PROCESS_TYPE') == 1)
				$this->addJS(_THEME_JS_DIR_.'order-address.js');
			$this->addJqueryPlugin('fancybox');
			if ((int)(Configuration::get('PS_BLOCK_CART_AJAX')) || Configuration::get('PS_ORDER_PROCESS_TYPE') == 1)
			{
				$this->addJS(_THEME_JS_DIR_.'cart-summary.js');
				$this->addJqueryPlugin('typewatch');
			}
		}
	}
}

