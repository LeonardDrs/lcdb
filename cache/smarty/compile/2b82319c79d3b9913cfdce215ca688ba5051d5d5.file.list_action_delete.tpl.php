<?php /* Smarty version Smarty-3.1.8, created on 2013-04-04 12:50:44
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/administration/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:999642944515d5b04415525-16653728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b82319c79d3b9913cfdce215ca688ba5051d5d5' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/administration/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1361836056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '999642944515d5b04415525-16653728',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515d5b044464e0_07643760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515d5b044464e0_07643760')) {function content_515d5b044464e0_07643760($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>