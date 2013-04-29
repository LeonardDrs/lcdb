<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 19:40:10
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-date-delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:954837988517eb07a99c9c1-49352196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '909597caebd98ccb5b4dbc4ccd74bee014bb7bb3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/order-date-delivery.tpl',
      1 => 1366306659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '954837988517eb07a99c9c1-49352196',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'back' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517eb07a9c7b27_60736567',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517eb07a9c7b27_60736567')) {function content_517eb07a9c7b27_60736567($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?><div id="columns" class="content clearfix">
	<div class="bloc-checkout">
			<?php echo $_smarty_tpl->getSubTemplate ("./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="content-checkout">
			<h1><?php echo smartyTranslate(array('s'=>'Shopping cart summary'),$_smarty_tpl);?>
</h1>
			<div class="content-checkout">
				<h1>Date de livraison</h1>
				<div class="bloc-time">
					<form method="get" id="date-livraison">
						<p>Choisissez votre date de livraison:</p>
						<div id="selected-date-hours">
							<div id="selected-date">
								<p>Date sélectionnée :</p>
								<input type="text" name="mydate" id="mydate" gldp-id="mydate" value="-" readonly />
							</div>
							<div id="selected-hours"></div>
						</div>
						<div id="calendar">
							<div gldp-el="mydate" style="width:515px; height:300px;" id="block-calendar" class="clearfix"></div>
							<div id="legend">
								<ul>
									<li class="impossible"><span></span><span>Livraison impossible</span></li>
									<li class="possible"><span></span><span>Livraison possible</span></li>
									<li class="already-rec"><span></span><span>Livraison déjà enregistrée</span></li>
								</ul>
							</div>
						</div>
						<div class="warning">
							<p>Certains produits de votre panier ont une <span class="bold">période de livraison limitée</span>. Aussi, les dates de livraison
							proposées peuvent être moins nombreuses. Si vous souhaitez disposez davantage de dates de livraison, nous
							vous invitons à <a class="bold" href="#" title="Modifier votre panier">modifier votre panier</a> en enlevant les produits
							spéciaux concernés.</p>
						</div>
						<div class="action">
							<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getCategoryLink(3), 'htmlall', 'UTF-8');?>
" title="Continuer mes achats"><span>&rarr;</span> Continuer mes achats</a>
							<input type="hidden" name="step" value="3" />
							<input type="hidden" name="back" value="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" />
							<button name="submit" name="processCarrier" type="submit" disabled>Valider ma date de livraison</button>
							<input type="submit" value="Valider ma date de livraison" />
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php }} ?>