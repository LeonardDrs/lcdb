<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 22:54:24
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-rightcol.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1215079596519001808a7187-72215344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42306b0f3f3369554583bdc55a542d1554e42621' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/category-rightcol.tpl',
      1 => 1366044421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1215079596519001808a7187-72215344',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_RIGHT_COLUMN' => 0,
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519001808b7181_98527338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519001808b7181_98527338')) {function content_519001808b7181_98527338($_smarty_tpl) {?>
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
	<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/lcdb_theme/img/img_solo/labelrouge.png" alt="label rouge different d'agriculture biologique" />
	<a href="#" title="En savoir plus sur les labels">En savoir plus sur les labels</a>
</div>
<div class="small-bloc temoignage">
	<span class="bloc-title ribbon-temoignage"></span>
	<p class="temoignage-text">“Super viande, on a pris le colis surprise cette semaine et les enfants ont adoré, les tranches de gigot. Nous avons donc recommandé pour la semaine prochaine. Bravo très bonne initiative et nous nous régalons d’avance pour les prochains cilis surprise. Merci !”</p>
	<p class="author"><span>Clarisse J</span>, Paris</p>
	<a href="#" title="Voir tous les témoignages">Voir tous les témoignages</a>
</div><?php }} ?>