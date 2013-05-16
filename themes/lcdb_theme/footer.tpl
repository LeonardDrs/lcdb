

	{if !$content_only}
			<footer>
				<div class="footer-top">
					<span class="separation"></span>
					<nav class="more-information">
						<ul>
							<li class="livraison">
								<a href="#" title="En savoir plus sur la livraison réfrigérée">
									<span class="illustration"></span>
									<span class="push">Livraison réfrigérée</span>
									<span class="cta">découvrir</span>
								</a>
							</li>
							<li class="paiement">
								<a href="#" title="En savoir plus sur le paiement sécurisé">
									<span class="illustration"></span>
									<span class="push">Paiement sécurisé</span>
									<span class="cta">découvrir</span>
								</a>
							</li>
							<li class="sav">
								<a href="#" title="En savoir plus sur le SAV">
									<span class="illustration"></span>
									<span class="push">Service après-vente</span>
									<span class="cta">découvrir</span>
								</a>
							</li>
							<li class="faq">
								<a href="{$link->getCMSCategoryLink(7)}" title="Consulter la foire aux questions">
									<span class="illustration"></span>
									<span class="push">Foire aux questions</span>
									<span class="cta">découvrir</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="footer-bottom">
					<div class="newsletter">
						<p>Pour recevoir encore plus d'offres spéciales,
						anecdotes et conseils, inscrivez-vous à la newsletter!</p>
						<form id="form-newsletter" method="get">
							<input id="email" type="text" maxlength="100" placeholder="votre mail ici" name="email">
							<button type="submit" name="submit">S'inscrire</button>
						</form>
					</div>
					<nav class="add-link">
						{$HOOK_FOOTER}
					</nav>
					<div class="clearfix"></div>
					<nav class="seo-link">
						<ul>
							<li><a href="#" title="Colis viande label rouge">Colis viande label rouge</a></li>
							<li><a href="#" title="Colis viande label Bio">Colis viande label Bio</a></li>
							<li><a href="#" title="Colis viande de boeuf">Colis viande de boeuf</a></li>
						</ul>
						<ul>
							<li><a href="#" title="Achat de viande bovine">Achat de viande bovine</a></li>
							<li><a href="#" title="Achat de viande en direct">Achat de viande en direct</a></li>
							<li><a href="#" title="Achat de viande de boeuf">Achat de viande de boeuf</a></li>
						</ul>
						<ul>
							<li><a href="#" title="Viande bio">Viande bio</a></li>
							<li><a href="#" title="Viande label rouge">Viande label rouge</a></li>
							<li><a href="#" title="Viande livraison à domicile">Viande livraison à domicile</a></li>
						</ul>
						<ul>
							<li><a href="#" title="Poulets label rouge">Poulets label rouge</a></li>
							<li><a href="#" title="Agneau label rouge">Agneau label rouge</a></li>
							<li><a href="#" title="Boeuf label rouge">Boeuf label rouge</a></li>
						</ul>
					</nav>
					<p class="copyright"><span>&copy;</span> 2012 - Les Colis du Boucher - Tous droits réservés</p>
					<div class="spe-clearfix-ie7"></div>
				</div>
			</footer>
			<span class="shadow-bottom"></span>
		</div>
	{/if}
	</body>
</html>
