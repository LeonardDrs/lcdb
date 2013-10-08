
<nav class="add-link">
	<ul class="footer-link">
		{foreach from=$cmslinks item=cmslink}
			{if $cmslink.meta_title != ''}
				<li class="item"><a href="{$cmslink.link|addslashes|escape:'html'}" title="{$cmslink.meta_title|escape:'htmlall':'UTF-8'}">{$cmslink.meta_title|escape:'htmlall':'UTF-8'}</a></li>
			{/if}
		{/foreach}
		<li>
			<a href="{$link->getPageLink('sitemap')}" title="{l s='sitemap' mod='blockcms'}">{l s='Sitemap' mod='blockcms'}</a>
		</li>
		<li>
			<a href="{$link->getPageLink($contact_url, true)}" title="{l s='Contact us' mod='blockcms'}">{l s='Contact' mod='blockcms'}</a>
		</li>
	</ul>
	<ul class="presse-fb">
		<li class="presse"><a href="#" title="La presse parle de nous"><span></span>La presse parle de nous</a></li>
		<li class="facebook"><a href="#" title="Aller sur notre page Facebook"><span></span>Suivez-nous sur Facebook</a></li>
	</ul>
</nav>