<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 22:17:32
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/datatrans/views/templates/front/payment_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:833058821515c8e5ccbace2-85362723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1e0463abeef091a3cd6662923b3557ea8279f11' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/datatrans/views/templates/front/payment_error.tpl',
      1 => 1349719414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '833058821515c8e5ccbace2-85362723',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop_name' => 0,
    'title' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c8e5ccf9d02_81322229',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c8e5ccf9d02_81322229')) {function content_515c8e5ccf9d02_81322229($_smarty_tpl) {?>
<h3 style="margin-top: 40px; line-height: 1.4em; color:red;"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 : <?php echo smartyTranslate(array('s'=>'transaction declined','mod'=>'datatrans'),$_smarty_tpl);?>
</h3>
<p><?php echo smartyTranslate(array('s'=>'Permission was refused by the financial institution. Please choose another payment method.','mod'=>'datatrans'),$_smarty_tpl);?>
</p>
<p><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,null);?>
">&laquo; <?php echo smartyTranslate(array('s'=>'Another payment method','mod'=>'datatrans'),$_smarty_tpl);?>
</a></p><?php }} ?>