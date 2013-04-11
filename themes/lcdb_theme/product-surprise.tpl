
<div class="big-bloc colis" itemscope itemtype="http://schema.org/Product">
	<div class="content-title">
		<h1 itemprop="name">{$product->name}</h1>
		{if $product->breeder != null}	
			<p>{$product->breeder}</p>
		{/if}
	</div>
	
	{if isset($confirmation) && $confirmation}
		<p class="confirmation">{$confirmation}</p>
	{/if}
	
	{if isset($adminActionDisplay) && $adminActionDisplay}
	<div id="admin-action">
		<p>{l s='This product is not visible to your customers.'}
		<input type="hidden" id="admin-action-product-id" value="{$product->id}" />
		<input type="submit" value="{l s='Publish'}" class="exclusive" onclick="submitPublishProduct('{$base_dir}{$smarty.get.ad|escape:'htmlall':'UTF-8'}', 0, '{$smarty.get.adtoken|escape:'htmlall':'UTF-8'}')"/>
		<input type="submit" value="{l s='Back'}" class="exclusive" onclick="submitPublishProduct('{$base_dir}{$smarty.get.ad|escape:'htmlall':'UTF-8'}', 1, '{$smarty.get.adtoken|escape:'htmlall':'UTF-8'}')"/>
		</p>
		<p id="admin-action-result"></p>
		</p>
	</div>
	{/if}
	
	<div class="price-infos" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<img src="img/asset/img_solo/colis-surprise.png" title="colis cadeau"/>
		
		{if $have_image}
			<span id="view_full_size">
				<img src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large_default')}" {if $jqZoomEnabled}class="jqzoom" alt="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'thickbox_default')}"{else} title="{$product->name|escape:'htmlall':'UTF-8'}" alt="{$product->name|escape:'htmlall':'UTF-8'}" {/if} id="bigpic" width="{$largeSize.width}" height="{$largeSize.height}" />
				<span class="span_link">{l s='View full size'}</span>
			</span>
		{else}
			<span id="view_full_size">
				<img src="{$img_prod_dir}{$lang_iso}-default-large_default.jpg" id="bigpic" alt="" title="{$product->name|escape:'htmlall':'UTF-8'}" width="{$largeSize.width}" height="{$largeSize.height}" />
				<span class="span_link">{l s='View full size'}</span>
			</span>
		{/if}
		
		
		{if $product->short_description != null}	
			<p class="colis-surprise-description">{$product->short_description}</p>
		{/if}
		<div class="price-details">
			<div class="detailed-price">
				<span class="price" itemprop="price">35 &euro;</span>
			</div>
		</div>
		
		
		{if $product->show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
			<div class="price">
				{if !$priceDisplay || $priceDisplay == 2}
					{assign var='productPrice' value=$product->getPrice(true, $smarty.const.NULL, $priceDisplayPrecision)}
					{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(false, $smarty.const.NULL)}
				{elseif $priceDisplay == 1}
					{assign var='productPrice' value=$product->getPrice(false, $smarty.const.NULL, $priceDisplayPrecision)}
					{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(true, $smarty.const.NULL)}
				{/if}

				<p class="our_price_display">
				{if $priceDisplay >= 0 && $priceDisplay <= 2}
					<span id="our_price_display">{convertPrice price=$productPrice}</span>
				{/if}
				</p>

				{if $priceDisplay == 2}
					<br />
					<span id="pretaxe_price"><span id="pretaxe_price_display">{convertPrice price=$product->getPrice(false, $smarty.const.NULL)}</span>&nbsp;{l s='tax excl.'}</span>
				{/if}
			</div>
		{/if}
		
		
	</div><!-- / .price-infos -->
	
	<div class="add-to-basket-form">
		<form class="form-panier clearfix" method="">
			<select>
				<option>Label Rouge et Bio</option>
			</select>
			<button type="button" name="minus" class="moreless minus">-</button>
			<input class="quantity" type="text" maxlength="2" value="0" name="quantity" disabled>
			<button type="button" name="plus" class="moreless plus">+</button>
			<button type="submit" name="submit" class="ajout-panier">ajouter au panier</button>
		</form>
		
		<form id="buy_block" {if $PS_CATALOG_MODE AND !isset($groups) AND $product->quantity > 0}class="hidden"{/if} action="{$link->getPageLink('cart')}" method="post">

			<!-- hidden datas -->
			<p class="hidden">
				<input type="hidden" name="token" value="{$static_token}" />
				<input type="hidden" name="id_product" value="{$product->id|intval}" id="product_page_product_id" />
				<input type="hidden" name="add" value="1" />
				<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
			</p>

			<!-- quantity wanted -->
			<p id="quantity_wanted_p"{if (!$allow_oosp && $product->quantity <= 0) OR $virtual OR !$product->available_for_order OR $PS_CATALOG_MODE} style="display: none;"{/if}>
				<label>{l s='Quantity:'}</label>
				<input type="text" name="qty" id="quantity_wanted" class="text" value="{if isset($quantityBackup)}{$quantityBackup|intval}{else}{if $product->minimal_quantity > 1}{$product->minimal_quantity}{else}1{/if}{/if}" size="2" maxlength="3" {if $product->minimal_quantity > 1}onkeyup="checkMinimalQuantity({$product->minimal_quantity});"{/if} />
			</p>
			
			{if (!$allow_oosp && $product->quantity <= 0) OR !$product->available_for_order OR (isset($restricted_country_mode) AND $restricted_country_mode) OR $PS_CATALOG_MODE}
				<span class="exclusive">
					<span></span>
					{l s='Add to cart'}
				</span>
			{else}
				<p id="add_to_cart" class="buttons_bottom_block">
					<span></span>
					<input type="submit" name="Submit" value="{l s='Add to cart'}" class="exclusive" />
				</p>
			{/if}
			
			{if isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS}{$HOOK_PRODUCT_ACTIONS}{/if}

		</form>
		
		
	</div><!-- / .add-to-basket-form -->
	<div class="misc-infos">
		<p class="portions"><span class="img-portions"></span> 10 à 12 <span class="colis-portions">portions</span></p>
		<p class="jours"><span class="img-jours"></span> 7 à 14 <span class="colis-jours">jours</span></p>
	</div>
	<hr />
	{if $product->description != null}	
		<div class="colis-description">{$product->description}</div>
	{/if}
	<hr />
	<div class="colis-exemples">
		<p class="green-title">Quelques exemples de colis surprise</p>
		<ul>
			<li>Côte de Bœuf (Label Rouge - 1,2 kg) et Brochettes de Porc (Bio-1 kg)<hr/></li>
			<li>Côte de Bœuf (Label Rouge - 1,2 kg) et Brochettes de Porc (Bio-1 kg)<hr/></li>
			<li>Côte de Bœuf (Label Rouge - 1,2 kg) et Brochettes de Porc (Bio-1 kg)</li>
		</ul>
	</div>
	<hr />
	<p class="surprise-additional">Chaque semaine, une nouvelle surprise vous attends dans votre colis</p>
</div><!-- / .colis -->
