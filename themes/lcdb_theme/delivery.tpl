<div id="columns" class="content clearfix">
	<div id="center_column" class="single">
		<div class="big-bloc">
			<h1>Jusqu'à chez vous!</h1>
			<p class="italique">Le lien le plus court avec les éleveurs.</p>
			<div class="bloc_sup_livraison">
				<img src="{$img_dir}asset/img_solo/livraison2.png" alt="">
				<div class="bloc_droite">
					<p>Entrez <strong>le code postal de la ville où vous souhaiteriez vous faire livrer</strong> pour connaître les frais et le modes de livraison qui vous sont proposés</p>
					<form method="post" action="{$base_dir}index.php?controller=delivery">
						<p class="label_livraison"><label for="code_postal">Code Postal: </label> 
							<input type="text" maxlength="5" id="code_postal" name="code_postal" value="{if isset($smarty.post.code_postal)}{$smarty.post.code_postal}{/if}" />
							<input id="bouton_carre" name="bouton_carre" type="submit" value="OK" />
						</p>
					</form>
				</div>
			</div>
			
			{if isset($delivery)}
				<div class="bloc_inf_livraison">

					{if $delivery.zone == 0}

						<p>Erreur ! Votre code n'est pas valide.</p>

					{else}
					
						<table class="tarifs_livraison">

							<tr>
								<th  colspan="4" class="rouge">Minimum de commande : {$delivery.minimum_order}</th>
							</tr>

							{if $delivery.zone == $id_zone_paris}	

								<tr class="fond_vert">
									<td>Mode de livraison</td>
									{if isset($delivery.infos[0])}
										<td>{$delivery.infos[0].mode}</td>
									{/if}
									{if isset($delivery.infos[1])}
										<td>{$delivery.infos[1].mode}</td>
									{/if}									
								</tr>
								<tr>
									<td>Frais de livraison</td>
									{if isset($delivery.infos[0])}
										<td class="rouge">{$delivery.infos[0].ship}</td>
									{/if}
									{if isset($delivery.infos[1])}
										<td class="rouge">{$delivery.infos[1].ship}</td>
									{/if}
								</tr>
								<tr>
									<td>Horaires de livraison</td>
									{if isset($delivery.infos[0])}
										<td>{$delivery.infos[0].time}</td>
									{/if}
									{if isset($delivery.infos[1])}
										<td>{$delivery.infos[1].time}</td>
									{/if}
								</tr>	

							{else}

								<tr class="fond_vert">
									<td>Montant de la commande</td>
									{if isset($delivery.infos[0])}
										<td>{$delivery.infos[0].price}</td>
									{/if}
									{if isset($delivery.infos[1])}
										<td>{$delivery.infos[1].price}</td>
									{/if}
									{if isset($delivery.infos[2])}
										<td>{$delivery.infos[2].price}</td>
									{/if}
								</tr>

								<tr>
									<td>Frais de livraison</td>
									{if isset($delivery.infos[0])}
										<td>{$delivery.infos[0].ship}</td>
									{/if}
									{if isset($delivery.infos[1])}
										<td>{$delivery.infos[1].ship}</td>
									{/if}
									{if isset($delivery.infos[2])}
										<td>{$delivery.infos[2].ship}</td>
									{/if}
								</tr>

								<tr>
									<td>Horaires de livraison</td>
									<td  colspan="3">{$delivery.time}</td>
								</tr>

							{/if}


						</table>
						
						{$delivery.content}
					
					{/if}

				</div>
			{/if}
			
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content -->