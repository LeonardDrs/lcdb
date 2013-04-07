<div id="columns" class="content clearfix">
	<div id="left_column">
		<form id="form-search" method="get">
			<input id="search" type="text" placeholder="Recherche..." name="search">
			<button type="submit" name="submit">OK</button>
		</form>
		<nav class="secondary-menu small-bloc">
			<ul>
				{foreach from=$left_col item=maincat name=foo}
					<li class="secondary-menu-item item-active {if $smarty.foreach.foo.first}first {/if}{if $smarty.foreach.foo.last}last {/if}">
						<a href="{$link->getCategoryLink($maincat.id_category, $maincat.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$maincat.name}">{$maincat.name}</a>
						<ul class="submenu">
							{foreach from=$maincat.subcats item=cat name=foo2}
								<li class="submenu-item item-active {if $smarty.foreach.foo2.first}first {/if}{if $smarty.foreach.foo2.last}last {/if}">
									<a href="{$link->getCategoryLink($cat.id_category, $cat.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$cat.name}"><span class="img-boeuf"></span>{$cat.name}</a>
									<ul>
										{foreach from=$cat.subcats item=subcat name=foo3}
											<li class="griller item-active">
												<a href="{$link->getCategoryLink($subcat.id_category, $subcat.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$subcat.name}">{$subcat.name}</a>
											</li>
										{/foreach}
									</ul>
								</li>
							{/foreach}
						</ul>
					</li>
				{/foreach}
			</ul>
		</nav>
	</div>
	<div id="center_column" class="page-list-product">
		{if isset($category)}
			{if $category->id AND $category->active}
					{if $category->id_parent == 8}
						{include file="./category-boeuf.tpl"}
					{else}
						{include file="./category-subcat.tpl"}
					{/if}
			{elseif $category->id}
				<p class="warning">{l s='This category is currently unavailable.'}</p>
			{/if}
		{/if}
	</div><!-- end #center_column -->
	<div id="right_column">
		{$HOOK_RIGHT_COLUMN}
		<div class="small-bloc frais-livraison">
			<span class="bloc-title ribbon-frais-livraison"></span>
			<p><span class="img-livraison"></span>Frais de livraison de 0 à 20 €</p>
			<hr />
			<p class="livraison-small">Entrez votre code postal pour connaitre vos frais de livraison</p>
			<form id="form-code-postal" method="post">
				<input id="code-postal" type="text" placeholder="Code postal..." name="code-postal">
				<button type="submit" name="submit">OK</button>
			</form>
		</div>
		<div class="small-bloc mot-boucher">
			<span class="bloc-title ribbon-mot-boucher"></span>
			<h3>Le saviez-vous ?</h3>
			<p>Les viandes Bio sont réputées pour etre des viandes saines et non pas particulièremnet savourauses comme le sont les  viandes Label Rouge qui vous garantissent un plaisir  gustatif incomparable.</p>
			<img src="img/asset/img_solo/labelrouge.png" alt="label rouge different d'agriculture biologique" />
			<a href="#" title="En savoir plus sur les labels">En savoir plus sur les labels</a>
		</div>
		<div class="small-bloc temoignage">
			<span class="bloc-title ribbon-temoignage"></span>
			<p class="temoignage-text">“Super viande, on a pris le colis surprise cette semaine et les enfants ont adoré, les tranches de gigot. Nous avons donc recommandé pour la semaine prochaine. Bravo très bonne initiative et nous nous régalons d’avance pour les prochains cilis surprise. Merci !”</p>
			<p class="author"><span>Clarisse J</span>, Paris</p>
			<a href="#" title="Voir tous les témoignages">Voir tous les témoignages</a>
		</div>
	</div>
</div>
