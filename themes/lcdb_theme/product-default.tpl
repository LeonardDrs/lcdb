
<div class="big-bloc">
	<a href="javascript:history.back();" title="Retourner aux produits">&lt; Retourner aux produits</a>
	
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

	{if isset($confirmation) && $confirmation}
	<p class="confirmation">
		{$confirmation}
	</p>
	{/if}
	
	<div id="item" itemscope itemtype="http://schema.org/Product">
		<div class="clearfix">
			<div id="product-image">
				{foreach from=$product_categories item=category}
					{if $category.level_depth == 3}
							{assign var=logo_category value="product_{$category.link_rewrite}"}
					{/if}
				{/foreach}
				<img src="{$base_dir}themes/lcdb_theme/img/asset/img_solo/{$logo_category}.png" alt="Pavé (Rumsteak ou tende de tranche)" />
			</div>
			<div id="main-product-infos">
				<h1 itemprop="name">{$product->name|escape:'htmlall':'UTF-8'}</h1>
				{if isset($product->description_short)}
					<div itemprop="description">{$product->description_short}</div>
				{/if}
				{if isset($product->description)}
					<div class="full-description">{$product->description}</div>
				{/if}
			</div>
		</div>
		<div class="clearfix price-info">
			<div class="choix-race">
			{if isset($groups)}
				{foreach from=$groups key=id_attribute_group item=group}
					{if $group.attributes|@count}
						
							<p>{$group.name|escape:'htmlall':'UTF-8'} :</p>
							{assign var="groupName" value="group_$id_attribute_group"}
							{if ($group.group_type == 'select')}
								<select name="{$groupName}" id="group_{$id_attribute_group|intval}" class="attribute_select meat-race" onchange="findCombination();getProductAttribute();">
									{foreach from=$group.attributes key=id_attribute item=group_attribute}
										<option value="{$id_attribute|intval}"{if (isset($smarty.get.$groupName) && $smarty.get.$groupName|intval == $id_attribute) || $group.default == $id_attribute} selected="selected"{/if} title="{$group_attribute|escape:'htmlall':'UTF-8'}">{$group_attribute|escape:'htmlall':'UTF-8'}</option>
									{/foreach}
								</select>
							{/if}
						
					{/if}
				{/foreach}
			{/if}
			</div>

			<div class="add-to-basket-form alerte">
                {if $product->quantity < 5 or $product->limit_date or $product->unusual_product}
                    <div class="alerte-message clearfix">
                        <p>
                            <span class="img-warning"></span>
                            {if $product->unusual_product}
                                Produit en quantité limitée, risque de manque à la livraison.
                            {else}
                                {if $product->quantity < 5 and $product->quantity > 0}
                                    Plus que {$product->quantity} produits restants
                                {/if}
                                {if $product->quantity == 0}
                                    Produits indisponible.
                                {/if}
                                <br />
                                {if $product->date_start and $product->date_end and $product->limit_date}
                                    Livrable du {$product->date_start|date_format:"%D"} au {$product->date_end|date_format:"%D"}
                                {/if}
                            {/if}
                        </p>
                    </div>
                {/if}
				<div class="clearfix">
					<div class="label">
						{foreach from=$features item=feature}
							{if $feature.id_feature == $id_feature_label_bio && $feature.value|lower == "oui" }
								<img class="bio" src="{$base_dir}/themes/lcdb_theme/img/asset/img_solo/agriculture-biologique.jpg" alt="Agriculture biologique"/>
							{/if}
							{if $feature.id_feature == $id_feature_label_rouge && $feature.value|lower == "oui" }
								 <img class="bio" src="{$base_dir}/themes/lcdb_theme/img/asset/img_solo/product_labelrouge.png" alt="Label Rouge"/>
							{/if}
						{/foreach}
                    </div>

                    {if $product->show_price}

						{if !$priceDisplay || $priceDisplay == 2}
							{assign var='productPrice' value=$product->getPrice(true, $smarty.const.NULL, $priceDisplayPrecision)}
							{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(false, $smarty.const.NULL)}
						{elseif $priceDisplay == 1}
							{assign var='productPrice' value=$product->getPrice(false, $smarty.const.NULL, $priceDisplayPrecision)}
							{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(true, $smarty.const.NULL)}
						{/if}

						{if $product->specificPrice AND $product->specificPrice.reduction}
							<div class="detailed-price promo clearfix">
		                        <span class="reduction">
		                        	{if $product->specificPrice AND $product->specificPrice.reduction_type == 'percentage'}
		                        		-{$product->specificPrice.reduction*100}%
		                        	{elseif ($product->specificPrice AND $product->specificPrice.reduction_type == 'amount')}
		                        		{if $product->specificPrice AND $product->specificPrice.reduction_type == 'amount' && $product->specificPrice.reduction|intval !=0}
		                        			-{convertPrice price=$product->specificPrice.reduction|floatval}
		                        		{/if}
		                        	{/if}
		                        </span>
		                        {if $priceDisplay >= 0 && $priceDisplay <= 2}
									{if $productPriceWithoutReduction > $productPrice}
										<div class="old-price">
				                            <p id="old_price_display" class="price">{convertPrice price=$productPriceWithoutReduction}</p>
				                            <!-- <p class="price-kg">25,62€/kg</p> -->
				                        </div>
									{/if}
								{/if}
								{if $priceDisplay == 2}
									<div class="new-price" id="pretaxe_price">
			                            <p id="pretaxe_price_display" class="price" itemprop="price">{convertPrice price=$product->getPrice(false, $smarty.const.NULL)}</p>
			                            <!-- <p class="price-kg">25,62€/kg</p> -->
			                        </div>
								{/if}
		                    </div>

						{else}

							<div class="detailed-price">
								<p class="price our_price_display" itemprop="price">
								{if $priceDisplay >= 0 && $priceDisplay <= 2}
									<span id="our_price_display">{convertPrice price=$productPrice}</span>
								{/if}
								</p>
								{if !empty($product->unity) && $product->unit_price_ratio > 0.000000}
									 {math equation="pprice / punit_price"  pprice=$productPrice  punit_price=$product->unit_price_ratio assign=unit_price}
									<p class="unit-price price-kg">{convertPrice price=$unit_price}/{$product->unity|escape:'htmlall':'UTF-8'}</p>
								{/if}
							</div>

						{/if}
					{/if}

				</div>
				<div>
					<form class="form-panier clearfix" action="{$link->getPageLink('cart')}" method="post">
						<button type="button" name="minus" class="moreless minus">-</button>
						<input class="quantity" type="text" maxlength="2" value="{if isset($quantityBackup)}{$quantityBackup|intval}{else}{if $product->minimal_quantity > 1}{$product->minimal_quantity}{else}1{/if}{/if}" id="quantity_wanted" name="qty" {if $product->minimal_quantity > 1}onkeyup="checkMinimalQuantity({$product->minimal_quantity});"{/if} />
						<button type="button" name="plus" class="moreless plus">+</button>
						<button type="submit" name="submit" class="ajout-panier green-button gradient">ajouter au panier</button>

						<!-- hidden datas -->
						<p class="hidden">
							<input type="hidden" name="token" value="{$static_token}" />
							<input type="hidden" name="id_product" value="{$product->id|intval}" id="product_page_product_id" />
							<input type="hidden" name="add" value="1" />
							<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
						</p>

						{if isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS}{$HOOK_PRODUCT_ACTIONS}{/if}

						{if isset($HOOK_PRODUCT_FOOTER) && $HOOK_PRODUCT_FOOTER}{$HOOK_PRODUCT_FOOTER}{/if}

					</form>

				</div>
			</div><!-- / .add-to-basket-form -->
		</div>
		
		<hr />
		<div class="misc-infos clearfix">
			{foreach from=$features item=feature}
				{if $feature.id_feature == $id_feature_number_of }
					<p class="portions"><span class="img-portions"></span> {$feature.value} <span class="colis-portions">portions</span></p>
				{/if}
				{if $feature.id_feature == $id_feature_preservation }
					<p class="jours"><span class="img-jours"></span> {$feature.value} <span class="colis-jours">jours</span></p>
				{/if}
				{if $feature.id_feature == $id_feature_baking }
					<p class="cuisson"><span class="img-cuisson"></span> {$feature.value} <span class="mode-cuisson">min</span></p>
				{/if}
			{/foreach}
		</div>
		
		{if isset($product->tricks) && ($product->tricks != null)}
			<hr />
			<div id="trucs-et-astuces">
				<h2><span class="img-trucs-astuces"></span>Trucs et astuces des Colis du Boucher</h2>
				<div>{$product->tricks}</div>
			</div>
		{/if}
		
		{if isset($product->breeder) && ($product->breeder != null)}
			<hr />
			<div id="mot-eleveur">
				<h2><span class="img-mot-eleveur"></span>Le mot de l'éleveur</h2>
				<div>{$product->breeder}</div>
			</div>
		{/if}

		{if isset($recipes) && ($recipes != null)}
			<hr />
			<div id="idees-recettes">
				<h2><span class="img-idees-recettes"></span>Idées recettes</h2>
				<ul>
					{foreach from=$recipes item=recipe name=list_3_recipe}
                        {if $smarty.foreach.list_3_recipe.index < 3 }
                            <li itemscope itemtype="http://schema.org/Recipe">
                                <a href="#" title="voir la recette" class="recipe-link">voir la recette</a>
                                <h3 itemprop="name">{$recipe.title}</h3>
                                <p class="clearfix"><span class="intitule">difficulté</span> <span class="difficulte_level difficulte_{$recipe.difficulty}">{$recipe.difficulty}/5</span></p>
                                <div class="recipe-details hidden">
                                    <h4>Ingrédients :</h4>
                                    <div class="ingredients clearfix">
                                        {$recipe.ingredients_content}
                                    </div>
                                    <h4>Recette :</h4>
                                    <div class="recette">
                                        {$recipe.recipe_content}
                                    </div>
                                </div>
                                <hr class="dashed" />
                            </li>
                        {/if}
					{/foreach}
				</ul>
			</div>
		{/if}
		
	</div>
</div>

