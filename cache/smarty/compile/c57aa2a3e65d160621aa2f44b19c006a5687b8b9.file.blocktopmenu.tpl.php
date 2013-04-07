<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 02:28:20
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1135379084515a2624ce3b40-73777232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c57aa2a3e65d160621aa2f44b19c006a5687b8b9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1364862495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1135379084515a2624ce3b40-73777232',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a2624cf75b3_25044866',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a2624cf75b3_25044866')) {function content_515a2624cf75b3_25044866($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!=''){?>
	<nav>
		<span></span>
		<ul>
			<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

			<li class="produits"><a href="#" title="Nos produits">Nos produits</a>
				<ul>
					<li class="first"><a href="#" title="Produits à la carte">Produits à la carte</a></li>
					<li><a href="#" title="Colis surprise">Colis surprise</a></li>
					<li><a href="#" title="Promotions">Promotions</a></li>
					<li><a href="#" title="Offres spéciales">Offres spéciales</a></li>
					<li class="last"><a href="#" title="Colis cadeau">Colis cadeau</a></li>
				</ul>
			</li>
			<li class="demarche"><a href="#" title="Notre démarche">Notre démarche</a>
				<ul>
					<li class="first"><a href="#" title="Notre circuit court">Notre circuit court</a></li>
					<li><a href="#" title="Nos éleveurs">Nos éleveurs</a></li>
					<li><a href="#" title="Préparation de la viande">Préparation des viandes</a></li>
					<li class="last"><a href="#" title="Viandes labellisées">Viandes labellisées</a></li>
				</ul>
			</li>
			<li class="recettes"><a href="#" title="Recettes">Recettes</a>
				<ul>
					<li class="first"><a href="#" title="Boeuf">Boeuf</a></li>
					<li><a href="#" title="Veau">Veau</a></li>
					<li><a href="#" title="Agneau">Agneau</a></li>
					<li><a href="#" title="Porc">Porc</a></li>
					<li><a href="#" title="Volaille">Volaille</a></li>
					<li><a href="#" title="Lapin">Lapin</a></li>
					<li class="last"><a href="#" title="Autres">Autres</a></li>
				</ul>
			</li>
			<li class="center"></li>
			<li class="village"><a href="#" title="Le village">Le village</a>
				<ul>
					<li class="first"><a href="#" title="Témoignages">Témoignages</a></li>
					<li><a href="#" title="Blog">Blog</a></li>
					<li class="last"><a href="#" title="Parrainage">Parrainage</a></li>
				</ul>
			</li>
			<li class="infos"><a href="#" title="Infos pratiques">Infos pratiques</a>
				<ul>
					<li class="first"><a href="#" title="Conservation et cuisson">Conservation et cuisson</a></li>
					<li><a href="#" title="Livraison">Livraison</a></li>
					<li><a href="#" title="Paiement">Paiement</a></li>
					<li class="last"><a href="#" title="Questions fréquentes">Questions fréquentes</a></li>
				</ul>
			</li>
			<li class="contact"><a href="#" title="contact">Contact</a></li>
		</ul>
	</nav>
<?php }?><?php }} ?>