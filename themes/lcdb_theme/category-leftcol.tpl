
<form method="get" action="{$link->getPageLink('search', true)}" id="form-search">
	<input type="hidden" name="orderby" value="position" />
	<input type="hidden" name="controller" value="search" />
	<input type="hidden" name="orderway" value="desc" />
	<input class="search_query" type="text" id="search" name="search_query" placeholder="{if isset($smarty.get.search_query)}{$smarty.get.search_query|htmlentities:$ENT_QUOTES:'utf-8'|stripslashes}{/if}" />
	<button type="submit" name="submit">OK</button>
</form>
<nav class="secondary-menu small-bloc">
	<ul id="category-leftcol">
		{foreach from=$left_col item=maincat name=foo}
			<li class="secondary-menu-item {if $smarty.foreach.foo.first}first {/if}{if $smarty.foreach.foo.last}last {/if}">
				<a href="{$link->getCategoryLink($maincat.id_category, $maincat.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$maincat.name}">{$maincat.name}</a>
				<ul class="submenu">
					{foreach from=$maincat.subcats item=cat name=foo2}
						<li class="submenu-item {if $smarty.foreach.foo2.first}first {/if}{if $smarty.foreach.foo2.last}last {/if}">
							<a href="{$link->getCategoryLink($cat.id_category, $cat.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$cat.name}"><span class="img-{$cat.name|lower}"></span>{$cat.name}</a>
							<ul>
								{foreach from=$cat.subcats item=subcat name=foo3}
									<li class="griller">
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