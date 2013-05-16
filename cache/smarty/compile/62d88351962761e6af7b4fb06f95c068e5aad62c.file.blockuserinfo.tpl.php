<?php /* Smarty version Smarty-3.1.8, created on 2013-05-16 13:47:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blockuserinfo/blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12684143235194c73b559be7-50434990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62d88351962761e6af7b4fb06f95c068e5aad62c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blockuserinfo/blockuserinfo.tpl',
      1 => 1367503169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12684143235194c73b559be7-50434990',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
    'base_dir' => 0,
    'cart_qties' => 0,
    'priceDisplay' => 0,
    'blockuser_cart_flag' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5194c73b644579_99019956',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5194c73b644579_99019956')) {function content_5194c73b644579_99019956($_smarty_tpl) {?><div class="register-basket clearfix">
	<div class="user-block">
		<div id="connection-register">
			<?php if (!$_smarty_tpl->tpl_vars['logged']->value){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="se connecter">Connexion</a> / <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentification',true);?>
" title="s'inscrire">Inscription</a>
			<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="mon compte">Mon compte</a> /
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
?logout" title="mon compte">Déconnexion</a>
			<?php }?>
		</div>
		<div id="basket">
			<span class="illustration"></span>
			<p><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
">Panier (
				<span class="price ajax_cart_total<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?><?php }?>">
					<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?>
						<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
							<?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

						<?php }?>
					<?php }else{ ?>
						vide
					<?php }?>
				</span>
			)</a></p>
		</div>
	</div>
</div>
<?php }} ?>