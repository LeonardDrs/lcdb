<?php /* Smarty version Smarty-3.1.8, created on 2013-04-04 01:43:59
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/administration/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1745470655515cbebf65c3b9-83121645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08987530efccb1f42a3aacd11f065356619399b8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/administration/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1361836056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1745470655515cbebf65c3b9-83121645',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'confirm' => 0,
    'location_ok' => 0,
    'location_ko' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515cbebf68a106_25334149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515cbebf68a106_25334149')) {function content_515cbebf68a106_25334149($_smarty_tpl) {?>
<a class="pointer" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')) document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ok']->value;?>
'; else document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ko']->value;?>
';">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>