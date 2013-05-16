<?php /* Smarty version Smarty-3.1.8, created on 2013-05-16 13:47:08
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/blocksocial/blocksocial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8246837715194c73c853062-37995373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '8246837715194c73c853062-37995373',
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
  'unifunc' => 'content_5194c73c875915_50163098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5194c73c875915_50163098')) {function content_5194c73c875915_50163098($_smarty_tpl) {?>
<ul class="presse-fb">
	<?php if ($_smarty_tpl->tpl_vars['twitter_url']->value!=''){?>
		<li class="presse"><a href="#" title="La presse parle de nous"><span></span>La presse parle de nous</a></li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['facebook_url']->value!=''){?>
		<li class="facebook"><a href="#" title="Aller sur notre page Facebook"><span></span>Suivez-nous sur Facebook</a></li>
	<?php }?>
</ul><?php }} ?>