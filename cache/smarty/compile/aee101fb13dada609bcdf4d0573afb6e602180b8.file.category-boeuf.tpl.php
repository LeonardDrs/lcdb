<?php /* Smarty version Smarty-3.1.8, created on 2013-05-02 13:57:11
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-boeuf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179005074651825497a52db3-31429383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aee101fb13dada609bcdf4d0573afb6e602180b8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-boeuf.tpl',
      1 => 1365541191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179005074651825497a52db3-31429383',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'categoryNameComplement' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51825497b23ad1_02605973',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51825497b23ad1_02605973')) {function content_51825497b23ad1_02605973($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>		<div class="big-bloc">
			<div class="title_list_product">
				<span id="big_cow"></span>
				<h1>
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value->name, 'htmlall', 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['categoryNameComplement']->value)){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['categoryNameComplement']->value, 'htmlall', 'UTF-8');?>
<?php }?>
				</h1>
				<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php if (isset($_smarty_tpl->tpl_vars['category']->value->description)){?>
					<p><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</p>
				<?php }?>
			</div>
			<div class="block-sort">
				<?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			</div>
			<div class="list-product">
				<div class="grill category">
					<div class="category-title">
						<span id="big_stove"></span>
						<h2>Les viande de Boeuf à griller</h2>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
						<?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

					<?php }?>
				</div>
				<div class="simmer category">
					<div class="category-title">
						<span id="pot"></span>
						<h2>Les viande de Boeuf à mijoter</h2>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
						<?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

					<?php }?>
				</div>
				<div class="roast category">
					<div class="category-title">
						<span id="oven"></span>
						<h2>Les viande de Boeuf à rôtir</h2>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
						<?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

					<?php }?>
				</div>
				<div class="more-product">
					<p class="blod">Vous chercher un produit particulier que nous ne proposons pas ?</p>
					<p>
						<a href="#" title="Contactez-nous !">Contactez-nous !</a>
						Nos éleveurs ont sûrement ce dont vous avez besoin.
					</p>
				</div>
			</div>
		</div><?php }} ?>