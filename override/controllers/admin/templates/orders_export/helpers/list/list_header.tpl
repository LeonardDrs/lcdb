
{extends file="helpers/list/list_header.tpl"}

{block name=leadin}
	<form method="post">
		<fieldset>
			<h3>Commandes: {$priceRange}</h3>
			<p>
				<label>Entre le: </label>
				<input type="text" class="filter datepicker hasDatepicker" value="{$dateStartFilter}" name="dateStartFilter"/>
			</p>
			<p>
				<label>Et le: </label>
				<input type="text" class="filter datepicker hasDatepicker" value="{$dateEndFilter}" name="dateEndFilter"/>
			</p>
			<input type="submit" value"Filtrer">
		</fieldset>
	</form>
	
	<br/>
{/block}
