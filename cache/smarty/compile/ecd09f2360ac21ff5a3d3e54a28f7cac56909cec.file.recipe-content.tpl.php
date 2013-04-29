<?php /* Smarty version Smarty-3.1.8, created on 2013-04-17 17:05:27
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/recipe-content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:394307069516eba376849a1-78369647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecd09f2360ac21ff5a3d3e54a28f7cac56909cec' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/recipe-content.tpl',
      1 => 1366041215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '394307069516eba376849a1-78369647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recipe' => 0,
    'base_dir' => 0,
    'content_only' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_516eba37759eb7_78333231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_516eba37759eb7_78333231')) {function content_516eba37759eb7_78333231($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<?php if (!$_smarty_tpl->tpl_vars['recipe']->value->active){?>
	<br />
	<div id="admin-action-recipe">
		<p><?php echo smartyTranslate(array('s'=>'This Recipe page is not visible to your customers.'),$_smarty_tpl);?>

		<input type="hidden" id="admin-action-recipe-id" value="<?php echo $_smarty_tpl->tpl_vars['recipe']->value->id;?>
" />
		<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Publish'),$_smarty_tpl);?>
" class="exclusive" onclick="submitPublishRecipe('<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php echo smarty_modifier_escape($_GET['ad'], 'htmlall', 'UTF-8');?>
', 0, '<?php echo smarty_modifier_escape($_GET['adtoken'], 'htmlall', 'UTF-8');?>
')"/>
		<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Back'),$_smarty_tpl);?>
" class="exclusive" onclick="submitPublishRecipe('<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php echo smarty_modifier_escape($_GET['ad'], 'htmlall', 'UTF-8');?>
', 1, '<?php echo smarty_modifier_escape($_GET['adtoken'], 'htmlall', 'UTF-8');?>
')"/>
		</p>
		<div class="clear" ></div>
		<p id="admin-action-result"></p>
		</p>
	</div>
<?php }?>
<div class="rte<?php if ($_smarty_tpl->tpl_vars['content_only']->value){?> content_only<?php }?>">
	<?php echo $_smarty_tpl->tpl_vars['recipe']->value->content;?>

</div>
<div id="center_column" class="recipe_card">
	<div class="backlink">
		<a href="javascript:history.back()" title="retourner à la liste des recettes">
			Retourner à la liste des recettes
		</a>
	</div>
	<div itemscope itemtype="http://schema.org/Recipe">
		<div class="title_print_recipe">
			<h1 class="title_list" itemprop="name">Paleron et ses champignons, sauce rouge</h1>
			<a href="javascript:window.print()">Imprimer</a>
		</div>
		<div id="presentation">
			<ul class="presentation">
				<li>
					<span id="difficulte">Difficulté</span>
					<span class="difficulte_level difficulte_<?php echo $_smarty_tpl->tpl_vars['recipe']->value->difficulty;?>
"><span><?php echo $_smarty_tpl->tpl_vars['recipe']->value->difficulty;?>
/5</span></span>
				</li>
				<li>
					<span id="preparation">Préparation</span>
					<span itemprop="prepTime"><?php echo $_smarty_tpl->tpl_vars['recipe']->value->duration;?>
</span>
				</li>
				<li>
					<span id="cuisson">Cuisson</span>
					<span itemprop="cookTime"><?php echo $_smarty_tpl->tpl_vars['recipe']->value->cooking_time;?>
</span>
				</li>
				<li>
					<span id="quantite">Quantite</span>
					<span itemprop="recipeYield"><?php echo $_smarty_tpl->tpl_vars['recipe']->value->number_people;?>
 pers.</span>
				</li>
			</ul>
		</div>
		<div id="content_recipe">
			<div id="recipe_intro" class="content"><?php echo $_smarty_tpl->tpl_vars['recipe']->value->prior_content;?>
</div>
			<div id="recipe_ingredients" class="content">
				<h2>Ingredients</h2>
				<div>
					<?php echo $_smarty_tpl->tpl_vars['recipe']->value->ingredients_content;?>

				</div>
			</div>
			<div id="recipe_detail" class="content">
				<h2>Recette</h2>
				<div itemprop="recipeInstructions">
					<?php echo $_smarty_tpl->tpl_vars['recipe']->value->recipe_content;?>

				</div>
			</div>
			<div id="recipe_council" class="content">
				<h2>Le conseil du boucher</h2>
				<div>
					<?php echo $_smarty_tpl->tpl_vars['recipe']->value->tips_content;?>

				</div>
			</div>
		</div>
	</div>
	<div class="backlink">
		<a href="javascript:history.back()" title="retourner à la liste des recettes">
			Retourner à la liste des recettes
		</a>
	</div>
</div><?php }} ?>