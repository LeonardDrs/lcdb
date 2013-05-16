<?php /* Smarty version Smarty-3.1.8, created on 2013-05-16 19:13:51
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-steps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1147320833519513cfd7dfd4-14695879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44ceda0cd03257859ae4d1525b46efb069759ae9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-steps.tpl',
      1 => 1367256021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1147320833519513cfd7dfd4-14695879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'back' => 0,
    'multi_shipping' => 0,
    'current_step' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519513cff04aa5_82172805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519513cff04aa5_82172805')) {function content_519513cff04aa5_82172805($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array("url_back", null, null); ob_start(); ?>
<?php if (isset($_smarty_tpl->tpl_vars['back']->value)&&$_smarty_tpl->tpl_vars['back']->value){?>back=<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if (!isset($_smarty_tpl->tpl_vars['multi_shipping']->value)){?>
	<?php $_smarty_tpl->tpl_vars['multi_shipping'] = new Smarty_variable('0', null, 0);?>
<?php }?>

<div id="breadcrumb-checkout">
	<ol>
		<li class="first identification <?php if ($_smarty_tpl->tpl_vars['current_step']->value=='login'){?>step_current<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['current_step']->value=='payment'||$_smarty_tpl->tpl_vars['current_step']->value=='shipping'||$_smarty_tpl->tpl_vars['current_step']->value=='address'){?>step_done<?php }else{ ?>step_todo<?php }?><?php }?>">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,(Smarty::$_smarty_vars['capture']['url_back'])."&multi-shipping=".($_smarty_tpl->tpl_vars['multi_shipping']->value));?>
">Identification</a>
			<span class="right-triangle"></span>
		</li>
		
		<li class="adresse-livraison <?php if ($_smarty_tpl->tpl_vars['current_step']->value=='address'){?>step_current<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['current_step']->value=='payment'||$_smarty_tpl->tpl_vars['current_step']->value=='shipping'){?>step_done<?php }else{ ?>step_todo<?php }?><?php }?>">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,(Smarty::$_smarty_vars['capture']['url_back'])."&step=1&multi-shipping=".($_smarty_tpl->tpl_vars['multi_shipping']->value));?>
" title="Adresse et service de livraison">Adresse de livraison</a>
			<span class="right-triangle"></span>
		</li>
		
		<li class="item-active date-livraison <?php if ($_smarty_tpl->tpl_vars['current_step']->value=='shipping'){?>step_current<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['current_step']->value=='payment'){?>step_done<?php }else{ ?>step_todo<?php }?><?php }?>">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,(Smarty::$_smarty_vars['capture']['url_back'])."&step=2&multi-shipping=".($_smarty_tpl->tpl_vars['multi_shipping']->value));?>
" title="Date de livraison">Date de livraison</a>
			<span class="right-triangle"></span>
		</li>
		
		<li class="last paiement <?php if ($_smarty_tpl->tpl_vars['current_step']->value=='payment'){?>step_current_end<?php }else{ ?>step_todo<?php }?>">
			<a href="#" title="Paiement">Paiement</a>
		</li>
	</ol>
</div><?php }} ?>