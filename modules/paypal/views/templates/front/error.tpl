
<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		{if $smarty.const._PS_VERSION_ < 1.5 && isset($use_mobile) && $use_mobile}
			{include file="$tpl_dir./modules/paypal/views/templates/front/error.tpl"}
		{else}
		
			{capture name=path}<a href="order.php">{l s='Your shopping cart' mod='paypal'}</a><span class="navigation-pipe"> {$navigationPipe|escape:'htmlall':'UTF-8'} </span> {l s='PayPal' mod='paypal'}{/capture}

			<h2>{$message|escape:'htmlall':'UTF-8'}</h2>
			{if isset($logs) && $logs}
				<div class="error">
					<p><b>{l s='Please try to contact the merchant:' mod='paypal'}</b></p>
					
					<ol>
					{foreach from=$logs key=key item=log}
						<li>{$log|escape:'htmlall':'UTF-8'}</li>
					{/foreach}
					</ol>
					
					<br>	
					
					{if isset($order)}
						<p>
							{l s='Total of the transaction (taxes incl.) :' mod='paypal'} <span class="bold">{$price|escape:'htmlall':'UTF-8'}</span><br>
							{l s='Your order ID is :' mod='paypal'} <span class="bold">{$order.id_order|intval}</span><br>
						</p>
					{/if}
					
					<p><a href="{$base_dir}" class="button_small" title="{l s='Back' mod='paypal'}">&laquo; {l s='Back' mod='paypal'}</a></p>
				</div>
			
			{/if}
		{/if}
	</div>
</div>