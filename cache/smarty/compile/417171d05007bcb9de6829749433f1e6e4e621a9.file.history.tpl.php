<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 17:00:48
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:595599400518faea0eb5fc0-38933245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '417171d05007bcb9de6829749433f1e6e4e621a9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/history.tpl',
      1 => 1365636119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '595599400518faea0eb5fc0-38933245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'slowValidation' => 0,
    'orders' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_518faea108eac4_47206373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518faea108eac4_47206373')) {function content_518faea108eac4_47206373($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>


<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
"><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<div id="columns" class="content clearfix">
	<div id="left_column">
		<?php echo $_smarty_tpl->getSubTemplate ("./account-left-col.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- / #left_column -->
	<div id="center_column">
		<div class="big-bloc">
			<h1><?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
</h1>
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			
			<?php if ($_smarty_tpl->tpl_vars['slowValidation']->value){?>
				<p id="empty-command"><span class="img-warning"></span>l s='If you have just placed an order, it may take a few minutes for it to be validated. Please refresh this page if your order is missing.'}</p>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['orders']->value&&count($_smarty_tpl->tpl_vars['orders']->value)){?>
				<hr />
				<div class="clearfix" id="mes-commandes">
					<div class="left-side">
						<h3>Dernières commande</h3>
						<hr />
						<p>Numéro de commande : <span class="bold"><?php echo $_smarty_tpl->tpl_vars['orders']->value[0]['reference'];?>
</span></p>
						<p>Commande réalisée le : <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['orders']->value[0]['date_add'],'full'=>0),$_smarty_tpl);?>
</span></p>
						<p>Montant total : <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['orders']->value[0]['total_paid'],'currency'=>$_smarty_tpl->tpl_vars['orders']->value[0]['id_currency'],'no_utf8'=>false,'convert'=>false),$_smarty_tpl);?>
</span></p>
						<p>Mode de règlement : <span class="bold"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['orders']->value[0]['payment'], 'htmlall', 'UTF-8');?>
</span></p>
						<p>État du paiement : <span class="bold"><?php if (isset($_smarty_tpl->tpl_vars['orders']->value[0]['order_state'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['orders']->value[0]['order_state'], 'htmlall', 'UTF-8');?>
<?php }?></span></p>
						<div class="clearfix commande-adresse">
							<p>Adresse de livraison :</p>
							<ul>
								<li>Jean-Baptiste Poquelin</li>
								<li>3 rue du chène</li>
								<li>Bat. A, appt 34, code : 7899</li>
								<li>69000 Lyon</li>
								<li>0148354756</li>
							</ul>
						</div>
						<hr />
						<a href="javascript:showOrder(1, <?php echo intval($_smarty_tpl->tpl_vars['orders']->value[0]['id_order']);?>
, '<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-detail',true);?>
');" title="Voir le détail">&rarr; Voir le détail</a>
					</div>
					<div class="right-side">
						<h3>Prochaine commande</h3>
						<hr />
						<p>Numéro de commande : <span class="bold">GHUYSKKI</span></p>
						<p>Commande réalisée le : <span class="bold">12/02/2013</span></p>
						<p>Montant total : <span class="bold">82,25 &euro;</span></p>
						<p>Mode de règlement : <span class="bold">Chèque</span></p>
						<p>État du paiement : <span class="bold">En attente de paiement</span></p>
						<div class="clearfix commande-adresse">
							<p>Adresse de livraison :</p>
							<ul>
								<li>Jean-Baptiste Poquelin</li>
								<li>3 rue du chène</li>
								<li>Bat. A, appt 34, code : 7899</li>
								<li>69000 Lyon</li>
								<li>0148354756</li>
							</ul>
						</div>
						<hr />
						<a href="#" title="Voir le détail">&rarr; Voir le détail</a>
						<a href="#" title="Télécharger la facture">&rarr; Télécharger la facture</a>
					</div>
				</div>
				<hr />
				<div id="block-order-detail" class="hidden"></div>
			<?php }else{ ?>
				<p id="empty-command"><span class="img-warning"></span><?php echo smartyTranslate(array('s'=>'You have not placed any orders.'),$_smarty_tpl);?>
</p>
			<?php }?>
			
		</div>
	</div><!-- / #center_column -->
</div><!-- / .content -->
<?php }} ?>