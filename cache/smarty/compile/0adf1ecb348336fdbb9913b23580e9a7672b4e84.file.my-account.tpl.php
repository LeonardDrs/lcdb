<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 22:54:30
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130697750519001862f7417-44905626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0adf1ecb348336fdbb9913b23580e9a7672b4e84' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/my-account.tpl',
      1 => 1365544282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130697750519001862f7417-44905626',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'account_created' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51900186338271_39180751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51900186338271_39180751')) {function content_51900186338271_39180751($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<div id="columns" class="content clearfix">
	<div id="left_column">
		<?php echo $_smarty_tpl->getSubTemplate ("./account-left-col.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- / #left_column -->
	<div id="center_column">
		<div class="big-bloc">
			<h1><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
</h1>
			<?php if (isset($_smarty_tpl->tpl_vars['account_created']->value)){?>
				<p class="success">
					<?php echo smartyTranslate(array('s'=>'Your account has been created.'),$_smarty_tpl);?>

				</p>
			<?php }?>
			<hr class="mon-compte"/>
			<p><?php echo smartyTranslate(array('s'=>'Welcome to your account page. You can manage your personal information, your order and your delivery address.'),$_smarty_tpl);?>
</p>
			<hr />
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content --><?php }} ?>