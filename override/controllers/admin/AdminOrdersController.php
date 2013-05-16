<?php

class AdminOrdersController extends AdminOrdersControllerCore
{
	public function initToolbar()
	{
		if ($this->display == 'view')
		{
			$order = new Order((int)Tools::getValue('id_order'));
			if ($order->hasBeenShipped())
				$type = $this->l('Return products');
			elseif ($order->hasBeenPaid())
				$type = $this->l('Standard refund');
			else
				$type = $this->l('Cancel products');

			if (!$order->hasBeenShipped() && !$this->lite_display)
				$this->toolbar_btn['new'] = array(
					'short' => 'Create',
					'href' => '#',
					'desc' => $this->l('Add a product'),
					'class' => 'add_product'
				);

			if (Configuration::get('PS_ORDER_RETURN') && !$this->lite_display)
				$this->toolbar_btn['standard_refund'] = array(
					'short' => 'Create',
					'href' => '',
					'desc' => $type,
					'class' => 'process-icon-standardRefund'
				);
			
			if ($order->hasInvoice() && !$this->lite_display)
				$this->toolbar_btn['partial_refund'] = array(
					'short' => 'Create',
					'href' => '',
					'desc' => $this->l('Partial refund'),
					'class' => 'process-icon-partialRefund'
				);
		}
		else if (!$this->display) //display import button only on listing
		{
			$this->toolbar_btn['export'] = array(
				'href' => self::$currentIndex.'&amp;export=true&amp;token='.$this->token,
				'desc' => $this->l('Export')
			);
		}
		
		$res = parent::initToolbar();
		if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP && isset($this->toolbar_btn['new']) && Shop::isFeatureActive())
			unset($this->toolbar_btn['new']);
		return $res;
	}
	
	public function renderList()
	{
		if (!($this->fields_list && is_array($this->fields_list)))
			return false;
		$this->getList($this->context->language->id);
		
		// Empty list is ok
		if (!is_array($this->_list))
			return false;

		$helper = new HelperList();

		$this->setHelperDisplay($helper);
		$helper->tpl_vars = $this->tpl_list_vars;
		$helper->tpl_delete_link_vars = $this->tpl_delete_link_vars;

		// For compatibility reasons, we have to check standard actions in class attributes
		foreach ($this->actions_available as $action)
		{
			if (!in_array($action, $this->actions) && isset($this->$action) && $this->$action)
				$this->actions[] = $action;
		}

		$list = $helper->generateList($this->_list, $this->fields_list);
		
		if($_GET['export']==true){
			echo "<pre>";
			print_r($this->_list);
			echo "</pre>";
		}
		
		return $list;
	}
}

