<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 22:55:13
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/account-left-col.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1573847755519001b1462740-11547018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f89deb2941de841b23a61d076222b6ef96dbc09' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/account-left-col.tpl',
      1 => 1368370193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1573847755519001b1462740-11547018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519001b14cb3a8_20679731',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519001b14cb3a8_20679731')) {function content_519001b14cb3a8_20679731($_smarty_tpl) {?><form id="form-search" method="get" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true);?>
">
	<input type="text" id="search" name="search" placeholder="Recherche..." />
	<input type="hidden" name="orderby" value="position" />
	<input type="hidden" name="controller" value="search" />
	<input type="hidden" name="orderway" value="desc" />
	<button type="submit" name="submit">OK</button>
</form>
<nav class="secondary-menu small-bloc">
	<ul>
		<li class="secondary-menu-item first item-active"><a href="#" title="Mon compte">mon compte</a>
			<ul class="submenu">
				<li class="submenu-item first">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
">Mes commandes</a>
				</li>
				<li class="submenu-item">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('subscription');?>
" title="Mon abonnement">Mon abonnement</a>
				</li>
				<li class="submenu-item">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Information'),$_smarty_tpl);?>
">Mes informations</a>
				</li>
				<li class="submenu-item">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Addresses'),$_smarty_tpl);?>
">Mes adresses</a>
				</li>
				<li class="submenu-item">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('discount',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Vouchers'),$_smarty_tpl);?>
">Mes r&eacute;ductions</a>
				</li>
				<li class="submenu-item">
					<a href="#" title="Parainnage">Parainnage</a>
				</li>
			</ul>
		</li>
	</ul>
</nav><!-- / .secondary-menu --><?php }} ?>