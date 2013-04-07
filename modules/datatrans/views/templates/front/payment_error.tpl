{*
** Creator   : WDXperience SARL : YM (121008)
** Copyright : All Right Reserved - Licence available for 1 shop
** Licence   : Prices and Conditions on http://www.wdxperience.ch/shop/
** Compat    : Prestashop v1.5
*}
<h3 style="margin-top: 40px; line-height: 1.4em; color:red;">{$shop_name} - {$title} : {l s='transaction declined' mod='datatrans'}</h3>
<p>{l s='Permission was refused by the financial institution. Please choose another payment method.' mod='datatrans'}</p>
<p><a href="{$link->getPageLink('order', true, NULL, NULL)}">&laquo; {l s='Another payment method' mod='datatrans'}</a></p>