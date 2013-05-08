<?php /* Smarty version Smarty-3.1.8, created on 2013-05-02 15:30:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213832388851826a7560c7e9-58049414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdff5d1897e1291d00f05dececc5c432dcf727bc' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-payment.tpl',
      1 => 1367501381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213832388851826a7560c7e9-58049414',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'products' => 0,
    'product' => 0,
    'use_taxes' => 0,
    'priceDisplay' => 0,
    'display_tax_label' => 0,
    'total_products' => 0,
    'total_products_wt' => 0,
    'total_discounts' => 0,
    'total_discounts_tax_exc' => 0,
    'total_wrapping' => 0,
    'total_wrapping_tax_exc' => 0,
    'total_shipping_tax_exc' => 0,
    'virtualCart' => 0,
    'shippingCost' => 0,
    'shippingCostTaxExc' => 0,
    'voucherAllowed' => 0,
    'errors_discount' => 0,
    'error' => 0,
    'total_price' => 0,
    'opc' => 0,
    'link' => 0,
    'discount_name' => 0,
    'displayVouchers' => 0,
    'voucher' => 0,
    'total_price_without_tax' => 0,
    'discounts' => 0,
    'discount' => 0,
    'HOOK_PAYMENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51826a75ae2189_16763263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51826a75ae2189_16763263')) {function content_51826a75ae2189_16763263($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?><script type="text/javascript">
// <![CDATA[
var currencySign = '<?php echo html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8");?>
';
var currencyRate = '<?php echo floatval($_smarty_tpl->tpl_vars['currencyRate']->value);?>
';
var currencyFormat = '<?php echo intval($_smarty_tpl->tpl_vars['currencyFormat']->value);?>
';
var currencyBlank = '<?php echo intval($_smarty_tpl->tpl_vars['currencyBlank']->value);?>
';
var txtProduct = "<?php echo smartyTranslate(array('s'=>'product','js'=>1),$_smarty_tpl);?>
";
var txtProducts = "<?php echo smartyTranslate(array('s'=>'products','js'=>1),$_smarty_tpl);?>
";
// ]]>
</script>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Your payment method'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<div id="columns" class="content clearfix">
	<div class="bloc-checkout">
		<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, 0);?>
		<?php echo $_smarty_tpl->getSubTemplate ("./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="content-payment">
			<div class="bloc">
				<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<h2>Récapitulatif de votre commande</h2>
				<div id="address">
					<div>
						<h3>Adresse de facturation</h3>
						<a href="#" title="modifier">modifier</a>
						<p>Pierre Durand</p>
						<p>3 rue du chène</p>
						<p>Bat. A, appt 34, code: 7899</p>
						<p>69000 Lyon</p>
						<p>0148354756</p>
					</div>
					<div>
						<h3>Adresse de livraison</h3>
						<a href="#" title="modifier">modifier</a>
						<p>Pierre Durand</p>
						<p>3 rue du chène</p>
						<p>Bat. A, appt 34, code: 7899</p>
						<p>69000 Lyon</p>
						<p>0148354756</p>
					</div>
				</div>
				<div id="delivery-date">
					<h3>Date de livraison</h3>
					<a href="#" title="modifier">modifier</a>
					<p>Jeudi 17 janvier 2013</p>
					<p>Entre 20h30 et 21h30 ou entre 17h30 et 20h30</p>
				</div>
				<div id="mode-delivery">
					<h3>Mode de livraison</h3>
					<p>Transport en colis réfrigiré (offert)</p>
				</div>
				<div id="bloc-basket">
					<h3>Panier</h3>
					<a href="#" title="modifier">modifier</a>
					<div id="recap-basket">
						<div id="basket-head">
							<div><p>Prix unitaire</p></div>
							<div><p>Qté</p></div>
							<div><p>Prix<span>total TTC</span></p></div>
						</div>
						<div id="basket-content" class="scrollbar">
							<table>
								<tbody>
									<tr class="row">
										<td class="label-rouge label">Pavé (Rumsteak Olgache) 180gr</td>
										<td>9 €</td>
										<td>10</td>
										<td>90 €</td>
									</tr>
									<tr class="row">
										<td class="label-bio label">Gite (Idéal en Tartare ou Haché) -5 % Mat. Grasse</td>
										<td>9 €</td>
										<td>3</td>
										<td>27 €</td>
									</tr>
									<tr class="row">
										<td>Filet mignon de Boeuf</td>
										<td>15 €</td>
										<td>2</td>
										<td>30 €</td>
									</tr>
									<tr class="row">
										<td class="label-rouge label">Gite (Idéal en Tartare ou Haché) -5% Mat. Grasse</td>
										<td>9 €</td>
										<td>1</td>
										<td>1 €</td>
									</tr>
									<tr class="row">
										<td class="label-rouge label">Gite (Idéal en Tartare ou Haché) -5% Mat. Grasse</td>
										<td>9 €</td>
										<td>3</td>
										<td>27 €</td>
									</tr>
									<tr class="row">
										<td class="label-rouge label">Pavé (Rumsteak Olgache) 180gr</td>
										<td>9 €</td>
										<td>10</td>
										<td>100 €</td>
									</tr>
								</tbody>
								<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
?>
									<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, 0);?>
									<?php $_smarty_tpl->tpl_vars['cannotModify'] = new Smarty_variable(1, null, 0);?>
									<?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->iteration%2, null, 0);?>
									<?php $_smarty_tpl->tpl_vars['noDeleteButton'] = new Smarty_variable(1, null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./shopping-cart-product-line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php } ?>
							</table>
						</div>
						<div id="total-basket">
							<p><span class="bold">Total panier TTC: </span><span class="bold">237,50€</span></p>
							<p><span>Frais de livraison: </span><span>0,00€</span></p>
							<p><span>Option colis cadeau: </span><span>0,00€</span></p>
							<p><span class="bold">Sous-total TTC: </span><span class="bold">237,50€</span></p>
						</div>
						
						<tfoot>
							<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value){?>
								<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value){?>
									<tr class="cart_total_price">
										<td colspan="5"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total products (tax excl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total products:'),$_smarty_tpl);?>
<?php }?></td>
										<td class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products']->value),$_smarty_tpl);?>
</td>
									</tr>
								<?php }else{ ?>
									<tr class="cart_total_price">
										<td colspan="5"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total products (tax incl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total products:'),$_smarty_tpl);?>
<?php }?></td>
										<td class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products_wt']->value),$_smarty_tpl);?>
</td>
									</tr>
								<?php }?>
							<?php }else{ ?>
								<tr class="cart_total_price">
									<td colspan="5"><?php echo smartyTranslate(array('s'=>'Total products:'),$_smarty_tpl);?>
</td>
									<td class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products']->value),$_smarty_tpl);?>
</td>
								</tr>
							<?php }?>
							<tr class="cart_total_voucher" <?php if ($_smarty_tpl->tpl_vars['total_discounts']->value==0){?>style="display: none;"<?php }?>>
								<td colspan="5">
								<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value){?>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value){?>
										<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total vouchers (tax excl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total vouchers:'),$_smarty_tpl);?>
<?php }?>
									<?php }else{ ?>
										<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total vouchers (tax incl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total vouchers:'),$_smarty_tpl);?>
<?php }?>
									<?php }?>
								<?php }else{ ?>
									<?php echo smartyTranslate(array('s'=>'Total vouchers:'),$_smarty_tpl);?>

								<?php }?>
								</td>
								<td class="price-discount price" id="total_discount">
								<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value){?>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value){?>
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_discounts_tax_exc']->value),$_smarty_tpl);?>

									<?php }else{ ?>
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_discounts']->value),$_smarty_tpl);?>

									<?php }?>
								<?php }else{ ?>
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_discounts_tax_exc']->value),$_smarty_tpl);?>

								<?php }?>
								</td>
							</tr>
							<tr class="cart_total_voucher" <?php if ($_smarty_tpl->tpl_vars['total_wrapping']->value==0){?>style="display: none;"<?php }?>>
								<td colspan="5">
								<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value){?>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value){?>
										<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total gift-wrapping (tax excl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total gift-wrapping:'),$_smarty_tpl);?>
<?php }?>
									<?php }else{ ?>
										<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total gift-wrapping (tax incl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total gift-wrapping:'),$_smarty_tpl);?>
<?php }?>
									<?php }?>
								<?php }else{ ?>
									<?php echo smartyTranslate(array('s'=>'Total gift-wrapping:'),$_smarty_tpl);?>

								<?php }?>
								</td>
								<td class="price-discount price" id="total_wrapping">
								<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value){?>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value){?>
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

									<?php }else{ ?>
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping']->value),$_smarty_tpl);?>

									<?php }?>
								<?php }else{ ?>
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

								<?php }?>
								</td>
							</tr>

							<?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0&&!isset($_smarty_tpl->tpl_vars['virtualCart']->value)){?>
								<tr class="cart_total_delivery">
									<td colspan="5"><?php echo smartyTranslate(array('s'=>'Shipping:'),$_smarty_tpl);?>
</td>
									<td class="price" id="total_shipping"><?php echo smartyTranslate(array('s'=>'Free Shipping!'),$_smarty_tpl);?>
</td>
								</tr>
							<?php }else{ ?>
								<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value){?>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value){?>
										<tr class="cart_total_delivery" <?php if ($_smarty_tpl->tpl_vars['shippingCost']->value<=0){?> style="display:none;"<?php }?>>
											<td colspan="5"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total shipping (tax excl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total shipping:'),$_smarty_tpl);?>
<?php }?></td>
											<td class="price" id="total_shipping"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['shippingCostTaxExc']->value),$_smarty_tpl);?>
</td>
										</tr>
									<?php }else{ ?>
										<tr class="cart_total_delivery"<?php if ($_smarty_tpl->tpl_vars['shippingCost']->value<=0){?> style="display:none;"<?php }?>>
											<td colspan="5"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value){?><?php echo smartyTranslate(array('s'=>'Total shipping (tax incl.):'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Total shipping:'),$_smarty_tpl);?>
<?php }?></td>
											<td class="price" id="total_shipping" ><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['shippingCost']->value),$_smarty_tpl);?>
</td>
										</tr>
									<?php }?>
								<?php }else{ ?>
									<tr class="cart_total_delivery"<?php if ($_smarty_tpl->tpl_vars['shippingCost']->value<=0){?> style="display:none;"<?php }?>>
										<td colspan="5"><?php echo smartyTranslate(array('s'=>'Total shipping:'),$_smarty_tpl);?>
</td>
										<td class="price" id="total_shipping" ><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['shippingCostTaxExc']->value),$_smarty_tpl);?>
</td>
									</tr>
								<?php }?>
							<?php }?>

							<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value){?>
							<tr class="cart_total_price">
								<td colspan="5" id="cart_voucher" class="cart_voucher">
								<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value){?>
									<?php if (isset($_smarty_tpl->tpl_vars['errors_discount']->value)&&$_smarty_tpl->tpl_vars['errors_discount']->value){?>
										<ul class="error">
										<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
											<li><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['error']->value, 'htmlall', 'UTF-8');?>
</li>
										<?php } ?>
										</ul>
									<?php }?>
								<?php }?>
								</td>
								<td colspan="2" class="price total_price_container" id="total_price_container">
									<p><?php echo smartyTranslate(array('s'=>'Total:'),$_smarty_tpl);?>
</p>
									<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price']->value),$_smarty_tpl);?>
</span>
								</td>
							</tr>
							<?php }else{ ?>
							<tr class="cart_total_price">
								<td colspan="5" id="cart_voucher" class="cart_voucher">
								<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value){?>
								<div id="cart_voucher" class="table_block">
									<?php if (isset($_smarty_tpl->tpl_vars['errors_discount']->value)&&$_smarty_tpl->tpl_vars['errors_discount']->value){?>
										<ul class="error">
										<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
											<li><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['error']->value, 'htmlall', 'UTF-8');?>
</li>
										<?php } ?>
										</ul>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value){?>
									<form action="<?php if ($_smarty_tpl->tpl_vars['opc']->value){?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>" method="post" id="voucher">
										<fieldset>
											<p class="title_block"><label for="discount_name"><?php echo smartyTranslate(array('s'=>'Vouchers'),$_smarty_tpl);?>
</label></p>
											<p>
												<input type="text" id="discount_name" name="discount_name" value="<?php if (isset($_smarty_tpl->tpl_vars['discount_name']->value)&&$_smarty_tpl->tpl_vars['discount_name']->value){?><?php echo $_smarty_tpl->tpl_vars['discount_name']->value;?>
<?php }?>" />
											</p>
											<p class="submit"><input type="hidden" name="submitDiscount" /><input type="submit" name="submitAddDiscount" value="<?php echo smartyTranslate(array('s'=>'ok'),$_smarty_tpl);?>
" class="button" /></p>
										<?php if ($_smarty_tpl->tpl_vars['displayVouchers']->value){?>
											<p id="title" class="title_offers"><?php echo smartyTranslate(array('s'=>'Take advantage of our offers:'),$_smarty_tpl);?>
</p>
											<div id="display_cart_vouchers">
											<?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['displayVouchers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value){
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
												<span onclick="$('#discount_name').val('<?php echo $_smarty_tpl->tpl_vars['voucher']->value['name'];?>
');return false;" class="voucher_name"><?php echo $_smarty_tpl->tpl_vars['voucher']->value['name'];?>
</span> - <?php echo $_smarty_tpl->tpl_vars['voucher']->value['description'];?>
 <br />
											<?php } ?>
											</div>
										<?php }?>
										</fieldset>
									</form>
									<?php }?>
								</div>
								<?php }?>
								</td>
								<td colspan="2" class="price total_price_container" id="total_price_container">
									<p><?php echo smartyTranslate(array('s'=>'Total:'),$_smarty_tpl);?>
</p>
									<span id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_without_tax']->value),$_smarty_tpl);?>
</span>
								</td>
							</tr>
							<?php }?>
						</tfoot>
						
						
					</div>
				</div>
				<div class="action">
					<a href="#" title="Continuer mes achats" class="bold"><span>&rarr;</span> Continuer mes achats</a>
				</div>
			</div>
			<div class="bloc">
				<div id="bloc-reduction">
					<h2>Vos réductions</h2>
					<form method="get" name="form-reduc" id="form-reduc">
						<label for="reduction">Code de réduction : </label>
						<input type="text" id="reduction" name="reduction"/>
						<button name="submit" type="submit">OK</button>
					</form>
					<div id="bloc-code">
						<p>Vous disposez actuellement de 2 codes de réduction :</p>
						<form method="get">
							<input type="hidden" name="code" value="KDSSQ8HU"/>
							<span><label><span class="code bold">KDSSQ8HU</span> <span class="amount bold">(-8,56€)</span></label></span> 
							<button type="submit" name="submit">utilisez ce code</button>
						</form>
						<form method="get">
							<input type="hidden" name="code" value="LDSJI8HU"/>
							<span><label><span class="code bold">LDSJI8HU</span> <span class="amount bold">(-8,00€)</span></label></span> 
							<button type="submit" name="submit">utilisez ce code</button>
						</form>
					</div>
				</div>
				
				<?php if (count($_smarty_tpl->tpl_vars['discounts']->value)){?>
					<tbody>
					<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['discount']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['discount']->iteration=0;
 $_smarty_tpl->tpl_vars['discount']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value){
$_smarty_tpl->tpl_vars['discount']->_loop = true;
 $_smarty_tpl->tpl_vars['discount']->iteration++;
 $_smarty_tpl->tpl_vars['discount']->index++;
 $_smarty_tpl->tpl_vars['discount']->first = $_smarty_tpl->tpl_vars['discount']->index === 0;
 $_smarty_tpl->tpl_vars['discount']->last = $_smarty_tpl->tpl_vars['discount']->iteration === $_smarty_tpl->tpl_vars['discount']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['discountLoop']['first'] = $_smarty_tpl->tpl_vars['discount']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['discountLoop']['last'] = $_smarty_tpl->tpl_vars['discount']->last;
?>
						<tr class="cart_discount <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['discountLoop']['last']){?>last_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['discountLoop']['first']){?>first_item<?php }else{ ?>item<?php }?>" id="cart_discount_<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
">
							<td class="cart_discount_name" colspan="2"><?php echo $_smarty_tpl->tpl_vars['discount']->value['name'];?>
</td>
							<td class="cart_discount_description" colspan="3"><?php echo $_smarty_tpl->tpl_vars['discount']->value['description'];?>
</td>
							<td class="cart_discount_price">
								<span class="price-discount">
									<?php if ($_smarty_tpl->tpl_vars['discount']->value['value_real']>0){?>
										<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value){?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>

										<?php }else{ ?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>

										<?php }?>
									<?php }?>
								</span>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				<?php }?>
					
			</div>
			<div id="total">
				<p class="bold">Total TTC de votre commande: <span>237,50€</span></p>
			</div>
			<form id="form-payment" name="form-payment" method="get">
				<div class="bloc">
					<?php if ($_smarty_tpl->tpl_vars['HOOK_PAYMENT']->value){?>
						<div id="payment-means">
							<h2>Moyen de paiement</h2>
							<!-- <div id="credit-card">
								<label class="radio" for="cb">
									<input type="radio" id="cb" name="payment" value="carte-credit"/> Carte Bancaire
								</label>
								<p>Lorsque vous achetez sur lescolisduboucher.com, votre paiement
								est entièrement sécurisé via le protocole de cryptage de données SSL 3.</p>
							</div>
							<div id="paypal">
								<label class="radio" for="acc-paypal">
									<input type="radio" id="acc-paypal" name="payment" value="paypal"/> Paypal
								</label>
								<p>Paiement en ligne sécurisé à l'aide du système Paypal en protocol SSL.<p>
								<p>Paypal étant un outil de paiement payant, <span class="bold">un surcoût de 3%</span>
								du montant total de votre commande sera ajouté pour l'utilisation de ce mode de paiement.
								Le montant final que vous aurez alors à payer sur Paypal sera donc de 
								<span id="total-paypal" class="bold">244,63€</span>.</p>
								<p>Nous vous remercions par avance de votre compréhension</p>
							</div>
							<div id="check-transfert">
								<label class="radio" for="check-transfer">
									<input type="radio" id="check-transfer" name="payment" value="cheque-especes"/> Chèque ou espèces
								</label>
								<p>Paiement à la réception de votre colis</p>
							</div> -->
							<?php echo $_smarty_tpl->tpl_vars['HOOK_PAYMENT']->value;?>

						</div>
					<?php }else{ ?>
						<p class="warning"><?php echo smartyTranslate(array('s'=>'No payment modules have been installed.'),$_smarty_tpl);?>
</p>
					<?php }?>
				</div>
				<div class="bloc">
					<div id="payment-message">
						<p>Si vous le souhaitez, vous pouvez joindre un message à votre commande,
						à l'attention des Colis du Boucher :</p>
						<textarea name="message" ></textarea>
					</div>
					<div class="action">
						<button class="red-button gradient" name="submit" type="submit">Valider et payer ma commande</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php }} ?>