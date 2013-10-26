<script type="text/javascript">
// <![CDATA[
var currencySign = '{$currencySign|html_entity_decode:2:"UTF-8"}';
var currencyRate = '{$currencyRate|floatval}';
var currencyFormat = '{$currencyFormat|intval}';
var currencyBlank = '{$currencyBlank|intval}';
var txtProduct = "{l s='product' js=1}";
var txtProducts = "{l s='products' js=1}";
// ]]>
</script>

{capture name=path}{l s='Your payment method'}{/capture}

<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		{assign var='current_step' value='payment'}
		{include file="./order-steps.tpl"}
		<div class="content-payment">
			<div class="bloc">
				{include file="$tpl_dir./errors.tpl"}
				<h2>Récapitulatif de votre commande</h2>
				<div id="address">
					<div>
						<h3>Adresse de facturation</h3>
						<!-- <a href="#" title="modifier">modifier</a> -->
						<p>{$invoice->firstname} {$invoice->lastname}</p>
						<p>{$invoice->address1}</p>
						{if $invoice->address2}
						<p>{$invoice->address2}</p>
						{/if}
						<p>{$invoice->postcode} {$invoice->city}</p>
						{if $invoice->phone}
						<p>{$invoice->phone}</p>
						{/if}
						{if $invoice->phone_mobile}
						<p>{$invoice->phone_mobile}</p>
						{/if}
					</div>
					<div>
						<h3>Adresse de livraison</h3>
						<!-- <a href="#" title="modifier">modifier</a> -->
						<p>{$delivery->firstname} {$delivery->lastname}</p>
						<p>{$delivery->address1}</p>
						{if $delivery->address2}
						<p>{$delivery->address2}</p>
						{/if}
						<p>{$delivery->postcode} {$delivery->city}</p>
						{if $delivery->phone}
						<p>{$delivery->phone}</p>
						{/if}
						{if $delivery->phone_mobile}
						<p>{$delivery->phone_mobile}</p>
						{/if}
					</div>
				</div>
				<div id="delivery-date">
					<h3>Date de livraison</h3>
					<a href="#" title="modifier">modifier</a>
					<p>{$cart->date_delivery}</p>
					<p>{$cart->hour_delivery}</p>
				</div>
				<div id="mode-delivery">
					<h3>Mode de livraison</h3>
					<p>{$carrier->name}</p>
				</div>
				<div id="bloc-basket">
					<h3>Panier</h3>
					<a href="#" title="modifier">modifier</a>
					<div id="recap-basket">
						<div id="basket-head">
							<div><p>Prix unitaire</p></div>
							<div><p>Qté</p></div>
							<div><p>Prix<span>total TTC</span></p></div>
						</div>
						<div id="basket-content" class="scrollbar">
							<table>
								<tbody>
									<tr class="row">
										<td class="label-rouge label">Pavé (Rumsteak Olgache) 180gr</td>
										<td>9 €</td>
										<td>10</td>
										<td>90 €</td>
									</tr>
								</tbody>
								{foreach from=$products item=product name=productLoop}
									{assign var='productId' value=$product.id_product}
									{assign var='productAttributeId' value=$product.id_product_attribute}
									{assign var='quantityDisplayed' value=0}
									{assign var='cannotModify' value=1}
									{assign var='odd' value=$product@iteration%2}
									{assign var='noDeleteButton' value=1}
									{include file="$tpl_dir./shopping-cart-product-line.tpl"}
								{/foreach}
							</table>
						</div>

						<div id="total-basket">
							<p>
								<span class="bold">Total panier TTC: </span>
								<span class="bold">
									{if $use_taxes}
										{if $priceDisplay}
											{displayPrice price=$total_products}
											</tr>
										{else}
											{displayPrice price=$total_products_wt}
											</tr>
										{/if}
									{else}
										{displayPrice price=$total_products}
										</tr>
									{/if}
								</span>
							</p>
							<p>
								<span>Frais de livraison: </span>
								<span>
									{if $total_shipping_tax_exc <= 0 && !isset($virtualCart)}
										{l s='Free Shipping!'}
									{else}
										{if $use_taxes}
											{if $priceDisplay}
												{displayPrice price=$shippingCostTaxExc}
											{else}
												{displayPrice price=$shippingCost}
											{/if}
										{else}
											{displayPrice price=$shippingCostTaxExc}
										{/if}
									{/if}
								</span>
							</p>
							<p>
								<span>Option colis cadeau: </span>
								<span>
									{if $use_taxes}
										{if $priceDisplay}
											{displayPrice price=$total_wrapping_tax_exc}
										{else}
											{displayPrice price=$total_wrapping}
										{/if}
									{else}
										{displayPrice price=$total_wrapping_tax_exc}
									{/if}
								</span>
							</p>
							<p><span class="bold">Sous-total TTC: </span><span class="bold">{displayPrice price=$total_price}</span></p>
						</div>
						
					</div>
				</div>
				<div class="action">
					<a href="#" title="Continuer mes achats" class="bold"><span>&rarr;</span> Continuer mes achats</a>
				</div>
			</div>
		<!-- REDUCTION	<div class="bloc">
				<div id="bloc-reduction">
					<h2>Vos réductions</h2>
					<form method="get" name="form-reduc" id="form-reduc">
						<label for="reduction">Code de réduction : </label>
						<input type="text" id="reduction" name="reduction"/>
						<button name="submit" type="submit">OK</button>
					</form>
					<div id="bloc-code">
						<p>Vous disposez actuellement de 2 codes de réduction :</p>
						<form method="get">
							<input type="hidden" name="code" value="KDSSQ8HU"/>
							<span><label><span class="code bold">KDSSQ8HU</span> <span class="amount bold">(-8,56€)</span></label></span> 
							<button type="submit" name="submit">utilisez ce code</button>
						</form>
						<form method="get">
							<input type="hidden" name="code" value="LDSJI8HU"/>
							<span><label><span class="code bold">LDSJI8HU</span> <span class="amount bold">(-8,00€)</span></label></span> 
							<button type="submit" name="submit">utilisez ce code</button>
						</form>
					</div>
				</div>
				
				{if count($discounts)}
					<tbody>
					{foreach from=$discounts item=discount name=discountLoop}
						<tr class="cart_discount {if $smarty.foreach.discountLoop.last}last_item{elseif $smarty.foreach.discountLoop.first}first_item{else}item{/if}" id="cart_discount_{$discount.id_discount}">
							<td class="cart_discount_name" colspan="2">{$discount.name}</td>
							<td class="cart_discount_description" colspan="3">{$discount.description}</td>
							<td class="cart_discount_price">
								<span class="price-discount">
									{if $discount.value_real > 0}
										{if !$priceDisplay}
											{displayPrice price=$discount.value_real*-1}
										{else}
											{displayPrice price=$discount.value_tax_exc*-1}
										{/if}
									{/if}
								</span>
							</td>
						</tr>
					{/foreach}
					</tbody>
				{/if}
					
			</div> -->
			<div id="total">
				<p class="bold">Total TTC de votre commande: <span>{displayPrice price=$total_price}</span></p>
			</div>
			<form id="form-payment" name="form-payment" method="get">
				<div class="bloc">
					{if $HOOK_PAYMENT}
						<div id="payment-means">
							<h2>Moyen de paiement</h2>
							<!-- <div id="credit-card">
								<label class="radio" for="cb">
									<input type="radio" id="cb" name="payment" value="carte-credit"/> Carte Bancaire
								</label>
								<p>Lorsque vous achetez sur lescolisduboucher.com, votre paiement
								est entièrement sécurisé via le protocole de cryptage de données SSL 3.</p>
							</div>
							<div id="paypal">
								<label class="radio" for="acc-paypal">
									<input type="radio" id="acc-paypal" name="payment" value="paypal"/> Paypal
								</label>
								<p>Paiement en ligne sécurisé à l'aide du système Paypal en protocol SSL.<p>
								<p>Paypal étant un outil de paiement payant, <span class="bold">un surcoût de 3%</span>
								du montant total de votre commande sera ajouté pour l'utilisation de ce mode de paiement.
								Le montant final que vous aurez alors à payer sur Paypal sera donc de 
								<span id="total-paypal" class="bold">244,63€</span>.</p>
								<p>Nous vous remercions par avance de votre compréhension</p>
							</div>
							<div id="check-transfert">
								<label class="radio" for="check-transfer">
									<input type="radio" id="check-transfer" name="payment" value="cheque-especes"/> Chèque ou espèces
								</label>
								<p>Paiement à la réception de votre colis</p>
							</div> -->
							{$HOOK_PAYMENT}
						</div>
					{else}
						<p class="warning">{l s='No payment modules have been installed.'}</p>
					{/if}
				</div>
				<div class="bloc">
					<div id="payment-message">
						<p>Si vous le souhaitez, vous pouvez joindre un message à votre commande,
						à l'attention des Colis du Boucher :</p>
						<textarea name="message" ></textarea>
					</div>
<!-- VALID AND PAY -->
					<!-- <div class="action">
						<button class="red-button gradient" name="submit" type="submit">Valider et payer ma commande</button>
					</div> -->
				</div>
			</form>
		</div>
	</div>
</div>
