<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 22:55:49
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/recipe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1161140003519001d57940a6-23228197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75a55157a56885c23ab11c312ee23f346d4b11a7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/recipe.tpl',
      1 => 1366033992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1161140003519001d57940a6-23228197',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'left_col' => 0,
    'maincat' => 0,
    'cat' => 0,
    'recipe' => 0,
    'recipe_category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519001d58658e1_84088119',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519001d58658e1_84088119')) {function content_519001d58658e1_84088119($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<div id="columns" class="content clearfix">
	<div id="left_column">
		
		<form id="form-search" method="get" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true);?>
">
			<input type="text" id="search" name="search" placeholder="Recherche..." />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderway" value="desc" />
			<button type="submit" name="submit">OK</button>
		</form>
		<nav class="secondary-menu small-bloc">
			<ul>
				<li class="secondary-menu-item item-active first">
					<a href="javascript:voi(0);" title="Produits à la carte">Produits à la carte</a>
					<ul class="submenu">
						<?php  $_smarty_tpl->tpl_vars['maincat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['maincat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['left_col']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['maincat']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['maincat']->iteration=0;
 $_smarty_tpl->tpl_vars['maincat']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['maincat']->key => $_smarty_tpl->tpl_vars['maincat']->value){
$_smarty_tpl->tpl_vars['maincat']->_loop = true;
 $_smarty_tpl->tpl_vars['maincat']->iteration++;
 $_smarty_tpl->tpl_vars['maincat']->index++;
 $_smarty_tpl->tpl_vars['maincat']->first = $_smarty_tpl->tpl_vars['maincat']->index === 0;
 $_smarty_tpl->tpl_vars['maincat']->last = $_smarty_tpl->tpl_vars['maincat']->iteration === $_smarty_tpl->tpl_vars['maincat']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['maincat']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['last'] = $_smarty_tpl->tpl_vars['maincat']->last;
?>
							<li class="submenu-item item-active <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?>first <?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['last']){?>last <?php }?>">
								<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getRecipeCategoryLink($_smarty_tpl->tpl_vars['maincat']->value['id_recipe_category'],false), 'htmlall', 'UTF-8');?>
" title="Boeuf"><span class="img-boeuf"></span><?php echo $_smarty_tpl->tpl_vars['maincat']->value['name'];?>
</a>
								<ul>
									<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maincat']->value['subcats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
										<li class="griller item-active">
											<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getRecipeCategoryLink($_smarty_tpl->tpl_vars['cat']->value['id_recipe_category'],false), 'htmlall', 'UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a>
										</li>
									<?php } ?>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	
	<?php if (isset($_smarty_tpl->tpl_vars['recipe']->value)&&!isset($_smarty_tpl->tpl_vars['recipe_category']->value)){?>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./recipe-content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }elseif(isset($_smarty_tpl->tpl_vars['recipe_category']->value)){?>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./recipe-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }else{ ?>
		<div id="center_column">
			<div class="error">
				<?php echo smartyTranslate(array('s'=>'This page does not exist.'),$_smarty_tpl);?>

			</div>
		</div>
	<?php }?>
	
</div>
<?php }} ?>