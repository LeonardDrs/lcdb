<?php /* Smarty version Smarty-3.1.8, created on 2013-05-02 15:42:56
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/product-default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66177602651826d60a701b5-93541962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99dc12bbf8bd9207b092de731d307c30cc61729a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/product-default.tpl',
      1 => 1366302517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66177602651826d60a701b5-93541962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adminActionDisplay' => 0,
    'product' => 0,
    'base_dir' => 0,
    'confirmation' => 0,
    'link' => 0,
    'static_token' => 0,
    'allow_oosp' => 0,
    'virtual' => 0,
    'PS_CATALOG_MODE' => 0,
    'quantityBackup' => 0,
    'last_qties' => 0,
    'restricted_country_mode' => 0,
    'priceDisplay' => 0,
    'priceDisplayPrecision' => 0,
    'productPrice' => 0,
    'tax_enabled' => 0,
    'display_tax_label' => 0,
    'productPriceWithoutReduction' => 0,
    'packItems' => 0,
    'ecotax_tax_exc' => 0,
    'ecotax_tax_inc' => 0,
    'unit_price' => 0,
    'HOOK_PRODUCT_ACTIONS' => 0,
    'HOOK_PRODUCT_FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51826d610b58d2_89595475',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51826d610b58d2_89595475')) {function content_51826d610b58d2_89595475($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_function_math')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/function.math.php';
?>
<div class="big-bloc">
	<a href="#" title="Retourner aux produits">&lt; Retourner aux produits</a>
	
	<?php if (isset($_smarty_tpl->tpl_vars['adminActionDisplay']->value)&&$_smarty_tpl->tpl_vars['adminActionDisplay']->value){?>
	<div id="admin-action">
		<p><?php echo smartyTranslate(array('s'=>'This product is not visible to your customers.'),$_smarty_tpl);?>

		<input type="hidden" id="admin-action-product-id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
		<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Publish'),$_smarty_tpl);?>
" class="exclusive" onclick="submitPublishProduct('<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php echo smarty_modifier_escape($_GET['ad'], 'htmlall', 'UTF-8');?>
', 0, '<?php echo smarty_modifier_escape($_GET['adtoken'], 'htmlall', 'UTF-8');?>
')"/>
		<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Back'),$_smarty_tpl);?>
" class="exclusive" onclick="submitPublishProduct('<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php echo smarty_modifier_escape($_GET['ad'], 'htmlall', 'UTF-8');?>
', 1, '<?php echo smarty_modifier_escape($_GET['adtoken'], 'htmlall', 'UTF-8');?>
')"/>
		</p>
		<p id="admin-action-result"></p>
		</p>
	</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value){?>
	<p class="confirmation">
		<?php echo $_smarty_tpl->tpl_vars['confirmation']->value;?>

	</p>
	<?php }?>
	
	<div id="item" itemscope itemtype="http://schema.org/Product">
		<div class="clearfix">
			<div id="product-image">
				<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/lcdb_theme/img/img_solo/product_boeuf.png" alt="Pavé (Rumsteak ou tende de tranche)" />
			</div>
			<div id="main-product-infos">
				<h1 itemprop="name"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->name, 'htmlall', 'UTF-8');?>
</h1>
				<?php if (isset($_smarty_tpl->tpl_vars['product']->value->description_short)){?>
					<div itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value->description_short;?>
</div>
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['product']->value->description)){?>
					<div class="full-description"><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</div>
				<?php }?>
			</div>
		</div>
		<div class="clearfix price-info">
			<div class="choix-race">
				<p>Race</p>
				<select class="meat-race">
					<option>Choisissez pour moi</option>
					<option>race 1</option>
					<option>race 2</option>
				</select>
			</div>
			<div class="add-to-basket-form">
				<div class="clearfix">
					<div class="label">
					</div>
					<div class="detailed-price">
						<p class="price" itemprop="price">8 €</p>
						<p class="price-kg">25,62€/kg</p>
					</div>
				</div>
				<div>
					<form class="form-panier clearfix" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart');?>
" method="post">
						<button type="button" name="minus" class="moreless minus">-</button>
						<input class="quantity" type="text" maxlength="2" value="0" name="quantity" disabled>
						<button type="button" name="plus" class="moreless plus">+</button>
						<button type="submit" name="submit" class="ajout-panier">ajouter au panier</button>

						<!-- hidden datas -->
						<p class="hidden">
							<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
" />
							<input type="hidden" name="id_product" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value->id);?>
" id="product_page_product_id" />
							<input type="hidden" name="add" value="1" />
							<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
						</p>

						<!-- quantity wanted -->
						<p id="quantity_wanted_p"<?php if ((!$_smarty_tpl->tpl_vars['allow_oosp']->value&&$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||$_smarty_tpl->tpl_vars['virtual']->value||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?> style="display: none;"<?php }?>>
							<label><?php echo smartyTranslate(array('s'=>'Quantity:'),$_smarty_tpl);?>
</label>
							<input type="text" name="qty" id="quantity_wanted" class="text" value="<?php if (isset($_smarty_tpl->tpl_vars['quantityBackup']->value)){?><?php echo intval($_smarty_tpl->tpl_vars['quantityBackup']->value);?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['product']->value->minimal_quantity>1){?><?php echo $_smarty_tpl->tpl_vars['product']->value->minimal_quantity;?>
<?php }else{ ?>1<?php }?><?php }?>" size="2" maxlength="3" <?php if ($_smarty_tpl->tpl_vars['product']->value->minimal_quantity>1){?>onkeyup="checkMinimalQuantity(<?php echo $_smarty_tpl->tpl_vars['product']->value->minimal_quantity;?>
);"<?php }?> />
						</p>

						<!-- availability -->
						<p id="availability_statut"<?php if (($_smarty_tpl->tpl_vars['product']->value->quantity<=0&&!$_smarty_tpl->tpl_vars['product']->value->available_later&&$_smarty_tpl->tpl_vars['allow_oosp']->value)||($_smarty_tpl->tpl_vars['product']->value->quantity>0&&!$_smarty_tpl->tpl_vars['product']->value->available_now)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?> style="display: none;"<?php }?>>
							<span id="availability_label"><?php echo smartyTranslate(array('s'=>'Availability:'),$_smarty_tpl);?>
</span>
							<span id="availability_value"<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0){?> class="warning_inline"<?php }?>>
							<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0){?><?php if ($_smarty_tpl->tpl_vars['allow_oosp']->value){?><?php echo $_smarty_tpl->tpl_vars['product']->value->available_later;?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'This product is no longer in stock'),$_smarty_tpl);?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['product']->value->available_now;?>
<?php }?>
							</span>
						</p>

						<p class="warning_inline" id="last_quantities"<?php if (($_smarty_tpl->tpl_vars['product']->value->quantity>$_smarty_tpl->tpl_vars['last_qties']->value||$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||$_smarty_tpl->tpl_vars['allow_oosp']->value||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?> style="display: none"<?php }?> ><?php echo smartyTranslate(array('s'=>'Warning: Last items in stock!'),$_smarty_tpl);?>
</p>

						<?php if ($_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>

							<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value||$_smarty_tpl->tpl_vars['priceDisplay']->value==2){?>
								<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(true,@NULL,$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
								<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(false,@NULL), null, 0);?>
							<?php }elseif($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
								<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(false,@NULL,$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
								<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(true,@NULL), null, 0);?>
							<?php }?>

							<p class="our_price_display">
							<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value>=0&&$_smarty_tpl->tpl_vars['priceDisplay']->value<=2){?>
								<span id="our_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value),$_smarty_tpl);?>
</span>
								<!--<?php if ($_smarty_tpl->tpl_vars['tax_enabled']->value&&((isset($_smarty_tpl->tpl_vars['display_tax_label']->value)&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1)||!isset($_smarty_tpl->tpl_vars['display_tax_label']->value))){?>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?><?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'tax incl.'),$_smarty_tpl);?>
<?php }?>
								<?php }?>-->
							<?php }?>
							</p>

							<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==2){?>
								<br />
								<span id="pretaxe_price"><span id="pretaxe_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->getPrice(false,@NULL)),$_smarty_tpl);?>
</span>&nbsp;<?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
</span>
							<?php }?>

						<p id="reduction_percent" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='percentage'){?> style="display:none;"<?php }?>><span id="reduction_percent_display"><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='percentage'){?>-<?php echo $_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']*100;?>
%<?php }?></span></p>

						<p id="reduction_amount" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='amount'&&intval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])==0){?> style="display:none"<?php }?>><span id="reduction_amount_display"><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='amount'&&intval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])!=0){?>-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])),$_smarty_tpl);?>
<?php }?></span></p>

						<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']){?>
							<p id="old_price"><span class="bold">
							<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value>=0&&$_smarty_tpl->tpl_vars['priceDisplay']->value<=2){?>
								<?php if ($_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value>$_smarty_tpl->tpl_vars['productPrice']->value){?>
									<span id="old_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value),$_smarty_tpl);?>
</span>
									<!-- <?php if ($_smarty_tpl->tpl_vars['tax_enabled']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1){?>
										<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?><?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'tax incl.'),$_smarty_tpl);?>
<?php }?>
									<?php }?> -->
								<?php }?>
							<?php }?>
							</span>
							</p>
						<?php }?>

						<?php if (count($_smarty_tpl->tpl_vars['packItems']->value)&&$_smarty_tpl->tpl_vars['productPrice']->value<$_smarty_tpl->tpl_vars['product']->value->getNoPackPrice()){?>
							<p class="pack_price"><?php echo smartyTranslate(array('s'=>'instead of'),$_smarty_tpl);?>
 <span style="text-decoration: line-through;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->getNoPackPrice()),$_smarty_tpl);?>
</span></p>
							<br class="clear" />
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['product']->value->ecotax!=0){?>
							<p class="price-ecotax"><?php echo smartyTranslate(array('s'=>'include'),$_smarty_tpl);?>
 <span id="ecotax_price_display"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==2){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convertAndFormatPrice'][0][0]->convertAndFormatPrice($_smarty_tpl->tpl_vars['ecotax_tax_exc']->value);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convertAndFormatPrice'][0][0]->convertAndFormatPrice($_smarty_tpl->tpl_vars['ecotax_tax_inc']->value);?>
<?php }?></span> <?php echo smartyTranslate(array('s'=>'for green tax'),$_smarty_tpl);?>

								<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']){?>
								<br /><?php echo smartyTranslate(array('s'=>'(not impacted by the discount)'),$_smarty_tpl);?>

								<?php }?>
							</p>
						<?php }?>

						<?php if (!empty($_smarty_tpl->tpl_vars['product']->value->unity)&&$_smarty_tpl->tpl_vars['product']->value->unit_price_ratio>0.000000){?>
							 <?php echo smarty_function_math(array('equation'=>"pprice / punit_price",'pprice'=>$_smarty_tpl->tpl_vars['productPrice']->value,'punit_price'=>$_smarty_tpl->tpl_vars['product']->value->unit_price_ratio,'assign'=>'unit_price'),$_smarty_tpl);?>

							<p class="unit-price"><span id="unit_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['unit_price']->value),$_smarty_tpl);?>
</span> <?php echo smartyTranslate(array('s'=>'per'),$_smarty_tpl);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->unity, 'htmlall', 'UTF-8');?>
</p>
						<?php }?>

						<?php }?>

						<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value){?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value;?>
<?php }?>

						<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value){?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value;?>
<?php }?>

					</form>
					
					
					
					
					
					
					
				</div>
			</div><!-- / .add-to-basket-form -->
		</div>
		
		<hr />
		<div class="misc-infos">
			<p class="portions"><span class="img-portions"></span> 2 <span class="colis-portions">portions</span></p>
			<p class="jours"><span class="img-jours"></span> 10 <span class="colis-jours">jours</span></p>
			<p class="cuisson"><span class="img-cuisson"></span> <span class="mode-cuisson">à griller</span></p>
		</div>
		
		<?php if (isset($_smarty_tpl->tpl_vars['product']->value->tricks)){?>
			<hr />
			<div id="trucs-et-astuces">
				<h2><span class="img-trucs-astuces"></span>Trucs et astuces des Colis du Boucher</h2>
				<div><?php echo $_smarty_tpl->tpl_vars['product']->value->tricks;?>
</div>
			</div>
		<?php }?>
		
		<?php if (isset($_smarty_tpl->tpl_vars['product']->value->breeder)){?>
			<hr />
			<div id="mot-eleveur">
				<h2><span class="img-mot-eleveur"></span>Le mot de l'éleveur</h2>
				<div><?php echo $_smarty_tpl->tpl_vars['product']->value->breeder;?>
</div>
			</div>
		<?php }?>
		
		<?php if (isset($_smarty_tpl->tpl_vars['product']->value->description_short)){?>
			<hr />
			<div id="idees-recettes">
				<h2><span class="img-idees-recettes"></span>Idées recettes</h2>
				<ul>
					<li itemscope itemtype="http://schema.org/Recipe">
						<a href="#" title="voir la recette" class="recepe-link">voir la recette</a>
						<h3 itemprop="name">Queue de Boeuf aux olives et jambon de pays</h3>
						<p class="clearfix"><span class="intitule">difficulté</span> <span class="difficulte_level difficulte_3">3/5</span></p>
						<div class="recepe-details hidden">
							<h4>Ingrédients :</h4>
							<ul class="ingredients clearfix">
								<li itemprop="ingredients">2 kg de queue de boeuf en tronçons</li>
								<li itemprop="ingredients">3 oignons</li>
								<li itemprop="ingredients">2 gousses d’ail</li>
								<li itemprop="ingredients">4 tomates</li>
								<li itemprop="ingredients">100 g de jambon de pays</li>
								<li itemprop="ingredients">50 cl de bouillon de pot-au-feu</li>
								<li itemprop="ingredients">2 cuillières à soupe d’huile d’olive</li>
								<li itemprop="ingredients">125 g d’olives noires</li>
								<li itemprop="ingredients">1 feuille de laurier</li>
								<li itemprop="ingredients">1 branche de thym</li>
								<li itemprop="ingredients">Sel, poivre</li>
							</ul>
							<h4>Recette :</h4>
							<ul class="recette">
								<li itemprop="recipeInstructions">Plongez les tomates dans une casserole d’eau bouillante pendant 1min puis épluchez-les et concassez-les grossièrement. Hachez l’ail finement après l’avoir dégermé. découpez le jambon en fines lanières puis pelez et émincez les oignons.</li>
								<li itemprop="recipeInstructions">Dans une cocotte, faites revenir les morceaux de viande et les oignions dans l’huile bien chaude. Ajoutez l’ail, les lamelles de kambon, les tomates, le laurier et le thym. Ajoutez le bouillon. Goûtez l’assaisonement si besoin.</li>
							</ul>
						</div>
						<hr class="dashed" />
					</li>
					<li itemscope itemtype="http://schema.org/Recipe">
						<a href="#" title="voir la recette" class="recepe-link">voir la recette</a>
						<h3 itemprop="name">Queue de Boeuf aux olives et jambon de pays</h3>
						<p class="clearfix"><span class="intitule">difficulté</span> <span class="difficulte_level difficulte_0">0/5</span></p>
						<div class="recepe-details hidden">
							<h4>Ingrédients :</h4>
							<ul class="ingredients clearfix">
								<li itemprop="ingredients">2 kg de queue de boeuf en tronçons</li>
								<li itemprop="ingredients">3 oignons</li>
								<li itemprop="ingredients">2 gousses d’ail</li>
								<li itemprop="ingredients">4 tomates</li>
								<li itemprop="ingredients">100 g de jambon de pays</li>
								<li itemprop="ingredients">50 cl de bouillon de pot-au-feu</li>
								<li itemprop="ingredients">2 cuillières à soupe d’huile d’olive</li>
								<li itemprop="ingredients">125 g d’olives noires</li>
								<li itemprop="ingredients">1 feuille de laurier</li>
								<li itemprop="ingredients">1 branche de thym</li>
								<li itemprop="ingredients">Sel, poivre</li>
							</ul>
							<h4>Recette :</h4>
							<ul class="recette">
								<li itemprop="recipeInstructions">Plongez les tomates dans une casserole d’eau bouillante pendant 1min puis épluchez-les et concassez-les grossièrement. Hachez l’ail finement après l’avoir dégermé. découpez le jambon en fines lanières puis pelez et émincez les oignons.</li>
								<li itemprop="recipeInstructions">Dans une cocotte, faites revenir les morceaux de viande et les oignions dans l’huile bien chaude. Ajoutez l’ail, les lamelles de kambon, les tomates, le laurier et le thym. Ajoutez le bouillon. Goûtez l’assaisonement si besoin.</li>
							</ul>
						</div>
						<hr class="dashed" />
					</li>
					<li itemscope itemtype="http://schema.org/Recipe">
						<a href="#" title="voir la recette" class="recepe-link">voir la recette</a>
						<h3 itemprop="name">Queue de Boeuf aux olives et jambon de pays</h3>
						<p class="clearfix"><span class="intitule">difficulté</span> <span class="difficulte_level difficulte_5">5/5</span></p>
						<div class="recepe-details hidden">
							<h4>Ingrédients :</h4>
							<ul class="ingredients clearfix">
								<li itemprop="ingredients">2 kg de queue de boeuf en tronçons</li>
								<li itemprop="ingredients">3 oignons</li>
								<li itemprop="ingredients">2 gousses d’ail</li>
								<li itemprop="ingredients">4 tomates</li>
								<li itemprop="ingredients">100 g de jambon de pays</li>
								<li itemprop="ingredients">50 cl de bouillon de pot-au-feu</li>
								<li itemprop="ingredients">2 cuillières à soupe d’huile d’olive</li>
								<li itemprop="ingredients">125 g d’olives noires</li>
								<li itemprop="ingredients">1 feuille de laurier</li>
								<li itemprop="ingredients">1 branche de thym</li>
								<li itemprop="ingredients">Sel, poivre</li>
							</ul>
							<h4>Recette :</h4>
							<ul class="recette">
								<li itemprop="recipeInstructions">Plongez les tomates dans une casserole d’eau bouillante pendant 1min puis épluchez-les et concassez-les grossièrement. Hachez l’ail finement après l’avoir dégermé. découpez le jambon en fines lanières puis pelez et émincez les oignons.</li>
								<li itemprop="recipeInstructions">Dans une cocotte, faites revenir les morceaux de viande et les oignions dans l’huile bien chaude. Ajoutez l’ail, les lamelles de kambon, les tomates, le laurier et le thym. Ajoutez le bouillon. Goûtez l’assaisonement si besoin.</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		<?php }?>
		
	</div>
</div>

<?php }} ?>