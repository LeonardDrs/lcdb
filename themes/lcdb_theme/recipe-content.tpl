
{if !$recipe->active}
	<br />
	<div id="admin-action-recipe">
		<p>{l s='This Recipe page is not visible to your customers.'}
		<input type="hidden" id="admin-action-recipe-id" value="{$recipe->id}" />
		<input type="submit" value="{l s='Publish'}" class="exclusive" onclick="submitPublishRecipe('{$base_dir}{$smarty.get.ad|escape:'htmlall':'UTF-8'}', 0, '{$smarty.get.adtoken|escape:'htmlall':'UTF-8'}')"/>
		<input type="submit" value="{l s='Back'}" class="exclusive" onclick="submitPublishRecipe('{$base_dir}{$smarty.get.ad|escape:'htmlall':'UTF-8'}', 1, '{$smarty.get.adtoken|escape:'htmlall':'UTF-8'}')"/>
		</p>
		<div class="clear" ></div>
		<p id="admin-action-result"></p>
		</p>
	</div>
{/if}
<div class="rte{if $content_only} content_only{/if}">
	{$recipe->content}
</div>

<div id="center_column" class="recipe_card">
	<div class="backlink">
		<a href="liste_recettes.html" title="retourner à la liste des recettes">
			Retourner à la liste des recettes
		</a>
	</div>
	<div itemscope itemtype="http://schema.org/Recipe">
		<div class="title_print_recipe">
			<h1 class="title_list" itemprop="name">Paleron et ses champignons, sauce rouge</h1>
			<a href="javascript:window.print()">Imprimer</a>
		</div>
		<div id="presentation">
			<ul class="presentation">
				<li>
					<span id="difficulte">Difficulté</span>
					<span class="difficulte_level difficulte_3"><span>3/5</span></span>
				</li>
				<li>
					<span id="preparation">Préparation</span>
					<span itemprop="prepTime">1h10</span>
				</li>
				<li>
					<span id="cuisson">Cuisson</span>
					<span itemprop="cookTime">20 min.</span>
				</li>
				<li>
					<span id="quantite">Quantite</span>
					<span itemprop="recipeYield">6 pers.</span>
				</li>
			</ul>
		</div>
		<div id="content_recipe">
			<div id="recipe_intro">
				<p>Signe de qualité de la bête, votre paleron présente un nerf au milieu de sa tranche:
				il suffira à chacun des convives de l'ôter simplement de deux coups de couteau. Le paleron
				est aussi un morceau qui s'adapte très bien en cuisson longue dans un bourguignon ou un pot-au-feu.</p>
			</div>
			<div id="recipe_ingredients">
				<h2>Ingredients</h2>
				<ul>
					<li>
						<span itemprop="ingredients">Environs 1kg de <span class="bold">Paleron</span> en tranche des Colis du Boucher</span> 
						<a href="#" title="Commander ce produit">Commander ce produit</a>
					</li>
					<li itemprop="ingredients">1 boîte de coulis de tomate</li>
					<li itemprop="ingredients">2 oignons</li>
					<li itemprop="ingredients">10 cl de vin Rouge</li>
					<li itemprop="ingredients">500 gr de champignons de Paris</li>
					<li itemprop="ingredients">20 g de beurre</li>
					<li itemprop="ingredients">1 cu. à café d'herbes de Provence</li>
					<li itemprop="ingredients">Sel, poivre</li>
				</ul>
			</div>
			<div id="recipe_detail">
				<h2>Recette</h2>
				<ol itemprop="recipeInstructions">
					<li><span>Pelez et émincé finement les oignons, nettoyez et coupez grossièrement les champignons.</span></li>
					<li><span>Dans une poële faites fondre le beurre, déposez les tranches de paleron, faites les dorer
					environ 4 min par face puis ajouter les oignons et faites encore revenir 5 min.</span></li>
					<li><span>Ajouter les champignons, la sauce tomate, le vin, les herbes, salez, poivrez et laissez
					mijotez environ 45 min, en remuant régulièrement.</span></li>
				</ol>
			</div>
			<div id="recipe_council">
				<h2>Le conseil du boucher</h2>
				<p>Accompagnez votre plat de blé, servez avec le vin utilisé dans la préparation, un Bourgueil par exemple.</p>
			</div>
		</div>
	</div>
	<div class="backlink">
		<a href="liste_recettes.html" title="retourner à la liste des recettes">
			Retourner à la liste des recettes
		</a>
	</div>
</div>