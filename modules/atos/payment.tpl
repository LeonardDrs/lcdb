
<div id="credit-card">
	<!-- <label class="radio" for="cb">
		<input type="radio" id="cb" name="payment" value="carte-credit"/> Carte Bancaire
	</label> -->
	<p>Lorsque vous achetez sur lescolisduboucher.com, votre paiement
	est entièrement sécurisé via le protocole de cryptage de données SSL 3.</p>
	{if $atos}
		<p class="bold">{$atos}</p>
		<!-- <a href="http://vps24258.ovh.net/shop/index.php?fc=module&amp;module=cashondelivery&amp;controller=validation" rel="nofollow">accéder</a> -->
	{else}
		<p>{l s='Your order total must be greater than' mod='atos'} {displayPrice price=1} {l s='in order to pay by credit card.' mod='atos'}</p>
	{/if}
</div>