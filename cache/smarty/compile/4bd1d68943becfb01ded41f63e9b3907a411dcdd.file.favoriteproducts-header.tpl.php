<?php /* Smarty version Smarty-3.1.8, created on 2013-05-17 01:34:45
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158334358451956d15169211-87798915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bd1d68943becfb01ded41f63e9b3907a411dcdd' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1361836056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158334358451956d15169211-87798915',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51956d15209090_02784586',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51956d15209090_02784586')) {function content_51956d15209090_02784586($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),false);?>
';
	var favorite_products_url_remove = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),false);?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>