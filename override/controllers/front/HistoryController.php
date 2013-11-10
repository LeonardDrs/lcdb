<?php

class HistoryController extends HistoryControllerCore
{
    public $auth = true;
    public $php_self = 'history';
    public $authRedirection = 'history';
    public $ssl = true;

    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(_THEME_CSS_DIR_.'history.css');
        $this->addCSS(_THEME_CSS_DIR_.'addresses.css');
        $this->addJqueryPlugin('scrollTo');
        $this->addJS(array(
                    _THEME_JS_DIR_.'history.js',
                    _THEME_JS_DIR_.'tools.js')
                    );
    }

    /**
     * Assign template vars related to page content
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        if ($orders = Order::getCustomerOrders($this->context->customer->id)) {
            
            $last_delivered_order = null;
            $last_order_done = null;

            foreach ($orders as &$order)
            {
                if (isset($order['id_order_state']) && ($order['id_order_state'] == 5) && !isset($last_delivered_order)) {
                    $last_delivered_order = $order;
                    //$address = Address::initialize($order['id_address_delivery']);
                    $addressDelivery = new Address((int)($order['id_address_delivery']));
                    $dlv_adr_fields = AddressFormat::getOrderedAddressFields($addressDelivery->id_country);
                    $deliveryAddressFormatedValues = AddressFormat::getFormattedAddressFieldsValues($addressDelivery, $dlv_adr_fields);
                }
                if (!isset($order['id_order_state']) || ($order['id_order_state'] != 5) && !isset($last_order_done)) {
                    $last_order_done = $order;
                    //$address = Address::initialize($order['id_address_delivery']);
                    $addressDelivery = new Address((int)($order['id_address_delivery']));
                    $dlv_adr_fields = AddressFormat::getOrderedAddressFields($addressDelivery->id_country);
                    $deliveryAddressFormatedValues = AddressFormat::getFormattedAddressFieldsValues($addressDelivery, $dlv_adr_fields);
                }

                $myOrder = new Order((int)$order['id_order']);
                if (Validate::isLoadedObject($myOrder))
                    $order['virtual'] = $myOrder->isVirtual(false);
            }
        }

        $this->context->smarty->assign(array(
            'orders' => $orders,
            'address_delivery' => $addressDelivery,
            'dlv_adr_fields' => &$dlv_adr_fields,
            'deliveryAddressFormatedValues' => $deliveryAddressFormatedValues,
            'last_delivered_order' => $last_delivered_order,
            'last_order_done' => $last_order_done,
            'invoiceAllowed' => (int)(Configuration::get('PS_INVOICE')),
            'slowValidation' => Tools::isSubmit('slowvalidation')
        ));

        $this->setTemplate(_PS_THEME_DIR_.'history.tpl');
    }
}


