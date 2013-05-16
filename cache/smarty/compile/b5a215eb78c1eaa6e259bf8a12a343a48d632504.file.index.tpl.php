<?php /* Smarty version Smarty-3.1.8, created on 2013-05-17 01:34:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28982570651956d163bb6a7-32097742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5a215eb78c1eaa6e259bf8a12a343a48d632504' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/index.tpl',
      1 => 1368369929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28982570651956d163bb6a7-32097742',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_HOME' => 0,
    'link' => 0,
    'messages' => 0,
    'content' => 0,
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51956d1641abd1_05806475',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51956d1641abd1_05806475')) {function content_51956d1641abd1_05806475($_smarty_tpl) {?><div class="content clearfix">
	<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

	<div class="content-infos-site">
		<div class="infos-measure">
			<h2>Notre démarche</h2>
			<span class="illustration"></span>
			<ul>
				<li class="eleveurs">Nos éleveurs <span class="color">en Auvergne</span><span class="illustration"></span></li>
				<li class="commande"><span class="illustration"></span>Votre <span class="color">commande</span></li>
				<li class="livraison">Votre <span class="color">livraison</span><span class="illustration"></span></li>
			</ul>
			<div class="clearfix"></div>
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink(13);?>
" title="En savoir plus sur notre démarche">
				&rarr;<span> En savoir plus sur notre démarche</span>
			</a>
		</div>
		<div class="entries-and-blog">
			<div class="entries">
				<h2>Livre d'or</h2>
				<?php  $_smarty_tpl->tpl_vars['content'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['content']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['content']->key => $_smarty_tpl->tpl_vars['content']->value){
$_smarty_tpl->tpl_vars['content']->_loop = true;
?>
					<p><span>&laquo;</span><?php echo $_smarty_tpl->tpl_vars['content']->value['message'];?>
<span>&raquo;</span></p>
					<p class="signature"><?php echo $_smarty_tpl->tpl_vars['content']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['content']->value['lastname'];?>
, <?php echo $_smarty_tpl->tpl_vars['content']->value['city'];?>
</p>
					<?php break 1?>
				<?php } ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('guestbook');?>
" title="Voir tous les commentaires">
					&rarr;<span> Voir tous les commentaires</span>
				</a>
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('guestbook');?>
#button-witness" title="Laisser un commentaire">
					&rarr;<span> Laisser un commentaire</span>
				</a>
			</div>
			<div class="blog">
				<h2>En direct du blog</h2>
				<article>
					<a href="#" title="Accéder au blog">
						<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/lcdb_theme/img/photos/vache.jpg" alt="une vache dans un près" />
					</a>
					<div class="subject">
						<h3>
							<a href="#" title="Accéder au blog">
								Une vache dans le près
							</a>
						</h3>
						<p>
							<a href="#" title="Accéder au blog">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quam mi. 
								Vestibulum quam mi.
							</a>
						</p>
					</div>
				</article>
				<a href="#" title="Accéder au blog">&rarr;<span> Accéder au blog</span></a>
			</div>	
		</div>
	</div>
</div><?php }} ?>