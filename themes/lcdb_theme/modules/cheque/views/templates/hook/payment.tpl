<div id="check-transfert">
	<label class="radio" for="check-transfer">
		<input type="radio" id="check-transfer" name="payment" value="cheque-especes"/> Chèque ou espèces
	</label>
	<p>Paiement à la réception de votre colis</p>
	<a href="{$link->getModuleLink('cheque', 'payment', [], true)}" title="{l s='Pay by cheque' mod='cheque'}">accéder</a>
</div>