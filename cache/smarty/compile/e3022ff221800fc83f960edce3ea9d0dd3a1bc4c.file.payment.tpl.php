<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 22:15:39
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/datatrans/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:246755794515c8deb106133-16013294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3022ff221800fc83f960edce3ea9d0dd3a1bc4c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/datatrans/views/templates/hook/payment.tpl',
      1 => 1349787568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '246755794515c8deb106133-16013294',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this_path' => 0,
    'usealias' => 0,
    'psp_url' => 0,
    'parametres' => 0,
    'parametre' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c8deb153446_57254831',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c8deb153446_57254831')) {function content_515c8deb153446_57254831($_smarty_tpl) {?>

<p class="payment_module">
	<a href="javascript:javascript:document.datatransform.submit();" style="overflow: auto;">
		<span style="display: block; float: left; width: 197px; height: 26px; margin-right:10px"><img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
img/logo_dts.gif" alt="" /></span>
		<span><?php echo smartyTranslate(array('s'=>'Pay with your Credit Card (American Express, VISA, MasterCard, Diners, JCB and other) through Datatrans Payment Service','mod'=>'datatrans'),$_smarty_tpl);?>

		<?php if (isset($_smarty_tpl->tpl_vars['usealias']->value)){?><br /><?php echo $_smarty_tpl->tpl_vars['usealias']->value;?>
<?php }?></span>
	</a>
</p>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['psp_url']->value;?>
" id="datatransform"  name="datatransform">
<p>
<?php  $_smarty_tpl->tpl_vars['parametre'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['parametre']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['parametres']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['parametre']->key => $_smarty_tpl->tpl_vars['parametre']->value){
$_smarty_tpl->tpl_vars['parametre']->_loop = true;
?>
	<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['parametre']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['parametre']->value['value'];?>
" />
<?php } ?>
</p>
</form>
<?php }} ?>