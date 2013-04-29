<?php /* Smarty version Smarty-3.1.8, created on 2013-04-17 17:05:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/product-surprise.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1712673639516eba4655bca9-45226730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03a8dded00049f1e03942fe6c70a574e0828c514' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/product-surprise.tpl',
      1 => 1366046086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1712673639516eba4655bca9-45226730',
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
    'HOOK_PRODUCT_ACTIONS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_516eba4672a339_81110862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_516eba4672a339_81110862')) {function content_516eba4672a339_81110862($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
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
	
	<div class="price-infos" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/lcdb_theme/img/img_solo/colis-surprise.png" title="colis surprise"/>
		
		<?php if ($_smarty_tpl->tpl_vars['product']->value->description_short!=null){?>	
			<p class="colis-surprise-description"><?php echo $_smarty_tpl->tpl_vars['product']->value->description_short;?>
</p>
		<?php }?>
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
					<span class="price" itemprop="price" id="our_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value),$_smarty_tpl);?>
</span>
				<?php }?>
			</div>
		</div>
		
	</div><!-- / .price-infos -->
	
	<div class="add-to-basket-form">
		<form class="form-panier clearfix" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart');?>
" method="post">
			<!-- hidden -->
			<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
" />
			<input type="hidden" name="id_product" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value->id);?>
" id="product_page_product_id" />
			<input type="hidden" name="add" value="1" />
			<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
			<!-- select -->
			<select>
				<option>Label Rouge et Bio</option>
			</select>
			<button type="button" name="minus" class="moreless minus">-</button>
			<input  id="quantity_wanted" class="quantity" type="text" maxlength="2" value="0" name="quantity" disabled>
			<button type="button" name="plus" class="moreless plus">+</button>
			<!-- button -->
			<button type="submit" name="submit" class="ajout-panier">ajouter au panier</button>
		</form>
	</div><!-- / .add-to-basket-form -->
	
	<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value){?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value;?>
<?php }?>
	
	<div class="misc-infos">
		<p class="portions"><span class="img-portions"></span> 10 à 12 <span class="colis-portions">portions</span></p>
		<p class="jours"><span class="img-jours"></span> 7 à 14 <span class="colis-jours">jours</span></p>
	</div>
	<hr />
	<?php if ($_smarty_tpl->tpl_vars['product']->value->description!=null){?>	
		<div class="colis-description"><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</div>
	<?php }?>
	<hr />
	<div class="colis-exemples">
		<p class="green-title">Quelques exemples de colis surprise</p>
		<ul>
			<li>Côte de Bœuf (Label Rouge - 1,2 kg) et Brochettes de Porc (Bio-1 kg)<hr/></li>
			<li>Côte de Bœuf (Label Rouge - 1,2 kg) et Brochettes de Porc (Bio-1 kg)<hr/></li>
			<li>Côte de Bœuf (Label Rouge - 1,2 kg) et Brochettes de Porc (Bio-1 kg)</li>
		</ul>
	</div>
	<hr />
	<p class="surprise-additional">Chaque semaine, une nouvelle surprise vous attends dans votre colis</p>
</div><!-- / .colis -->
<?php }} ?>