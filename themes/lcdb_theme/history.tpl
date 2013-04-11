


{capture name=path}<a href="{$link->getPageLink('my-account', true)}">{l s='My account'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='Orders'}{/capture}

<div id="columns" class="content clearfix">
	<div id="left_column">
		{include file="./account-left-col.tpl"}
	</div><!-- / #left_column -->
	<div id="center_column">
		<div class="big-bloc">
			<h1>{l s='Orders'}</h1>
			{include file="$tpl_dir./errors.tpl"}
			
			{if $slowValidation}
				<p id="empty-command"><span class="img-warning"></span>l s='If you have just placed an order, it may take a few minutes for it to be validated. Please refresh this page if your order is missing.'}</p>
			{/if}
			
			{if $orders && count($orders)}
				<hr />
				<div class="clearfix" id="mes-commandes">
					<div class="left-side">
						<h3>Dernières commande</h3>
						<hr />
						<p>Numéro de commande : <span class="bold">{$orders[0].reference}</span></p>
						<p>Commande réalisée le : <span class="bold">{dateFormat date=$orders[0].date_add full=0}</span></p>
						<p>Montant total : <span class="bold">{displayPrice price=$orders[0].total_paid currency=$orders[0].id_currency no_utf8=false convert=false}</span></p>
						<p>Mode de règlement : <span class="bold">{$orders[0].payment|escape:'htmlall':'UTF-8'}</span></p>
						<p>État du paiement : <span class="bold">{if isset($orders[0].order_state)}{$orders[0].order_state|escape:'htmlall':'UTF-8'}{/if}</span></p>
						<div class="clearfix commande-adresse">
							<p>Adresse de livraison :</p>
							<ul>
								<li>Jean-Baptiste Poquelin</li>
								<li>3 rue du chène</li>
								<li>Bat. A, appt 34, code : 7899</li>
								<li>69000 Lyon</li>
								<li>0148354756</li>
							</ul>
						</div>
						<hr />
						<a href="javascript:showOrder(1, {$orders[0].id_order|intval}, '{$link->getPageLink('order-detail', true)}');" title="Voir le détail">&rarr; Voir le détail</a>
					</div>
					<div class="right-side">
						<h3>Prochaine commande</h3>
						<hr />
						<p>Numéro de commande : <span class="bold">GHUYSKKI</span></p>
						<p>Commande réalisée le : <span class="bold">12/02/2013</span></p>
						<p>Montant total : <span class="bold">82,25 &euro;</span></p>
						<p>Mode de règlement : <span class="bold">Chèque</span></p>
						<p>État du paiement : <span class="bold">En attente de paiement</span></p>
						<div class="clearfix commande-adresse">
							<p>Adresse de livraison :</p>
							<ul>
								<li>Jean-Baptiste Poquelin</li>
								<li>3 rue du chène</li>
								<li>Bat. A, appt 34, code : 7899</li>
								<li>69000 Lyon</li>
								<li>0148354756</li>
							</ul>
						</div>
						<hr />
						<a href="#" title="Voir le détail">&rarr; Voir le détail</a>
						<a href="#" title="Télécharger la facture">&rarr; Télécharger la facture</a>
					</div>
				</div>
				<hr />
				<div id="block-order-detail" class="hidden"></div>
			{else}
				<p id="empty-command"><span class="img-warning"></span>{l s='You have not placed any orders.'}</p>
			{/if}
			
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content -->
