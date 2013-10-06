<form id="form-search" method="get" action="{$link->getPageLink('search', true)}">
	<input type="text" id="search" name="search" placeholder="Recherche..." />
	<input type="hidden" name="orderby" value="position" />
	<input type="hidden" name="controller" value="search" />
	<input type="hidden" name="orderway" value="desc" />
	<button type="submit" name="submit">OK</button>
</form>

<nav class="secondary-menu small-bloc" id="account-left-col">
	<ul>
		<li class="secondary-menu-item first item-active"><a href="#" title="Mon compte">mon compte</a>
			<ul class="submenu">
				<li class="submenu-item first {if $page_name == 'history'}item-active{/if}">
					<a href="{$link->getPageLink('history', true)}" title="{l s='Orders'}">Mes commandes</a>
				</li>
				<li class="submenu-item {if $page_name == 'identity'}item-active{/if}">
					<a href="{$link->getPageLink('identity', true)}" title="{l s='Information'}">Mes informations</a>
				</li>
				<li class="submenu-item {if $page_name == 'addresses'}item-active{/if}">
					<a href="{$link->getPageLink('addresses', true)}" title="{l s='Addresses'}">Mes adresses</a>
				</li>
				<li class="submenu-item {if $page_name == 'discount'}item-active{/if}">
					<a href="{$link->getPageLink('discount', true)}" title="{l s='Vouchers'}">Mes r&eacute;ductions</a>
				</li>
				<li class="submenu-item {if $page_name == 'module-referralprogram-program'}item-active{/if}">
					<a href="{$base_dir}?fc=module&module=referralprogram&controller=program" title="Parainnage">Parainnage</a>
				</li>
			</ul>
		</li>
	</ul>
</nav><!-- / .secondary-menu -->