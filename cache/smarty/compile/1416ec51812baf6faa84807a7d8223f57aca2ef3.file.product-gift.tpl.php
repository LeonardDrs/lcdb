<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 18:47:41
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/product-gift.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77375529517ea42d098e70-93501169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1416ec51812baf6faa84807a7d8223f57aca2ef3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/product-gift.tpl',
      1 => 1366044628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77375529517ea42d098e70-93501169',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'confirmation' => 0,
    'adminActionDisplay' => 0,
    'base_dir' => 0,
    'priceDisplay' => 0,
    'priceDisplayPrecision' => 0,
    'productPrice' => 0,
    'link' => 0,
    'static_token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517ea42d23f092_44710487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517ea42d23f092_44710487')) {function content_517ea42d23f092_44710487($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<div class="big-bloc colis" itemscope itemtype="http://schema.org/Product">
	<div class="content-title">
		<h1 itemprop="name"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h1>
		<?php if ($_smarty_tpl->tpl_vars['product']->value->breeder!=null){?>	
			<p><?php echo $_smarty_tpl->tpl_vars['product']->value->breeder;?>
</p>
		<?php }?>
	</div>
	
	<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value){?>
		<p class="confirmation"><?php echo $_smarty_tpl->tpl_vars['confirmation']->value;?>
</p>
	<?php }?>
	
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
	<hr />
	<div class="price-infos" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/lcdb_theme/img/img_solo/colis-cadeau.png" title="colis cadeau"/>
		<div class="add-to-basket-form">
			<div class="price-details">
				
				<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value||$_smarty_tpl->tpl_vars['priceDisplay']->value==2){?>
					<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(true,@NULL,$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(false,@NULL), null, 0);?>
				<?php }elseif($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
					<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(false,@NULL,$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(true,@NULL), null, 0);?>
				<?php }?>
				
				<div class="detailed-price">
					<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value>=0&&$_smarty_tpl->tpl_vars['priceDisplay']->value<=2){?>
						<span id="our_price_display" class="price" itemprop="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value),$_smarty_tpl);?>
</span>
					<?php }?>
				</div>
			</div>
			
			<form class="form-panier clearfix" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart');?>
" method="post">
				<!-- input hidden -->
				<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
" />
				<input type="hidden" name="id_product" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value->id);?>
" id="product_page_product_id" />
				<input type="hidden" name="add" value="1" />
				<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
				<!-- select -->
				<button type="button" name="minus" class="moreless minus">-</button>
				<input class="quantity" type="text" maxlength="2" value="0" name="qty" id="quantity_wanted" disabled>
				<button type="button" name="plus" class="moreless plus">+</button>
				<!-- button -->
				<button type="submit" name="submit" class="ajout-panier">ajouter au panier</button>
			</form>
		</div><!-- / .add-to-basket-form -->
	</div><!-- / .price-infos -->
	<hr />
	<div class="misc-infos">
		<p class="portions"><span class="img-portions"></span> 10 à 12 <span class="colis-portions">portions</span></p>
		<p class="jours"><span class="img-jours"></span> 7 à 14 <span class="colis-jours">jours</span></p>
	</div>
	<div class="colis-composition">
		<p class="green-title">La composition du colis pré-composé du mois</p>
		<p itemprop="description">Côte de Bœuf (Label Rouge - 1,2 kg) et Brochettes de Porc (Bio - 1 kg)</p>
	</div>
</div><!-- / .colis -->
<?php }} ?>