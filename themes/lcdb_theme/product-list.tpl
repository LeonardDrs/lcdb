
{if isset($products)}
	{foreach from=$products item=product name=products}

		<div class="block-product" itemscope itemtype="http://schema.org/Product">
			<div class="infos">
				<div class="identification-description">
					<div class="identification label-bio label">
						<h3 itemprop="name">{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}</h3>
						<p itemprop="description">{$product.description_short|strip_tags:'UTF-8'|truncate:100:'...'}</p>
					</div>
					<p class="warning" itemscope itemtype="http://schema.org/Offer">
						Plus que 5 produits restants. Livrable jusqu'au <span itemprop="availabilityEnds">30/04/2013</span>
						
						{if isset($product.available_for_order) && $product.available_for_order}
							{if ($product.allow_oosp || $product.quantity > 0)}
								{l s='Available'}
							{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
								{l s='Product available with different options'}
							{else}
								{l s='Out of stock'}
							{/if}
						{/if}
					</p>
				</div>
				<div class="detail">
					{foreach from=$product.features item=feature name=feature}
						{if ($feature.id_feature == 7)}
							<span class="person">x{$feature.value}</span>
						{/if}
						{if ($feature.id_feature == 8)}
							<span class="preservation">{$feature.value}j</span>
						{/if}
					{/foreach}
				</div>
				<div class="price reduction" itemscope itemtype="http://schema.org/Offer">
					{if isset($product.reduction) && ($product.reduction != 0)}
						<p class="reduction_rate">-20%</p>
						<div class="full_price">
							<p class="price-piece">
								<span>
									{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
										{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
									{/if}
								</span>
							</p>
							<p class="price-kg"><span></span></p>
						</div>
						<div class="selling_price">
							<p class="price-piece" itemprop="price">8 €</p>
							<p class="price-kg">25,62€/kg</p>
						</div>
					{else}
						<div class="selling_price">
							<p class="price-piece" itemprop="price">
								{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
									{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
								{/if}
							</p>
							<p class="price-kg"></p>
						</div>
					{/if}
				</div>
			</div>
			<div class="action-product">
				<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="Voir ce produit">{l s='View the product'}</a>
				<form class="form-panier" method="post" action="{$link->getPageLink('cart')}" >
					<button class="moreless minus" name="minus" type="button">-</button>
					<input class="quantity" type="text" disabled="" name="qty" value="0" maxlength="2">
					<button class="moreless plus" name="plus" type="button">+</button>

					<input type="hidden" name="token" value="{$static_token}" />
					<input type="hidden" name="id_product" value="{$product.id_product|intval}" id="product_page_product_id" />
					<input type="hidden" name="add" value="1" />
					
					<button class="green-button gradient" name="submit" type="submit">Ajouter au panier</button>
				</form>
			</div>
		</div>

	{/foreach}
{/if}
