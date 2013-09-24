
<nav class="add-link">
	<ul class="footer-link">
		<li>
			<a href="{$link->getPageLink('sitemap')}" title="{l s='sitemap' mod='blockcms'}">{l s='Sitemap' mod='blockcms'}</a>
		</li>
		{foreach from=$cmslinks item=cmslink}
			{if $cmslink.meta_title != ''}
				.
			{/if}
		{/foreach}
		<li>
			<a href="{$link->getPageLink($contact_url, true)}" title="{l s='Contact us' mod='blockcms'}">{l s='Contact us' mod='blockcms'}</a>
		</li>
	</ul>
</nav>