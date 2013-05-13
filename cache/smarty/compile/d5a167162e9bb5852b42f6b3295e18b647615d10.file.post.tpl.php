<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 16:08:04
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:298447834518fa2449614f4-78805471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5a167162e9bb5852b42f6b3295e18b647615d10' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/post.tpl',
      1 => 1368367588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '298447834518fa2449614f4-78805471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'base_dir' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_518fa2449a4919_39998916',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518fa2449a4919_39998916')) {function content_518fa2449a4919_39998916($_smarty_tpl) {?>
<div id="columns" class="content clearfix">
	<div id="left_column">

	</div><!-- / #left_column -->
	<div id="center_column" class="presse">
		
		<div class="big-bloc">
			<h1>Presse</h1>
			<p class="italique">Ils parlent des "Colis du Boucher" !</p>
			<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
				<div class="article_presse">
					<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/po/<?php echo $_smarty_tpl->tpl_vars['post']->value['id_post'];?>
-default-large_default.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
">
					<div class="texte_presse">
						<span><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</span>
						<div><?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
</div>
						<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['link'];?>
">Terra Femina</a>
					</div>
				</div>
			<?php } ?>
			<div class="pagination_presse"><a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> ... <a href="#">10</a> <a href="#">Page suivante</a></div>
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content -->
<?php }} ?>