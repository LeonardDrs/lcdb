{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if !$opc}
	<script type="text/javascript">
	//<![CDATA[
	var orderProcess = 'order';
	var currencySign = '{$currencySign|html_entity_decode:2:"UTF-8"}';
	var currencyRate = '{$currencyRate|floatval}';
	var currencyFormat = '{$currencyFormat|intval}';
	var currencyBlank = '{$currencyBlank|intval}';
	var txtProduct = "{l s='product' js=1}";
	var txtProducts = "{l s='products' js=1}";
	var orderUrl = '{$link->getPageLink("order", true)}';

	//]]>
	</script>
{else}
	<script type="text/javascript">
		var txtFree = "{l s='Free!'}";
	</script>
{/if}

{include file="$tpl_dir./errors.tpl"}
<div class="bloc content-delivery-mode" id="carrier_area">
		<div class="delivery_options_address bloc content-delivery-modee">
			{if isset($delivery_option_list)}
				{foreach $delivery_option_list as $id_address => $option_list}
					{foreach $option_list as $key => $option}
						<h2>Modes de livraison</h2>
						<ul>
							<li id="delivery-home-li">
								{if $option.unique_carrier}
									{foreach $option.carrier_list as $carrier}
										<p>
											<label class="radio" for="home-office"><input type="radio" name="delivery" id="home-office" value="home" checked/><span class="delivery_option_title bold">{$carrier.instance->name}</span>
											|	<span class="">
												{if $option.total_price_with_tax && !$free_shipping}
													{if $use_taxes == 1}
														{convertPrice price=$option.total_price_with_tax} {l s='(tax incl.)'}
													{else}
														{convertPrice price=$option.total_price_without_tax} {l s='(tax excl.)'}
													{/if}
												{else}
													{l s='Free!'}
												{/if}
											</span></label>
										</p>
									{/foreach}
									{if isset($carrier.instance->delay[$cookie->id_lang])}
										<p class="description delivery_option_delay">{$carrier.instance->delay[$cookie->id_lang]}</p>
									{/if}
								{/if}
							</li>
						</ul>
					{/foreach}
					{foreachelse}
						<p class="warning" id="noCarrierWarning">
							{foreach $cart->getDeliveryAddressesWithoutCarriers(true) as $address}
								{if empty($address->alias)}
									{l s='No carriers available.'}
								{else}
									{l s='No carriers available for the address "%s".' sprintf=$address->alias}
								{/if}
								{if !$address@last}
								<br />
								{/if}
							{/foreach}
						</p>
				{/foreach}
			{/if}
		</div>
		<div id="colis-cadeau-wrapper">
			<hr class="dashed" />
			<label for="colis-cadeau" id="colis-cadeau-toggle" class="checkbox"><input value="1" name="gift" type="checkbox" id="colis-cadeau"/> Je souhaite que ma commande soit envoyée par <a href="#">colis cadeau</a> <span class="price">+ <span id="sup">1,60</span> &euro;</span></label>
			<textarea name="gift_message" placeholder="Saisissez le message qui sera joint au cadeau" id="gift_message">{$cart->gift_message|escape:'htmlall':'UTF-8'}</textarea>
		</div>
		<hr class="dashed" />
		<p id="total-price">Le montant TTC de votre commande est de <span class="price"><span data-price="67" id="final-price">67</span> &euro;</span></p>
		<div id="error-price">
			<p><span class="bold">Minimum de commande non atteint.</span> Nous vous invitons &agrave; continuer vos achats.<br />Pour une livraison dans le <span id="error-postal"></span>, le montant de votre commande doit &ecirc;tre au minimum de <span id="error-minimum-price"></span> &euro;.<br />Il est actuellement de <span id="error-current-price"></span>&euro;.</p>
		</div>
		<input type="hidden" class="hidden" name="step" value="2" />
		<input type="hidden" name="back" value="{$back}" />
	</div>
</div>