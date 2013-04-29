
<div id="columns" class="content clearfix">
	<div id="left_column">
		
		<form id="form-search" method="get" action="{$link->getPageLink('search', true)}">
			<input type="text" id="search" name="search" placeholder="Recherche..." />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderway" value="desc" />
			<button type="submit" name="submit">OK</button>
		</form>
		<nav class="secondary-menu small-bloc">
			<ul>
				<li class="secondary-menu-item item-active first">
					<a href="javascript:voi(0);" title="Produits à la carte">Produits à la carte</a>
					<ul class="submenu">
						{foreach from=$left_col item=maincat name=foo}
							<li class="submenu-item item-active {if $smarty.foreach.foo.first}first {/if}{if $smarty.foreach.foo.last}last {/if}">
								<a href="{$link->getRecipeCategoryLink($maincat.id_recipe_category, false)|escape:'htmlall':'UTF-8'}" title="Boeuf"><span class="img-boeuf"></span>{$maincat.name}</a>
								<ul>
									{foreach from=$maincat.subcats item=cat name=foo2}
										<li class="griller item-active">
											<a href="{$link->getRecipeCategoryLink($cat.id_recipe_category, false)|escape:'htmlall':'UTF-8'}" title="{$cat.name}">{$cat.name}</a>
										</li>
									{/foreach}
								</ul>
							</li>
						{/foreach}
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	
	{if isset($recipe) && !isset($recipe_category)}
		{include file="$tpl_dir./recipe-content.tpl"}
	{elseif isset($recipe_category)}
		{include file="$tpl_dir./recipe-category.tpl"}
	{else}
		<div id="center_column">
			<div class="error">
				{l s='This page does not exist.'}
			</div>
		</div>
	{/if}
	
</div>
