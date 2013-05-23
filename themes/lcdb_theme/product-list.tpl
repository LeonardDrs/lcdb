
{if isset($products)}
	{foreach from=$products item=product name=products}
		<div class="block-product" itemscope itemtype="http://schema.org/Product">
			<div class="infos">
				<div class="identification-description">
					<div class="identification label-bio label">
						<h3 itemprop="name">{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}</h3>
						<p itemprop="description">{$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}</p>
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
							{/if}</span>
						{/if}
					</p>
				</div>
				<div class="detail">
					<span class="person">x2</span>
					<span class="preservation">10j</span>
				</div>
				<div class="price reduction" itemscope itemtype="http://schema.org/Offer">
					<p class="reduction_rate">-20%</p>
					<div class="full_price">
						<p class="price-piece"><span>10 €</span></p>
						<p class="price-kg"><span>26,62€/kg</span></p>
					</div>
					<div class="selling_price">
						<p class="price-piece" itemprop="price">8 €</p>
						<p class="price-kg">25,62€/kg</p>
					</div>
					{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}<span class="price" style="display: inline;">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span><br />{/if}
				</div>
			</div>
			<div class="action-product">
				<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="Voir ce produit">{l s='View the product'}</a>
				<form class="form-panier" method="get">
					<button class="moreless minus" name="minus" type="button">-</button>
					<input class="quantity" type="text" disabled="" name="quantity" value="0" maxlength="2">
					<button class="moreless plus" name="plus" type="button">+</button>
					
					<input type="hidden" name="product-name" value="Titre produit en taille 15 = 43 caractères" />
					<input type="hidden" name="product-price" value="8" />
					
					<button class="green-button gradient" name="submit" type="submit">Ajouter au panier</button>
					<!-- {if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
											{if ($product.allow_oosp || $product.quantity > 0)}
												{if isset($static_token)}
													<a class="button ajax_add_to_cart_button exclusive" rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}" title="{l s='Add to cart'}"><span></span>{l s='Add to cart'}</a>
												{else}
													<a class="button ajax_add_to_cart_button exclusive" rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}", false)}" title="{l s='Add to cart'}"><span></span>{l s='Add to cart'}</a>
												{/if}
											{/if}
										{/if} -->
				</form>
			</div>
		</div>
	{/foreach}
{/if}
