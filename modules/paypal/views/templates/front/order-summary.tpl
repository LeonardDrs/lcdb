
<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		{if $smarty.const._PS_VERSION_ < 1.5 && isset($use_mobile) && $use_mobile}
			{include file="$tpl_dir./modules/paypal/views/templates/front/order-summary.tpl"}
		{else}
		
			{capture name=path}<a href="order.php">{l s='Your shopping cart' mod='paypal'}</a><span class="navigation-pipe"> {$navigationPipe} </span> {l s='PayPal' mod='paypal'}{/capture}

			<h1>{l s='Order summary' mod='paypal'}</h1>

			{assign var='current_step' value='payment'}
			{include file="$tpl_dir./order-steps.tpl"}

			<h3>{l s='PayPal payment' mod='paypal'}</h3>
			<form action="{$form_action}" method="post" data-ajax="false">
				<p>
					<img src="{$logos.LocalPayPalLogoMedium}" alt="{l s='PayPal' mod='paypal'}" style="margin-bottom: 5px" />
					<br />{l s='You have chosen to pay with PayPal.' mod='paypal'}
					<br/><br />
				{l s='Here is a short summary of your order:' mod='paypal'}
				</p>
				<p style="margin-top:20px;">
					- {l s='The total amount of your order is' mod='paypal'}
					<span id="amount" class="price"><strong>{$total}</strong></span> {if $use_taxes == 1}{l s='(tax incl.)' mod='paypal'}{/if}
				</p>
				<p>
					- {l s='We accept the following currency to be sent by PayPal:' mod='paypal'}&nbsp;<b>{$currency->name}</b>
				</p>
				<p>
					<b>{l s='Please confirm your order by clicking \'I confirm my order\'' mod='paypal'}.</b>
				</p>
				<p class="cart_navigation">
					<input type="submit" name="confirmation" value="{l s='I confirm my order' mod='paypal'}" class="exclusive_large" />
				</p>
			</form>
		{/if}
	</div>
</div>