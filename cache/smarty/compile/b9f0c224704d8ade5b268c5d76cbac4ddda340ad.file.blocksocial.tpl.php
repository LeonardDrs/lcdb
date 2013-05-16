<?php /* Smarty version Smarty-3.1.8, created on 2013-05-17 01:34:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/blocksocial/blocksocial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57009179751956d1635bd55-35761418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9f0c224704d8ade5b268c5d76cbac4ddda340ad' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/blocksocial/blocksocial.tpl',
      1 => 1368369868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57009179751956d1635bd55-35761418',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'twitter_url' => 0,
    'facebook_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51956d16374a22_24758751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51956d16374a22_24758751')) {function content_51956d16374a22_24758751($_smarty_tpl) {?>
<ul class="presse-fb">
	<?php if ($_smarty_tpl->tpl_vars['twitter_url']->value!=''){?>
		<li class="presse"><a href="#" title="La presse parle de nous"><span></span>La presse parle de nous</a></li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['facebook_url']->value!=''){?>
		<li class="facebook"><a href="#" title="Aller sur notre page Facebook"><span></span>Suivez-nous sur Facebook</a></li>
	<?php }?>
</ul><?php }} ?>