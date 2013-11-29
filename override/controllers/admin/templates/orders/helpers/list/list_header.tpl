

{extends file="helpers/list/list_header.tpl"}

{block name=leadin}
	<fieldset>
		<ul>
			<li>Nombre de commandes: <strong>{$totalOrders}</strong></li>
			<li>Montant total des commandes: <strong>{convertPrice price=$totalAmount}</strong></li>
			<li>Panier moyen: <strong>{convertPrice price=$cartAverage}</strong></li>
		</ul>
	</fieldset>
	<br/>
{/block}
