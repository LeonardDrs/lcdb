<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 22:55:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:428811984519001dbbb2185-62916214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2009dabfc181333fa55bc05114e1009fa0fe8a55' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/footer.tpl',
      1 => 1368369988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '428811984519001dbbb2185-62916214',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'link' => 0,
    'HOOK_FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519001dbbe5305_08414922',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519001dbbe5305_08414922')) {function content_519001dbbe5305_08414922($_smarty_tpl) {?>

	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
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
								<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSCategoryLink(7);?>
" title="Consulter la foire aux questions">
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
						<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

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
	<?php }?>
	</body>
</html>
<?php }} ?>