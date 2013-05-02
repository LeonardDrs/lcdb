<?php /* Smarty version Smarty-3.1.8, created on 2013-04-30 18:09:35
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/recipe-category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2026410901517fecbfeb00a7-73866347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9bcc026fbdc8469049e2a7b1ad6b1e961cb1304' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/recipe-category.tpl',
      1 => 1365798616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2026410901517fecbfeb00a7-73866347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recipe_category' => 0,
    'recipe_pages' => 0,
    'recipepages' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517fecbff31650_61617033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517fecbff31650_61617033')) {function content_517fecbff31650_61617033($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<div id="center_column">
	<div class="title clearfix">
		<span id="big_cow"></span><h1><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['recipe_category']->value->name, 'htmlall', 'UTF-8');?>
</h1><span id="stove"></span>
	</div>
	<table>
		<thead>
			<tr>
				<th><span class="border-class"></span></th>
				<th id="difficulte">Difficulté</th>
				<th id="preparation">Préparation</th>
				<th id="cuisson">Cuisson</th>
				<th id="quantite">Quantité</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($_smarty_tpl->tpl_vars['recipe_pages']->value)&!empty($_smarty_tpl->tpl_vars['recipe_pages']->value)){?>
				<?php  $_smarty_tpl->tpl_vars['recipepages'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recipepages']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recipe_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recipepages']->key => $_smarty_tpl->tpl_vars['recipepages']->value){
$_smarty_tpl->tpl_vars['recipepages']->_loop = true;
?>
					<tr itemscope itemtype="http://schema.org/Recipe">
						<td class="title_recipe" itemprop="name"><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getRecipeLink($_smarty_tpl->tpl_vars['recipepages']->value['id_recipe'],$_smarty_tpl->tpl_vars['recipepages']->value['link_rewrite']), 'htmlall', 'UTF-8');?>
" title="Accéder à la recette"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['recipepages']->value['title'], 'htmlall', 'UTF-8');?>
</a></td>
						<td class="difficulte_level difficulte_<?php echo $_smarty_tpl->tpl_vars['recipepages']->value['difficulty'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['recipepages']->value['difficulty'];?>
</span></td>
						<td class="preparation_time" itemprop="prepTime"><?php echo $_smarty_tpl->tpl_vars['recipepages']->value['duration'];?>
</td>
						<td class="cooking_time" itemprop="cookTime"><?php echo $_smarty_tpl->tpl_vars['recipepages']->value['cooking_time'];?>
</td>
						<td class="person_number" itemprop="recipeYield"><?php echo $_smarty_tpl->tpl_vars['recipepages']->value['number_people'];?>
</td>
					</tr>
				<?php } ?>
			<?php }?>
		</tbody>
	</table>
</div><?php }} ?>