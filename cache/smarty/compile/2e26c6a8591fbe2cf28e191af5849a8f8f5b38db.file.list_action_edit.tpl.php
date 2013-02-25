<?php /* Smarty version Smarty-3.1.8, created on 2013-02-25 18:01:58
         compiled from "/Applications/MAMP/htdocs/Git/lcdb__/administration/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1875242416512b99062ec992-54388472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e26c6a8591fbe2cf28e191af5849a8f8f5b38db' => 
    array (
      0 => '/Applications/MAMP/htdocs/Git/lcdb__/administration/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1356963556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1875242416512b99062ec992-54388472',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_512b99062f7959_17722314',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512b99062f7959_17722314')) {function content_512b99062f7959_17722314($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>