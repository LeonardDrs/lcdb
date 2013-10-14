{capture name=path}{l s='Your shopping cart'}{/capture}
<div id="columns" class="content clearfix">
	<div id="left_column">
		{include file="$tpl_dir./category-leftcol.tpl"}
	</div>
	 <div id="center_column">
		<div class="big-bloc">
			<div class="clearfix cart-title">
				<h1>Mon panier</h1>
				<hr class="dashed" />
			</div>
				{if isset($account_created)}
					<p class="success">
						{l s='Your account has been created.'}
					</p>
				{/if}
				{include file="$tpl_dir./errors.tpl"}

				{if isset($empty)}
					<p class="warning">{l s='Your shopping cart is empty.'}</p>
				{elseif $PS_CATALOG_MODE}
					<p class="warning">{l s='This store has not accepted your new order.'}</p>
				{else}
				{include file="$tpl_dir./errors.tpl"}

				{if isset($empty)}
					<p class="warning">{l s='Your shopping cart is empty.'}</p>
				{elseif $PS_CATALOG_MODE}
					<p class="warning">{l s='This store has not accepted your new order.'}</p>
				{else}
					<script type="text/javascript">
					// <![CDATA[
					var currencySign = '{$currencySign|html_entity_decode:2:"UTF-8"}';
					var currencyRate = '{$currencyRate|floatval}';
					var currencyFormat = '{$currencyFormat|intval}';
					var currencyBlank = '{$currencyBlank|intval}';
					var txtProduct = "{l s='product' js=1}";
					var txtProducts = "{l s='products' js=1}";
					var deliveryAddress = {$cart->id_address_delivery|intval};
					// ]]>
					</script>
					<p style="display:none" id="emptyCartWarning" class="warning">{l s='Your shopping cart is empty.'}</p>
				{/if}
			<table class="form-panier">
				<thead>
					<tr>
						<th>Produit</th>
						<th>Prix unitaire</th>
						<th>Quantité</th>
						<th>Prix Total TTC</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					{foreach $products as $product}
						{assign var='productId' value=$product.id_product}
						{assign var='productAttributeId' value=$product.id_product_attribute}
						{assign var='quantityDisplayed' value=0}
						{assign var='odd' value=$product@iteration%2}
						{assign var='ignoreProductLast' value=isset($customizedDatas.$productId.$productAttributeId) || count($gift_products)}
						<!-- {* Display the product line *} -->
						{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}
					{/foreach}
					{assign var='last_was_odd' value=$product@iteration%2}
					{foreach $gift_products as $product}
						{assign var='productId' value=$product.id_product}
						{assign var='productAttributeId' value=$product.id_product_attribute}
						{assign var='quantityDisplayed' value=0}
						{assign var='odd' value=($product@iteration+$last_was_odd)%2}
						{assign var='ignoreProductLast' value=isset($customizedDatas.$productId.$productAttributeId)}
						{assign var='cannotModify' value=1}
						{* Display the gift product line *}
						{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}
					{/foreach}
				</tbody>
				{if $priceDisplay}
					<tfoot>
						<tr>
							<td class="first"></td>
							<td colspan="2">{if $display_tax_label}{l s='Total products (tax excl.):'}{else}{l s='Total products:'}{/if}</td>
							<td><span id="total_price">{displayPrice price=$total_products}</span></td>
						</tr>
					</tfoot>
				{else}
					<tfoot>
						<tr>
							<td class="first"></td>
							<td colspan="2">{if $display_tax_label}{l s='Total products (tax incl.):'}{else}{l s='Total products:'}{/if}</td>
							<td><span id="total_price">{displayPrice price=$total_products_wt}</span></td>
						</tr>
					</tfoot>
				{/if}
			</table>
			<p id="enter-postal-code" class="red">Pour connaître vos conditions de livraison, merci d'indiquer votre code postal : <input id="postal-code" type="text" placeholder="00000" name="code_postal">
			<button type="submit" name="bouton_carre">OK</button></p>
			<div class="clearfix" id="page-buttons">
				<a id="continue-shopping" href="{if (isset($smarty.server.HTTP_REFERER) && strstr($smarty.server.HTTP_REFERER, 'order.php')) || isset($smarty.server.HTTP_REFERER) && strstr($smarty.server.HTTP_REFERER, 'order-opc') || !isset($smarty.server.HTTP_REFERER)}{$link->getPageLink('index')}{else}{$smarty.server.HTTP_REFERER|escape:'htmlall':'UTF-8'|secureReferrer}{/if}" title="{l s='Continue shopping'}">&rarr;&nbsp;<span>{l s='Continue shopping'}</span></a>
				{if !$opc}
					<a href="{if $back}{$link->getPageLink('order', true, NULL, 'step=1&amp;back={$back}')}{else}{$link->getPageLink('order', true, NULL, 'step=1')}{/if}" id="validate-cart" class="red-button gradien" title="{l s='Next'}">{l s='Validate my cart'} &raquo;</a>
				{/if}
			</div>
			{/if}
		</div>
	</div><!-- / #center_column -->
</div>
