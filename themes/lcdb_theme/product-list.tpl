

{if isset($products)}
	{foreach from=$products item=product name=products}

		{$now = $smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}

		{if ($now >= $product.date_start) && ($now < $product.date_end)}

			{assign var="label" value=""}
			{foreach from=$product.features item=feature name=feature}
				{if ($feature.id_feature == 11) && ($feature.value == "Oui")}
					{assign var="label" value="label-bio"}
				{/if}
				{if ($feature.id_feature == 12) && ($feature.value == "Oui")}
					{assign var="label" value="label-rouge"}
				{/if}
			{/foreach}

			<div class="block-product" itemscope itemtype="http://schema.org/Product">
				<div class="infos">
					<div class="identification-description">
						<div class="identification {$label} label">
							<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="Voir ce produit"><h3 itemprop="name">{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}</h3></a>
							<p itemprop="description">{$product.description_short|strip_tags:'UTF-8'|truncate:100:'...'}</p>
						</div>
                         {if $product.quantity < 5 or $product.date_end or $product.unusual_product}
                            <p class="warning" itemscope itemtype="http://schema.org/Offer">
                                {if $product.unusual_product}
                                    Produit en quantité limitée, risque de manque à la livraison.
                                {else}
                                    {if $product.quantity < 5 and $product.quantity > 0}
                                        Plus que {$product.quantity} produits restants.
                                    {/if}
                                    {if $product.quantity == 0}
                                        Produits indisponible.
                                    {/if}
                                    {if $product.date_end and $product.limit_date}
                                        Livrable jusqu'au <span itemprop="availabilityEnds">{$product.date_end|date_format:"%D"}</span>
                                    {/if}
                                {/if}
                            </p>
                         {/if}
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
							{if $product.specific_prices.reduction_type == "percentage"}
								<p class="reduction_rate">-{$product.specific_prices.reduction*100}%</p>
							{else}
								<p class="reduction_rate">-{convertPrice price=$product.specific_prices.reduction}</p>
							{/if}
							<div class="full_price">
								<p class="price-piece">
									<span>{convertPrice price=$product.price_without_reduction}</span>
								</p>
								<!-- <p class="price-kg"><span>{convertPrice price=($product.price_tax_exc/$product.unit_price_ratio)}/{$product.unity}</span></p> -->
							</div>
							<div class="selling_price">
								<p class="price-piece" itemprop="price">{convertPrice price=$product.price}</p>
								<!-- <p class="price-kg">{convertPrice price=($product.price_tax_exc/$product.unit_price_ratio)}/{$product.unity}</p> -->
							</div>
						{else}
							<div class="selling_price">
								<p class="price-piece" itemprop="price">
									{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
										{convertPrice price=$product.price}
									{/if}
								</p>
								<p class="price-kg">{convertPrice price=($product.price_tax_exc/$product.unit_price_ratio)}/{$product.unity}</p>
							</div>
						{/if}
					</div>
				</div>
				<div class="action-product">
					<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="Voir ce produit">{l s='View the product'}</a>
					<form class="form-panier" method="post" action="{$link->getPageLink('cart')}" >
                        {if isset($product.attributes.0)}
                            <label>Race :</label>
                            <select name="id_product_attribute" class="meat-race">
                                {foreach from=$product.attributes item=attribute}
                                    <option value="{$attribute.id_product_attribute}">{$attribute.attribute_name}</option>
                                {/foreach}
                            </select>
                        {/if}
						<button class="moreless minus" name="minus" type="button">-</button>
						<input class="quantity" type="text" disabled="" name="qty" value="1" maxlength="2">
						<button class="moreless plus" name="plus" type="button">+</button>

						<input type="hidden" name="token" value="{$static_token}" />
						<input type="hidden" name="id_product" value="{$product.id_product|intval}" id="product_page_product_id" />
						<input type="hidden" name="add" value="1" />
						
						<button class="green-button gradient" name="submit" type="submit">Ajouter au panier</button>
					</form>
				</div>
			</div>

		{/if}

	{/foreach}
{/if}
