<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 22:15:32
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blockuserinfo/blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1013740542517ed4e4e399a6-28400192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62d88351962761e6af7b4fb06f95c068e5aad62c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blockuserinfo/blockuserinfo.tpl',
      1 => 1366309763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1013740542517ed4e4e399a6-28400192',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
    'cart_qties' => 0,
    'priceDisplay' => 0,
    'blockuser_cart_flag' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517ed4e4edd5e3_30632478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517ed4e4edd5e3_30632478')) {function content_517ed4e4edd5e3_30632478($_smarty_tpl) {?><div class="register-basket">
	<div id="connection-register">
		<?php if (!$_smarty_tpl->tpl_vars['logged']->value){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="se connecter">Connexion</a> / <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentification',true);?>
" title="s'inscrire">Inscription</a>
		<?php }else{ ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="mon compte">Mon compte</a>
		<?php }?>
	</div>
	<div id="basket">
		<span class="illustration"></span>
		<p>Panier (
			<span class="price ajax_cart_total<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?><?php }?>">
				<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?>
					<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
						<?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

					<?php }else{ ?>
						<?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

					<?php }?>
				<?php }?>
			</span>
		)</p>
	</div>
</div>
<?php }} ?>