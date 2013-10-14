{assign var='current_step' value='shipping'}
<div id="columns" class="content clearfix">
<pre>
	<!-- {$cart|print_r} -->
</pre>
	<div class="bloc-checkout">
			{include file="./order-steps.tpl"}
		<div class="content-checkout">
			<h1>{l s='Shopping cart summary'}</h1>
			<div class="content-checkout">
				<h1>Date de livraison</h1>
				<div class="bloc-time">
					<form action="{$link->getPageLink('order', true, NULL)}" method="post" id="date-livraison">
						<p>Choisissez votre date de livraison:</p>
						<div id="selected-date-hours">
							<div id="selected-date">
								<p>Date sélectionnée :</p>
								<input type="text" name="mydate" id="mydate" gldp-id="mydate" value="-" readonly />
							</div>
							<div id="selected-hours"></div>
						</div>
						<div id="calendar">
							<div gldp-el="mydate" style="width:515px; height:300px;" id="block-calendar" class="clearfix"></div>
							<div id="legend">
								<ul>
									<li class="impossible"><span></span><span>Livraison impossible</span></li>
									<li class="possible"><span></span><span>Livraison possible</span></li>
									<li class="already-rec"><span></span><span>Livraison déjà enregistrée</span></li>
								</ul>
							</div>
						</div>
						<div class="warning">
							<p>Certains produits de votre panier ont une <span class="bold">période de livraison limitée</span>. Aussi, les dates de livraison
							proposées peuvent être moins nombreuses. Si vous souhaitez disposez davantage de dates de livraison, nous
							vous invitons à <a class="bold" href="#" title="Modifier votre panier">modifier votre panier</a> en enlevant les produits
							spéciaux concernés.</p>
						</div>
						<div class="action">
							<a href="{$link->getCategoryLink(3)|escape:'htmlall':'UTF-8'}" title="Continuer mes achats"><span>&rarr;</span> Continuer mes achats</a>
							<input type="hidden" name="step" value="3" />
							<input type="hidden" name="back" value="{$back}" />
							<button name="submit" name="processCarrier" type="submit" disabled>Valider ma date de livraison</button>
							<input type="submit" value="Valider ma date de livraison" />
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>
