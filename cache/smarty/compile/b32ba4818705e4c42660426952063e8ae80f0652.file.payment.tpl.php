<?php /* Smarty version Smarty-3.1.8, created on 2013-04-18 18:55:35
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/cheque/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211864248951702587e30421-09853139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b32ba4818705e4c42660426952063e8ae80f0652' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/cheque/views/templates/hook/payment.tpl',
      1 => 1361836056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211864248951702587e30421-09853139',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'this_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51702587e62792_32423379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51702587e62792_32423379')) {function content_51702587e62792_32423379($_smarty_tpl) {?>

<p class="payment_module">
	<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('cheque','payment',array(),true);?>
" title="<?php echo smartyTranslate(array('s'=>'Pay by cheque','mod'=>'cheque'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
cheque.jpg" alt="<?php echo smartyTranslate(array('s'=>'Pay by cheque','mod'=>'cheque'),$_smarty_tpl);?>
" width="86" height="49" />
		<?php echo smartyTranslate(array('s'=>'Pay by cheque (order process will be longer)','mod'=>'cheque'),$_smarty_tpl);?>

	</a>
</p>
<?php }} ?>