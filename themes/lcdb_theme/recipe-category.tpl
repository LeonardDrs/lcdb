
<div id="center_column">
	<div class="title clearfix">
		<span id="big_cow"></span><h1>{$recipe_category->name|escape:'htmlall':'UTF-8'}</h1><span id="stove"></span>
	</div>
	<table>
		<thead>
			<tr>
				<th><span class="border-class"></span></th>
				<th id="difficulte">Difficulté</th>
				<th id="preparation">Préparation</th>
				<th id="cuisson">Cuisson</th>
				<th id="quantite">Quantité</th>
			</tr>
		</thead>
		<tbody>
			{if isset($recipe_pages) & !empty($recipe_pages)}
				{foreach from=$recipe_pages item=recipepages}
					<tr itemscope itemtype="http://schema.org/Recipe">
						<td class="title_recipe" itemprop="name"><a href="{$link->getRecipeLink($recipepages.id_recipe, $recipepages.link_rewrite)|escape:'htmlall':'UTF-8'}" title="Accéder à la recette">{$recipepages.title|escape:'htmlall':'UTF-8'}</a></td>
						<td class="difficulte_level difficulte_3"><span>3/5</span></td>
						<td class="preparation_time" itemprop="prepTime">10 à 15 min.</td>
						<td class="cooking_time" itemprop="cookTime">1h45</td>
						<td class="person_number" itemprop="recipeYield">3 pers.</td>
					</tr>
				{/foreach}
			{/if}
		</tbody>
	</table>
</div>