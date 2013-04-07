<?php /* Smarty version Smarty-3.1.8, created on 2013-04-04 13:44:26
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blockuserinfo/blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1826558359515d679aa71ca9-27691871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62d88351962761e6af7b4fb06f95c068e5aad62c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blockuserinfo/blockuserinfo.tpl',
      1 => 1364906081,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1826558359515d679aa71ca9-27691871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515d679aaaa933_63276594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515d679aaaa933_63276594')) {function content_515d679aaaa933_63276594($_smarty_tpl) {?><div class="register-basket">
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
		<p>Panier (<span class="price">52</span> €)</p>
	</div>
</div>
<?php }} ?>