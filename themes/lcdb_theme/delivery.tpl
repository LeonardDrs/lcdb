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
						<p class="label_livraison"><label for="code_postal">Code Postal: </label> <input type="text" maxlength="5" id="code_postal" /><input id="bouton_carre" name="bouton_carre" type="submit" value="OK" /></p>
					</form>
				</div>
			</div>
			
			{if isset($delivery)}
				<div class="bloc_inf_livraison">
					
					<table class="tarifs_livraison">
						{if isset($delivery.minimum)}
							<tr>
								<th  colspan="4" class="rouge">Minimum de commande : {$delivery.minimum}</th>
							</tr>
						{/if}
						{if isset($delivery.value)}
							<tr class="fond_vert">
								<td>Montant de la commande</td>
								{foreach from=$delivery.value item=value}
									<td>{$value}</td>
								{/foreach}
							</tr>
						{/if}
						{if isset($delivery.shipping)}
							<tr>
								<td>Frais de livraison</td>
								{foreach from=$delivery.shipping item=shipping}
									<td>{$shipping}</td>
								{/foreach}
							</tr>
						{/if}
						{if isset($delivery.time)}
							<tr>
								<td>Horaires de livraison</td>
								<td  colspan="3">{$delivery.time}</td>
							</tr>
						{/if}
					</table>
					
					{if isset($delivery.id)}
						
						{if $delivery.id == 1}
						
							<p class="titre_vert_2">Regroupement de commande</p>
							<p>Parlez des Colis du Boucher à vous voisins ou au bureau et économisez les frais de livraison. En commandant à plusieurs pour le même jour et à la même adresse de livraison vous pourrez ainsi plus facilement faire baisser les frais de livraison, voire les annuler complètement.</p>
							
						{elseif $delivery.id == 2}
							
							<p class="titre_vert_2">Pour une livraison à domicile ou au bureau</p>
							<p>Quoi de mieux que de se faire livrer chez soi, directement d'Auvergne dans son frigo? <strong>Nous livrons à domicile ou au bureau de 7h30 à 20h</strong>, dans un créneau horaire  d'une heure minimum que vous nous communiquez lors de la commande. Dans l'idéal deux créneaux  horaires sont souhaités, dont un le matin.</p>
							
						{elseif $delivery.id == 3}
							
							<p class="titre_vert_2">Pour une livraison à domicile ou au bureau</p>
							<p>Quoi de mieux que de se faire livrer chez soi, directement d'Auvergne dans son frigo? <strong>Nous livrons à domicile ou au bureau de 7h30 à 20h</strong>, dans un créneau horaire  d'une heure minimum que vous nous communiquez lors de la commande. Dans l'idéal deux créneaux  horaires sont souhaités, dont un le matin.</p>
							<p class="titre_vert_2">Pour une livraison en Point Relais</p>
							<p>Les Colis du Boucher veulent vous offrir le maximum de service et de souplesse. Pour cela nous vous proposons une livraison à domicile, à votre bureau ou en Point Relais.<br><br>Le Point Relais donne l'avantage des horaires beaucoup plus souples. <strong>Vous récupérez votre Colis quand cela vous arrange à partir de 12h</strong>. Les horaires de retrait de colis  varient selon le point relais.</p>
							<div class="lien_vert italique"><a href="#" title="Voir la carte des points relais" id="show-map"><span>Voir la carte des points relais</span></a></div>
							<div id="relays">
								<div class="popin">
									<a href="#" title="Fermer" class="popin-close"></a>
									<p class="popin-title">Points relais</p>
									<div class="clearfix content-wrapper">
										<div id="left-side">
											<ul id="relay-list"></ul>
										</div>
										<div id="right-side">
											<div id="map"></div>
										</div>
									</div>
								</div>
							</div>
							
						{elseif $delivery.id == 4}
							
							<p class="titre_vert_2">Pour une livraison à domicile ou au bureau</p>
							<p>Quoi de mieux que de se faire livrer chez soi, directement d’Auvergne dans son frigo? Nous livrons à domicile ou au bureau de <strong>14h à 22h en semaine</strong>, dans un créneau horaire de 2 heures que vous nous communiquez lors de la commande, ou le <strong>samedi de 8h à 13h</strong>.</p>
							<p class="titre_vert_2">Regroupement de commande</p>
							<p>Parlez des Colis du Boucher à vous voisins ou au bureau et économisez les frais de livraison. En commandant à plusieurs pour le même jour et à la même adresse de livraison vous pourrez ainsi plus facilement faire baisser les frais de livraison, voire les annuler complètement.</p>
					
						{/if}
						
					{/if}
					
				</div>
			{/if}
			
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content -->