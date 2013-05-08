<?php /* Smarty version Smarty-3.1.8, created on 2013-05-02 15:42:56
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-leftcol.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39472207251826d6089b8e9-76992900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '702f58858eb90cee471a060f9017f38fd3f7546f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-leftcol.tpl',
      1 => 1366034009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39472207251826d6089b8e9-76992900',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'left_col' => 0,
    'maincat' => 0,
    'cat' => 0,
    'subcat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51826d6099b237_43149390',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51826d6099b237_43149390')) {function content_51826d6099b237_43149390($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
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
</nav><?php }} ?>