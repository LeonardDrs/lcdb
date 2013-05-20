<div id="columns" class="content clearfix">
	<div id="left_column">
		{include file="./account-left-col.tpl"}
	</div><!-- / #left_column -->
	<div id="center_column">
		<div class="big-bloc">
			<h1>Abonnez-vous !</h1>
			<p>Simplifiez-vous la vie avec nos divers abonnements.</p>
			<div class="clearfix">
				<img src="{$base_dir}themes/lcdb_theme/img/img_solo/abonnement-box.png" alt="abonnement colis du boucher" title="abonnement colis du boucher" id="abonnement-box" />
				<p class="justified">Plus besoin de penser à passer commande, courir au supermarché ou sortir un plat surgelé (sic)…En vous abonnant vous décidez de recevoir régulièrement chez vous les meilleures viandes d’Auvergne, Bio ou Label Rouge. Parmi tous nos différents abonnements, vous pourrez opter pour du sur-mesure !</p>
			</div>
			<hr />
			<form>
				<div class="step clearfix" id="step1">
					<h2 class="green-title"><span class="img-step img-step-1"></span>Composition et nombre de produits</h2>
					<div class="left-side">
						<p class="colis-label">Colis :</p>
						<ul>
							<li><label class="checkbox" for="composition-sans-porc"><input type="checkbox" id="composition-sans-porc" />sans porc</label></li>
							<li><label class="checkbox" for="composition-sans-agneau"><input type="checkbox" id="composition-sans-agneau" />sans agneau</label></li>
							<li><label class="checkbox" for="composition-bio"><input type="checkbox" id="composition-bio" />100% BIO</label></li>
							<li><label class="checkbox" for="composition-cuisine-facile"><input type="checkbox" id="composition-cuisine-facile" />cuisine facile*</label></li>
						</ul>
					</div>
					<div class="right-side">
						<div class="clearfix">
							<label for="nombre-portions">Nombre de portions par livraison**:</label>
							<select id="nombre-portions">
								<option>-</option>
								<option>12</option>
								<option>18</option>
							</select>
						</div>
						<p><span class="bold">Prix unitaire*** TTC</span> de votre colis en abonnement : <span class="price">35&euro;</span></p>
					</div>
					<ul class="notes">
						<li>* Colis composé uniquement de viandes à griller ou à rôtir.</li>
						<li>** 6 portions équivalent à 3 repas pour 2 personnes ou bien 2 repas pour 3 personnes.</li>
						<li>*** Le montant unitaire de votre colis est fixe et calculé en fonction des options cochées et du nombre de portions souhaité.</li>
					</ul>
				</div>
				<hr />
				<div class="step clearfix" id="step2">
					<h2 class="green-title"><span class="img-step img-step-2"></span>Adresse</h2>
					<div class="left-side">
						<ul id="saved-adresse">
							<li>Pierre DURAN</li>
							<li>3, rue du chêne</li>
							<li>BAT A, appt 23, code : 4738</li>
							<li>75003 Paris</li>
							<li>0616186327</li>
						</ul>
						<div id="form-adresse" class="hidden">
							<label for="adresse-1">Adresse</label>
							<input type="text" id="adresse-1" value="Pierre DURAN"/>
							<label for="adresse-2">Adresse compl&eacute;mentaire</label>
							<input type="text" id="adresse-2" value="3, rue du chêne"/>
							<label for="code-postal">Code Postal</label>
							<input type="text" id="code-postal" value="BAT A, appt 23, code : 4738"/>
							<label for="ville">Ville</label>
							<input type="text" id="ville" value="75003 Paris"/>
							<label for="telephone">T&eacute;l&eacute;phone</label>
							<input type="text" id="telephone" value="0616186327"/>
							<div class="clearfix">
								<button type="submit" id="adress-submit" class="red-button gradient">ENREGISTRER</button>
								<a href="#" title="annuler" id="cancel-address" class="hidden">Annuler</a>
							</div>
						</div>
						<a href="#" title="modifier votre adresse de livraison" id="modify-address">modifier votre adresse de livraison</a>
					</div>
					<div class="right-side">
						<p class="justified">L'abonnement des Colis du Boucher n'est actuellement disponible que dans certaines villes d'Ile-de-France. En modifiant votre adresse principale vous risquez de ne plus avoir accès à ce service.</p>
						<p>Pour accéder à la liste de toutes les villes bénéficiant de l'abonnement, <a href="#" title="villes bénéficiant de l'abonnement" id="villes">cliquez ici</a>.</p>
						<div id="villes-abonnees">
							<div class="popin">
								<a href="#" title="Fermer" class="popin-close"></a>
								<p>Villes bénéficiant de l'offre "abonnement" des Colis du Boucher :</p>
								<select size="12">
									<option>75001, Paris I</option>
									<option>75002, Paris II</option>
									<option>75003, Paris III</option>
									<option>75004, Paris IV</option>
									<option>75005, Paris V</option>
									<option>75006, Paris VI</option>
									<option>75007, Paris VII</option>
									<option>75008, Paris VIII</option>
									<option>75009, Paris IX</option>
									<option>75010, Paris X</option>
									<option>75011, Paris XI</option>
									<option>75012, Paris XII</option>
									<option>75013, Paris XIII</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="step" id="step3">
					<h2 class="green-title"><span class="img-step img-step-3"></span>Fréquence de livraison</h2>
					<div class="clearfix">
						<div class="left-side">
							<p>Fr&eacute;quence :</p>
							<ul class="frequence-list">
								<li><label class="radio" for="hebdomadaire"><input type="radio" name="frequence" id="hebdomadaire" />hebdomadaire</label></li>
								<li><label class="radio" for="bi-mensuelle"><input type="radio" name="frequence" id="bi-mensuelle" />bi-mensuelle</label></li>
								<li><label class="radio" for="mensuelle"><input type="radio" name="frequence" id="mensuelle" />mensuelle</label></li>
							</ul>
							<div class="clearfix" id="days-choice">
								<div id="day-name">
									<select>
										<option>-</option>
										<option>mardi</option>
										<option>jeudi</option>
										<option>vendredi</option>
									</select>
								</div>
								<div id="day-number">
									<select>
										<option>-</option>
										<option>1<sup>er</sup></option>
										<option>2<sup>e</sup></option>
										<option>3<sup>e</sup></option>
										<option>4<sup>e</sup></option>
									</select>
								</div>
								<div class="pronom">Le</div>
								<div id="bi-mensuelle-phrase">une semaine sur deux</div>
								<div id="mensuelle-phrase">de chaque mois</div>
							</div>

						</div>
						<div class="right-side">
							<p>Merci de préciser le ou les créneau(x) horaires de livraison souhaité(s) :</p>
							<span class="comment">(avec, si possible, au moins un créneau de 2 heures ou plus)</span>
							<ul id="creneau">
								<li id="error" class="hidden"></li>
								<li class="clearfix">
									<label for="entre">Entre :</label>
									<select id="entre">
										<option>-</option>
										<option>7h30</option>
										<option>8h00</option>
										<option>8h30</option>
										<option>9h00</option>
										<option>9h30</option>
										<option>10h00</option>
										<option>10h30</option>
										<option>11h00</option>
										<option>11h30</option>
										<option>12h00</option>
										<option>12h30</option>
										<option>13h00</option>
										<option>13h30</option>
										<option>14h00</option>
										<option>14h30</option>
										<option>15h00</option>
										<option>15h30</option>
										<option>16h00</option>
										<option>16h30</option>
										<option>17h00</option>
										<option>17h30</option>
										<option>18h00</option>
										<option>18h30</option>
										<option>19h00</option>
										<option>19h30</option>
										<option>20h00</option>
										<option>20h30</option>
									</select>
									<label for="et">et</label>
									<select id="et">
										<option>-</option>
										<option>7h30</option>
										<option>8h00</option>
										<option>8h30</option>
										<option>9h00</option>
										<option>9h30</option>
										<option>10h00</option>
										<option>10h30</option>
										<option>11h00</option>
										<option>11h30</option>
										<option>12h00</option>
										<option>12h30</option>
										<option>13h00</option>
										<option>13h30</option>
										<option>14h00</option>
										<option>14h30</option>
										<option>15h00</option>
										<option>15h30</option>
										<option>16h00</option>
										<option>16h30</option>
										<option>17h00</option>
										<option>17h30</option>
										<option>18h00</option>
										<option>18h30</option>
										<option>19h00</option>
										<option>19h30</option>
										<option>20h00</option>
										<option>20h30</option>
									</select>
								</li>
								<li class="clearfix">
									<label for="ouentre">Ou entre :</label>
									<select id="ouentre">
										<option>-</option>
										<option>7h30</option>
										<option>8h00</option>
										<option>8h30</option>
										<option>9h00</option>
										<option>9h30</option>
										<option>10h00</option>
										<option>10h30</option>
										<option>11h00</option>
										<option>11h30</option>
										<option>12h00</option>
										<option>12h30</option>
										<option>13h00</option>
										<option>13h30</option>
										<option>14h00</option>
										<option>14h30</option>
										<option>15h00</option>
										<option>15h30</option>
										<option>16h00</option>
										<option>16h30</option>
										<option>17h00</option>
										<option>17h30</option>
										<option>18h00</option>
										<option>18h30</option>
										<option>19h00</option>
										<option>19h30</option>
										<option>20h00</option>
										<option>20h30</option>
									</select>
									<label for="et2">et</label>
									<select id="et2">
										<option>-</option>
										<option>7h30</option>
										<option>8h00</option>
										<option>8h30</option>
										<option>9h00</option>
										<option>9h30</option>
										<option>10h00</option>
										<option>10h30</option>
										<option>11h00</option>
										<option>11h30</option>
										<option>12h00</option>
										<option>12h30</option>
										<option>13h00</option>
										<option>13h30</option>
										<option>14h00</option>
										<option>14h30</option>
										<option>15h00</option>
										<option>15h30</option>
										<option>16h00</option>
										<option>16h30</option>
										<option>17h00</option>
										<option>17h30</option>
										<option>18h00</option>
										<option>18h30</option>
										<option>19h00</option>
										<option>19h30</option>
										<option>20h00</option>
										<option>20h30</option>
									</select>
									<label>(facultatif)</label>
								</li>
								<li><p>Votre boucher est plutôt du matin <img src="img/img_solo/smiley.png" title=":)" alt="smiley content" /></p></li>
							</ul>
						</div>
					</div>
					<p class="step3-tel">Après avoir confirmé votre abonnement en bas de page, nous vous contacterons par téléphone pour voir ensemble les derniers détails liés à vos préférences de livraison.</p>
				</div>
				<hr />
				<div class="step clearfix" id="step4">
					<h2 class="green-title"><span class="img-step img-step-4"></span>Mode de paiement</h2>
					<div class="left-side last-step">
						<p>Paiement :</p>
						<ul>
							<li class="clearfix"><label class="radio" for="cheque-espece"><input type="radio" name="paiement" id="cheque-espece" /><span class="bold">par chèque ou espèces</span>, à la réception du colis</label></li>
							<li class="clearfix"><label class="radio" for="virement"><input type="radio" name="paiement" id="virement" /><span class="bold">par virement</span>, paiement de l'ensemble des colis en fin de mois</label></li>
							<li class="clearfix"><label class="radio" for="cb"><input type="radio" name="paiement" id="cb" /><span class="bold">par carte bancaire</span> (en ligne), après réception de l'email vous indiquant que votre commande 
								a bien été passée auprès des éleveurs</label></li>
						</ul>
					</div>
				</div>
				<hr />
				<input type="submit" id="abonnement-submit" class="red-button gradient" value="JE M'ABONNE !" />
				<p>Une fois abonné, vous pourrez à tout moment modifier votre abonnement depuis votre espace membre, rubrique "Mon abonnement".</p>
			</form>
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content -->