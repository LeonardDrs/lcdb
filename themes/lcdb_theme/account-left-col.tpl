<form id="form-search" method="get" action="{$link->getPageLink('search', true)}">
	<input type="text" id="search" name="search" placeholder="Recherche..." />
	<input type="hidden" name="orderby" value="position" />
	<input type="hidden" name="controller" value="search" />
	<input type="hidden" name="orderway" value="desc" />
	<button type="submit" name="submit">OK</button>
</form>
<nav class="secondary-menu small-bloc">
	<ul>
		<li class="secondary-menu-item first item-active"><a href="#" title="Mon compte">mon compte</a>
			<ul class="submenu">
				<li class="submenu-item first">
					<a href="{$link->getPageLink('history', true)}" title="{l s='Orders'}">Mes commandes</a>
				</li>
				<li class="submenu-item">
					<a href="#" title="Mon abonnement">Mon abonnement</a>
				</li>
				<li class="submenu-item">
					<a href="{$link->getPageLink('identity', true)}" title="{l s='Information'}">Mes informations</a>
				</li>
				<li class="submenu-item">
					<a href="{$link->getPageLink('addresses', true)}" title="{l s='Addresses'}">Mes adresses</a>
				</li>
				<li class="submenu-item">
					<a href="{$link->getPageLink('discount', true)}" title="{l s='Vouchers'}">Mes r&eacute;ductions</a>
				</li>
				<li class="submenu-item">
					<a href="#" title="Parainnage">Parainnage</a>
				</li>
			</ul>
		</li>
	</ul>
</nav><!-- / .secondary-menu -->