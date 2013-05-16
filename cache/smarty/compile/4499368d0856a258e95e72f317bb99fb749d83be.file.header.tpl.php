<?php /* Smarty version Smarty-3.1.8, created on 2013-05-16 13:47:08
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2539212165194c73cb1e827-87048917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4499368d0856a258e95e72f317bb99fb749d83be' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/header.tpl',
      1 => 1368368124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2539212165194c73cb1e827-87048917',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'meta_language' => 0,
    'nobots' => 0,
    'nofollow' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'content_dir' => 0,
    'base_uri' => 0,
    'static_token' => 0,
    'token' => 0,
    'priceDisplayPrecision' => 0,
    'currency' => 0,
    'priceDisplay' => 0,
    'roundMode' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_files' => 0,
    'js_uri' => 0,
    'HOOK_HEADER' => 0,
    'page_name' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'base_dir' => 0,
    'HOOK_TOP' => 0,
    'menu_cats' => 0,
    'cat' => 0,
    'link' => 0,
    'menu_approach' => 0,
    'page' => 0,
    'menu_recipe' => 0,
    'menu_infos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5194c73cec1d43_50277349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5194c73cec1d43_50277349')) {function content_5194c73cec1d43_50277349($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie6 " lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html lang="fr" class="no-js ie9" lang="en"> <![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<head>
		<title><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
</title>
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value){?>
		<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'html', 'UTF-8');?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)&&$_smarty_tpl->tpl_vars['meta_keywords']->value){?>
		<meta name="keywords" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_keywords']->value, 'html', 'UTF-8');?>
" />
<?php }?>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta http-equiv="content-language" content="<?php echo $_smarty_tpl->tpl_vars['meta_language']->value;?>
" />
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)){?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['nofollow']->value)&&$_smarty_tpl->tpl_vars['nofollow']->value){?>no<?php }?>follow" />
		<meta property="og:title" content="Les Colis du Boucher, la livraison de viande Label Rouge et bio à domicile" />
		<meta property="og:image" content="http://www.lescolisduboucher.com/img/asset/facebook/logo_fb.png" />
		<meta property="og:type" content="Website" />
		<meta property="og:description" content="Les Colis du Boucher est une boutique en ligne qui est spécialisée dans la vente de viande bio et de viande Label Rouge livrée à votre domicile." />
		<meta property="og:url" content="http://www.lescolisduboucher.com" />
		<meta property="og:site_name" content="Les Colis du Boucher" />
		
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<script type="text/javascript">
			var baseDir = '<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
';
			var baseUri = '<?php echo $_smarty_tpl->tpl_vars['base_uri']->value;?>
';
			var static_token = '<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
';
			var token = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
';
			var priceDisplayPrecision = <?php echo $_smarty_tpl->tpl_vars['priceDisplayPrecision']->value*$_smarty_tpl->tpl_vars['currency']->value->decimals;?>
;
			var priceDisplayMethod = <?php echo $_smarty_tpl->tpl_vars['priceDisplay']->value;?>
;
			var roundMode = <?php echo $_smarty_tpl->tpl_vars['roundMode']->value;?>
;
		</script>
		
		<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value){
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
		<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />
		<?php } ?>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
		<?php } ?>
		<?php }?>

		<!-- Plugin -->
		<script type="text/javascript" src="js/plugins/jquery.placeholder.min.js"></script>
		<script type="text/javascript" src="js/plugins/modernizr-2.6.2.min.js"></script>
		<script type="text/javascript" src="js/plugins/cufon.js"></script>
		<script type="text/javascript" src="js/plugins/font-cufon.js"></script>
		<!-- Fichier perso -->
		<link rel="stylesheet" href="css/lib/normalize.css"/>
		<script src="js/main.js"></script>
		<script src="js/googleAnalytics.js"></script>

		<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>

	</head>
	
	<body <?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)){?>id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['page_name']->value, 'htmlall', 'UTF-8');?>
"<?php }?> class="<?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value){?>hide-left-column<?php }?> <?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value){?>hide-right-column<?php }?> <?php if ($_smarty_tpl->tpl_vars['content_only']->value){?> content_only <?php }?>">
		
	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
	
		<?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value){?>
		<div id="restricted-country">
			<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['geolocation_country']->value;?>
</span></p>
		</div>
		<?php }?>
					
		<div id="page">
			<span class="ombre"></span>
			<header>
				<div class="link-logo">
					<span class="logo"></span>
					<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="Les Colis du Boucher - Accueil">
						<h1>La meilleure viande bio et label rouge livrée chez vous !</h1>
					</a>
				</div>
				<?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>

				
				<nav>
					<span></span>
					<ul>
						<li class="produits"><a href="#" title="Nos produits">Nos produits</a>
							<ul>
								<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cat']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['cat']->iteration=0;
 $_smarty_tpl->tpl_vars['cat']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->iteration++;
 $_smarty_tpl->tpl_vars['cat']->index++;
 $_smarty_tpl->tpl_vars['cat']->first = $_smarty_tpl->tpl_vars['cat']->index === 0;
 $_smarty_tpl->tpl_vars['cat']->last = $_smarty_tpl->tpl_vars['cat']->iteration === $_smarty_tpl->tpl_vars['cat']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['cat']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['last'] = $_smarty_tpl->tpl_vars['cat']->last;
?>
									<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?>first <?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['last']){?>last <?php }?>"><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['cat']->value['id_category'],$_smarty_tpl->tpl_vars['cat']->value['link_rewrite']), 'htmlall', 'UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a></li>
								<?php } ?>
							</ul>
						</li>
						<li class="demarche"><a href="#" title="Notre démarche">Notre démarche</a>
							<ul>
								<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_approach']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['page']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['page']->iteration=0;
 $_smarty_tpl->tpl_vars['page']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
$_smarty_tpl->tpl_vars['page']->_loop = true;
 $_smarty_tpl->tpl_vars['page']->iteration++;
 $_smarty_tpl->tpl_vars['page']->index++;
 $_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->index === 0;
 $_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['page']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['last'] = $_smarty_tpl->tpl_vars['page']->last;
?>
									<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?>first <?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['last']){?>last <?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink($_smarty_tpl->tpl_vars['page']->value['id_cms'],$_smarty_tpl->tpl_vars['page']->value['link_rewrite']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['page']->value['meta_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['meta_title'];?>
</a></li>
								<?php } ?>
							</ul>
						</li>
						<li class="recettes"><a href="#" title="Recettes">Recettes</a>
							<ul>
								<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_recipe']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cat']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['cat']->iteration=0;
 $_smarty_tpl->tpl_vars['cat']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->iteration++;
 $_smarty_tpl->tpl_vars['cat']->index++;
 $_smarty_tpl->tpl_vars['cat']->first = $_smarty_tpl->tpl_vars['cat']->index === 0;
 $_smarty_tpl->tpl_vars['cat']->last = $_smarty_tpl->tpl_vars['cat']->iteration === $_smarty_tpl->tpl_vars['cat']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['cat']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['last'] = $_smarty_tpl->tpl_vars['cat']->last;
?>
									<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?>first <?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['last']){?>last <?php }?>"><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getRecipeCategoryLink($_smarty_tpl->tpl_vars['cat']->value['id_recipe_category'],false), 'htmlall', 'UTF-8');?>
" title="Veau"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a></li>
								<?php } ?>
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
								<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['page']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['page']->iteration=0;
 $_smarty_tpl->tpl_vars['page']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
$_smarty_tpl->tpl_vars['page']->_loop = true;
 $_smarty_tpl->tpl_vars['page']->iteration++;
 $_smarty_tpl->tpl_vars['page']->index++;
 $_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->index === 0;
 $_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['page']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['last'] = $_smarty_tpl->tpl_vars['page']->last;
?>
									<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']){?>first <?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink($_smarty_tpl->tpl_vars['page']->value['id_cms'],$_smarty_tpl->tpl_vars['page']->value['link_rewrite']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['page']->value['meta_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['meta_title'];?>
</a></li>
								<?php } ?>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
index.php?controller=delivery">Livraison</a></li>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
index.php?controller=post">Presse</a></li>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
index.php?controller=guestbook">Livre d'or</a></li>
								<li class="last"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSCategoryLink(7);?>
">Question fréquentes</a></li>
							</ul>
						</li>
						<li class="contact"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
">Contact</a></li>
					</ul>
				</nav>
				<?php if ($_smarty_tpl->tpl_vars['page_name']->value!="index"){?>
					<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
			</header>
	<?php }?>
<?php }} ?>