
{$HOOK_RIGHT_COLUMN}

<div class="small-bloc frais-livraison">
	<span class="bloc-title ribbon-frais-livraison"></span>
	<p><span class="img-livraison"></span>Frais de livraison de 0 à 20 €</p>
	<hr />
	<p class="livraison-small">Entrez votre code postal pour connaitre vos frais de livraison</p>
	<form id="form-code-postal" method="post" action="{$link->getPageLink('delivery', true)}">
		<input id="code-postal" type="text" placeholder="Code postal..." name="code_postal">
		<button type="submit" name="bouton_carre">OK</button>
	</form>
</div>

<div class="small-bloc mot-boucher">
	<span class="bloc-title ribbon-mot-boucher"></span>
	<h3>Le saviez-vous ?</h3>
	{$right_col.tips[0].content}
</div>