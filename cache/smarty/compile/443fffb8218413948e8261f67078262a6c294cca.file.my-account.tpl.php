<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 22:15:34
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/referralprogram/views/templates/hook/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65795296517ed4e62ee386-51650210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '443fffb8218413948e8261f67078262a6c294cca' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/referralprogram/views/templates/hook/my-account.tpl',
      1 => 1361836056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65795296517ed4e62ee386-51650210',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'module_template_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517ed4e6329a83_51585934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517ed4e6329a83_51585934')) {function content_517ed4e6329a83_51585934($_smarty_tpl) {?>

<!-- MODULE ReferralProgram -->
<li class="referralprogram">
	<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('referralprogram','program',array(),true);?>
" title="<?php echo smartyTranslate(array('s'=>'Referral program','mod'=>'referralprogram'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['module_template_dir']->value;?>
referralprogram.gif" alt="<?php echo smartyTranslate(array('s'=>'Referral program','mod'=>'referralprogram'),$_smarty_tpl);?>
" class="icon" /> 
			<?php echo smartyTranslate(array('s'=>'Referral program','mod'=>'referralprogram'),$_smarty_tpl);?>

	</a>
</li>
<!-- END : MODULE ReferralProgram --><?php }} ?>