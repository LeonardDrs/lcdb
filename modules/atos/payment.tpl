<div class="payment_module atos">
	{if $atos}
		<p class="bold teaser">{l s='Payer par carte bancaire' mod='atos'}</p>
		{$atos}
	{else}
		{l s='Your order total must be greater than' mod='atos'} {displayPrice price=1} {l s='in order to pay by credit card.' mod='atos'}
	{/if}
</div>