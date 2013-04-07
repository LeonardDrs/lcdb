<?php /* Smarty version Smarty-3.1.8, created on 2013-04-04 13:44:27
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1598185469515d679bef0650-02333879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df6df93e816b142d9ff9c753af972d31892504f9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category.tpl',
      1 => 1365074809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1598185469515d679bef0650-02333879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'left_col' => 0,
    'maincat' => 0,
    'link' => 0,
    'cat' => 0,
    'subcat' => 0,
    'category' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515d679c0f7877_38001778',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515d679c0f7877_38001778')) {function content_515d679c0f7877_38001778($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?><div id="columns" class="content clearfix">
	<div id="left_column">
		<form id="form-search" method="get">
			<input id="search" type="text" placeholder="Recherche..." name="search">
			<button type="submit" name="submit">OK</button>
		</form>
		<nav class="secondary-menu small-bloc">
			<ul>
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
					<li class="secondary-menu-item item-active <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?>first <?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['last']){?>last <?php }?>">
						<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['maincat']->value['id_category'],$_smarty_tpl->tpl_vars['maincat']->value['link_rewrite']), 'htmlall', 'UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['maincat']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['maincat']->value['name'];?>
</a>
						<ul class="submenu">
							<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maincat']->value['subcats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cat']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['cat']->iteration=0;
 $_smarty_tpl->tpl_vars['cat']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->iteration++;
 $_smarty_tpl->tpl_vars['cat']->index++;
 $_smarty_tpl->tpl_vars['cat']->first = $_smarty_tpl->tpl_vars['cat']->index === 0;
 $_smarty_tpl->tpl_vars['cat']->last = $_smarty_tpl->tpl_vars['cat']->iteration === $_smarty_tpl->tpl_vars['cat']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo2']['first'] = $_smarty_tpl->tpl_vars['cat']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo2']['last'] = $_smarty_tpl->tpl_vars['cat']->last;
?>
								<li class="submenu-item item-active <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo2']['first']){?>first <?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo2']['last']){?>last <?php }?>">
									<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['cat']->value['id_category'],$_smarty_tpl->tpl_vars['cat']->value['link_rewrite']), 'htmlall', 'UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
"><span class="img-boeuf"></span><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a>
									<ul>
										<?php  $_smarty_tpl->tpl_vars['subcat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subcat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value['subcats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subcat']->key => $_smarty_tpl->tpl_vars['subcat']->value){
$_smarty_tpl->tpl_vars['subcat']->_loop = true;
?>
											<li class="griller item-active">
												<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcat']->value['id_category'],$_smarty_tpl->tpl_vars['subcat']->value['link_rewrite']), 'htmlall', 'UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['subcat']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['subcat']->value['name'];?>
</a>
											</li>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</nav>
	</div>
	<div id="center_column" class="page-list-product">
		<?php if (isset($_smarty_tpl->tpl_vars['category']->value)){?>
			<?php if ($_smarty_tpl->tpl_vars['category']->value->id&&$_smarty_tpl->tpl_vars['category']->value->active){?>
					<?php if ($_smarty_tpl->tpl_vars['category']->value->id_parent==8){?>
						<?php echo $_smarty_tpl->getSubTemplate ("./category-boeuf.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					<?php }else{ ?>
						<?php echo $_smarty_tpl->getSubTemplate ("./category-subcat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					<?php }?>
			<?php }elseif($_smarty_tpl->tpl_vars['category']->value->id){?>
				<p class="warning"><?php echo smartyTranslate(array('s'=>'This category is currently unavailable.'),$_smarty_tpl);?>
</p>
			<?php }?>
		<?php }?>
	</div><!-- end #center_column -->
	<div id="right_column">
		<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>

		<div class="small-bloc frais-livraison">
			<span class="bloc-title ribbon-frais-livraison"></span>
			<p><span class="img-livraison"></span>Frais de livraison de 0 à 20 €</p>
			<hr />
			<p class="livraison-small">Entrez votre code postal pour connaitre vos frais de livraison</p>
			<form id="form-code-postal" method="post">
				<input id="code-postal" type="text" placeholder="Code postal..." name="code-postal">
				<button type="submit" name="submit">OK</button>
			</form>
		</div>
		<div class="small-bloc mot-boucher">
			<span class="bloc-title ribbon-mot-boucher"></span>
			<h3>Le saviez-vous ?</h3>
			<p>Les viandes Bio sont réputées pour etre des viandes saines et non pas particulièremnet savourauses comme le sont les  viandes Label Rouge qui vous garantissent un plaisir  gustatif incomparable.</p>
			<img src="img/asset/img_solo/labelrouge.png" alt="label rouge different d'agriculture biologique" />
			<a href="#" title="En savoir plus sur les labels">En savoir plus sur les labels</a>
		</div>
		<div class="small-bloc temoignage">
			<span class="bloc-title ribbon-temoignage"></span>
			<p class="temoignage-text">“Super viande, on a pris le colis surprise cette semaine et les enfants ont adoré, les tranches de gigot. Nous avons donc recommandé pour la semaine prochaine. Bravo très bonne initiative et nous nous régalons d’avance pour les prochains cilis surprise. Merci !”</p>
			<p class="author"><span>Clarisse J</span>, Paris</p>
			<a href="#" title="Voir tous les témoignages">Voir tous les témoignages</a>
		</div>
	</div>
</div>
<?php }} ?>