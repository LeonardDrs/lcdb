<div class="register-basket">
	<div id="connection-register">
		{if !$logged}
			<a href="{$link->getPageLink('my-account', true)}" title="se connecter">Connexion</a> / <a href="{$link->getPageLink('authentification', true)}" title="s'inscrire">Inscription</a>
		{else}
			<a href="{$link->getPageLink('my-account', true)}" title="mon compte">Mon compte</a>
		{/if}
	</div>
	<div id="basket">
		<span class="illustration"></span>
		<p>Panier (<span class="price">52</span> €)</p>
	</div>
</div>
