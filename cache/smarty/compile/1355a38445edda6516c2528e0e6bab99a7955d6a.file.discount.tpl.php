<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 22:55:13
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/discount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1781481786519001b13994b7-36217202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1355a38445edda6516c2528e0e6bab99a7955d6a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/discount.tpl',
      1 => 1367503996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1781481786519001b13994b7-36217202',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'cart_rules' => 0,
    'nb_cart_rules' => 0,
    'discountDetail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519001b145b265_57087647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519001b145b265_57087647')) {function content_519001b145b265_57087647($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
"><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'My vouchers'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<div id="columns" class="content clearfix">
	<div id="left_column">
		<?php echo $_smarty_tpl->getSubTemplate ("./account-left-col.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- / #left_column -->
	<div id="center_column" class="reduction">
		<div class="big-bloc">
			<h1>Mes réductions</h1>
			<p>Vous trouverez ici tous vos codes de réductions.</p>
			<?php if (isset($_smarty_tpl->tpl_vars['cart_rules']->value)&&count($_smarty_tpl->tpl_vars['cart_rules']->value)&&$_smarty_tpl->tpl_vars['nb_cart_rules']->value){?>
				<div id="bloc-reduction">
					<p class="information">Vous disposez actuellement de <span class="bold"><?php echo count($_smarty_tpl->tpl_vars['cart_rules']->value);?>
 bons de réduction</span></p>
					<?php  $_smarty_tpl->tpl_vars['discountDetail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discountDetail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_rules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discountDetail']->key => $_smarty_tpl->tpl_vars['discountDetail']->value){
$_smarty_tpl->tpl_vars['discountDetail']->_loop = true;
?>
						<div>
							<p class="bold code">
								<?php echo $_smarty_tpl->tpl_vars['discountDetail']->value['code'];?>
 
								<span> ( 
									<?php if ($_smarty_tpl->tpl_vars['discountDetail']->value['id_discount_type']==1){?>
										- <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['discountDetail']->value['value'], 'htmlall', 'UTF-8');?>
%
									<?php }elseif($_smarty_tpl->tpl_vars['discountDetail']->value['id_discount_type']==2){?>
										- <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discountDetail']->value['value']),$_smarty_tpl);?>

									<?php }elseif($_smarty_tpl->tpl_vars['discountDetail']->value['id_discount_type']==3){?>
										<?php echo smartyTranslate(array('s'=>'Free shipping'),$_smarty_tpl);?>

									<?php }else{ ?>
										-
									<?php }?>
								 )</span>
							</p>
							<div>
								<p><?php echo $_smarty_tpl->tpl_vars['discountDetail']->value['name'];?>
</p>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php }else{ ?>
				<div id="bloc-reduction" class="no-code">
					<p class="bold"><span>Vous ne disposez actuellement d’aucun code de réduction.</span></p>
				</div>
			<?php }?>
			<div id="get-reduction">
				<p class="bold title">Comment obtenir des codes de réductions ?</p>
				<p>Les bons de réductions sont accordés et envoyés par E-mail par les Colis du Boucher.</p>
				<p>Il s’agit principalement de bons de réduction récompensant votre fidélité ou bien d’avoirs émis suite 
				à l’annulation d’une commandes et au remboursement d’un ou plusieurs produits.</p>
			</div>
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content --><?php }} ?>