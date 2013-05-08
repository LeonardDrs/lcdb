<?php /* Smarty version Smarty-3.1.8, created on 2013-05-02 15:17:59
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/paypal/views/templates/back/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:335476575518267878a4f44-38039347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8395161689e0f98a59dcf87cab603bfa69c5b6e1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/paypal/views/templates/back/header.tpl',
      1 => 1367500679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '335476575518267878a4f44-38039347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PayPal_WPS' => 0,
    'PayPal_HSS' => 0,
    'PayPal_ECS' => 0,
    'PayPal_module_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51826787902ef6_40980437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51826787902ef6_40980437')) {function content_51826787902ef6_40980437($_smarty_tpl) {?><script type="text/javascript">
    var PayPal_WPS = '<?php echo $_smarty_tpl->tpl_vars['PayPal_WPS']->value;?>
';
    var PayPal_HSS = '<?php echo $_smarty_tpl->tpl_vars['PayPal_HSS']->value;?>
';
    var PayPal_ECS = '<?php echo $_smarty_tpl->tpl_vars['PayPal_ECS']->value;?>
';
</script>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PayPal_module_dir']->value;?>
/views/templates/back/back_office.js"></script><?php }} ?>