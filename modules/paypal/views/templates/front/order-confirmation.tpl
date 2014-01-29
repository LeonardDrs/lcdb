

<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		{if $smarty.const._PS_VERSION_ < 1.5 && isset($use_mobile) && $use_mobile}
			{include file="$tpl_dir./modules/paypal/views/templates/front/order-confirmation.tpl"}
		{else}

			{capture name=path}{l s='Order confirmation' mod='paypal'}{/capture}

			<h1>{l s='Order confirmation' mod='paypal'}</h1>

			{assign var='current_step' value='payment'}
			{include file="$tpl_dir./errors.tpl"}

			{$HOOK_ORDER_CONFIRMATION}
			{$HOOK_PAYMENT_RETURN}

			<br />

			{if $order}
			<p>{l s='Total of the transaction (taxes incl.) :' mod='paypal'} <span class="bold">{$price}</span></p>
			<p>{l s='Your order ID is :' mod='paypal'} <span class="bold">{$order.id_order}</span></p>
			<p>{l s='Your PayPal transaction ID is :' mod='paypal'} <span class="bold">{$order.id_transaction}</span></p>
			{/if}
			<br />

			{if $is_guest}
				<a href="{$link->getPageLink('guest-tracking.php', true)}?id_order={$order_reference}" title="{l s='Follow my order' mod='paypal'}" data-ajax="false"><img src="{$img_dir}icon/order.gif" alt="{l s='Follow my order'}" class="icon" /></a>
				<a href="{$link->getPageLink('guest-tracking.php', true)}?id_order={$order_reference}" title="{l s='Follow my order' mod='paypal'}" data-ajax="false">{l s='Follow my order' mod='paypal'}</a>
			{else}
				<a href="{$link->getPageLink('history.php', true)}" title="{l s='Back to orders' mod='paypal'}" data-ajax="false"><img src="{$img_dir}icon/order.gif" alt="{l s='Back to orders'}" class="icon" /></a>
				<a href="{$link->getPageLink('history.php', true)}" title="{l s='Back to orders' mod='paypal'}" data-ajax="false">{l s='Back to orders' mod='paypal'}</a>
			{/if}
		{/if}
	</div>
</div>