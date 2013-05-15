<?php /* Smarty version Smarty-3.1.8, created on 2013-05-15 16:45:33
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/blockcms/blockcms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7161459651939f8d94a1e7-80378277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16cc9c83c0e34d1e955a7f48af8e9962de5c49b6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/blockcms/blockcms.tpl',
      1 => 1368369709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7161459651939f8d94a1e7-80378277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'cmslinks' => 0,
    'cmslink' => 0,
    'contact_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51939f8d9aa9f0_66498404',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51939f8d9aa9f0_66498404')) {function content_51939f8d9aa9f0_66498404($_smarty_tpl) {?>
<ul class="footer-link">
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap');?>
" title="<?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockcms'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sitemap','mod'=>'blockcms'),$_smarty_tpl);?>
</a></li>
	<?php  $_smarty_tpl->tpl_vars['cmslink'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cmslink']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cmslinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cmslink']->key => $_smarty_tpl->tpl_vars['cmslink']->value){
$_smarty_tpl->tpl_vars['cmslink']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['cmslink']->value['meta_title']!=''){?>
			.
		<?php }?>
	<?php } ?>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink($_smarty_tpl->tpl_vars['contact_url']->value,true);?>
" title="<?php echo smartyTranslate(array('s'=>'Contact us','mod'=>'blockcms'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Contact us','mod'=>'blockcms'),$_smarty_tpl);?>
</a></li>
</ul><?php }} ?>