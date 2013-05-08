<?php /* Smarty version Smarty-3.1.8, created on 2013-05-02 15:32:00
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34110045451826ad0dc76e9-93322787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a470ab3adc4e75dec9a141b5849d5bbd3ea133cc' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-detail.tpl',
      1 => 1365640627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34110045451826ad0dc76e9-93322787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'currency' => 0,
    'order_history' => 0,
    'inv_adr_fields' => 0,
    'field_item' => 0,
    'address_invoice' => 0,
    'address_words' => 0,
    'word_item' => 0,
    'invoiceAddressFormatedValues' => 0,
    'dlv_adr_fields' => 0,
    'address_delivery' => 0,
    'deliveryAddressFormatedValues' => 0,
    'carrier' => 0,
    'HOOK_ORDERDETAILDISPLAYED' => 0,
    'products' => 0,
    'product' => 0,
    'productQuantity' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51826ad1142715_88480361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51826ad1142715_88480361')) {function content_51826ad1142715_88480361($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.replace.php';
?>

<div id="commande-detail">
	
	<h3>Détail de la commande <?php echo $_smarty_tpl->tpl_vars['order']->value->reference;?>
 - Passée le <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>0),$_smarty_tpl);?>
</h3>
	
	<h4>1. Facture et livraison</h4>
	<hr />
	<h5>Montant total</h5>
	<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</p>
	
	<table id="facture-detail-table">
		<tbody>
			<tr class="first">
				<td class="first">
					<h5>Mode de paiment</h5>
					<p><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->payment, 'htmlall', 'UTF-8');?>
</p>
				</td>
				<td>
					<h5>Etat du paiment</h5>
					<p><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order_history']->value[0]['ostate_name'], 'htmlall', 'UTF-8');?>
</p>
				</td>
			</tr>
			<tr>
				<td class="first">
					<h5>Adresse de facturation</h5>
					<ul>
						<?php  $_smarty_tpl->tpl_vars['field_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inv_adr_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_item']->key => $_smarty_tpl->tpl_vars['field_item']->value){
$_smarty_tpl->tpl_vars['field_item']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['field_item']->value=="company"&&isset($_smarty_tpl->tpl_vars['address_invoice']->value->company)){?>
								<li class="address_company">
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address_invoice']->value->company, 'htmlall', 'UTF-8');?>

								</li>
							<?php }elseif($_smarty_tpl->tpl_vars['field_item']->value=="address2"&&$_smarty_tpl->tpl_vars['address_invoice']->value->address2){?>
								<li class="address_address2">
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address_invoice']->value->address2, 'htmlall', 'UTF-8');?>

								</li>
							<?php }elseif($_smarty_tpl->tpl_vars['field_item']->value=="phone_mobile"&&$_smarty_tpl->tpl_vars['address_invoice']->value->phone_mobile){?>
								<li class="address_phone_mobile">
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address_invoice']->value->phone_mobile, 'htmlall', 'UTF-8');?>

								</li>
							<?php }else{ ?>
								<?php $_smarty_tpl->tpl_vars['address_words'] = new Smarty_variable(explode(" ",$_smarty_tpl->tpl_vars['field_item']->value), null, 0);?>
								<li>
									<?php  $_smarty_tpl->tpl_vars['word_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['word_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['address_words']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['word_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['word_item']->key => $_smarty_tpl->tpl_vars['word_item']->value){
$_smarty_tpl->tpl_vars['word_item']->_loop = true;
 $_smarty_tpl->tpl_vars['word_item']->index++;
 $_smarty_tpl->tpl_vars['word_item']->first = $_smarty_tpl->tpl_vars['word_item']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["word_loop"]['first'] = $_smarty_tpl->tpl_vars['word_item']->first;
?>
										<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['word_loop']['first']){?> <?php }?>
										<span class="address_<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['word_item']->value,',','');?>
">
												<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['invoiceAddressFormatedValues']->value[smarty_modifier_replace($_smarty_tpl->tpl_vars['word_item']->value,',','')], 'htmlall', 'UTF-8');?>

										</span>
									<?php } ?>
								</li>
							<?php }?>

						<?php } ?>
					</ul>
				</td>
				<td>
					<h5>Adresse de livraison</h5>
					<ul>
						<?php  $_smarty_tpl->tpl_vars['field_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dlv_adr_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_item']->key => $_smarty_tpl->tpl_vars['field_item']->value){
$_smarty_tpl->tpl_vars['field_item']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['field_item']->value=="company"&&isset($_smarty_tpl->tpl_vars['address_delivery']->value->company)){?>
								<li class="address_company">
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address_delivery']->value->company, 'htmlall', 'UTF-8');?>

								</li>
							<?php }elseif($_smarty_tpl->tpl_vars['field_item']->value=="address2"&&$_smarty_tpl->tpl_vars['address_delivery']->value->address2){?>
								<li class="address_address2">
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address_delivery']->value->address2, 'htmlall', 'UTF-8');?>

								</li>
							<?php }elseif($_smarty_tpl->tpl_vars['field_item']->value=="phone_mobile"&&$_smarty_tpl->tpl_vars['address_delivery']->value->phone_mobile){?>
								<li class="address_phone_mobile">
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address_delivery']->value->phone_mobile, 'htmlall', 'UTF-8');?>

								</li>
							<?php }else{ ?>
								<?php $_smarty_tpl->tpl_vars['address_words'] = new Smarty_variable(explode(" ",$_smarty_tpl->tpl_vars['field_item']->value), null, 0);?> 
								<li>
									<?php  $_smarty_tpl->tpl_vars['word_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['word_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['address_words']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['word_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['word_item']->key => $_smarty_tpl->tpl_vars['word_item']->value){
$_smarty_tpl->tpl_vars['word_item']->_loop = true;
 $_smarty_tpl->tpl_vars['word_item']->index++;
 $_smarty_tpl->tpl_vars['word_item']->first = $_smarty_tpl->tpl_vars['word_item']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["word_loop"]['first'] = $_smarty_tpl->tpl_vars['word_item']->first;
?>
										<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['word_loop']['first']){?> <?php }?>
										<span class="address_<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['word_item']->value,',','');?>
">
												<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['deliveryAddressFormatedValues']->value[smarty_modifier_replace($_smarty_tpl->tpl_vars['word_item']->value,',','')], 'htmlall', 'UTF-8');?>

										</span>
									<?php } ?>
								</li>
							<?php }?>
						<?php } ?>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
	
	<h5>Date de livraison</h5>
	<p>Vendredi 1er mars 2013<br />Entre 20h30 et 21h30 ou encore 17h et 20h30</p>
	<hr />
	<h5>Mode et frais de livraison</h5>
	<?php if ($_smarty_tpl->tpl_vars['carrier']->value->id){?>
		<p><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['carrier']->value->name, 'htmlall', 'UTF-8');?>
 - 20 €</p>
	<?php }?>
	<hr />
	
	<?php echo $_smarty_tpl->tpl_vars['HOOK_ORDERDETAILDISPLAYED']->value;?>

	
	<h4 class="detail-title">2. Détails de la commande</h4>
	<hr />
	<table id="detail-commande-table">
		<thead>
			<tr>
				<th class="first"></th>
				<th>Prix<br/> unitaire</th>
				<th class="qte">Qté</th>
				<th class="last">Prix<br/> total TTC</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
				<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['deleted'])){?>
					<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_id'], null, 0);?>
					<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_attribute_id'], null, 0);?>
					<?php $_smarty_tpl->tpl_vars['productQuantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_quantity'], null, 0);?>
					<tr class="first">
						<td class="label-rouge first"> <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['product_name'], 'htmlall', 'UTF-8');?>
</td>
						<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
						<td><?php echo intval($_smarty_tpl->tpl_vars['productQuantity']->value);?>
</td>
						<td class="last"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
					</tr>
				<?php }?>
			<?php } ?>
		</tbody>
	</table>
	
	<div id="total">
		<p class="clearfix"><span class="title bold">Total panier TTC :</span><span class="value bold green"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->getTotalProductsWithTaxes(),'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span></p>
		<p class="clearfix"><span class="title">Frais de livraison :</span><span class="value green"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_shipping,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span></p>
		<p class="clearfix"><span class="title">Option colis cadeau :</span><span class="value green">0,00 €</span></p>
		<p class="clearfix total"><span class="title bold">Sous-total TTC :</span><span class="value bold green"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span></p>
	</div>
	
</div>
<?php }} ?>