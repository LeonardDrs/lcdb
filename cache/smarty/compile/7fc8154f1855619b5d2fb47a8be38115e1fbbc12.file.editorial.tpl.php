<?php /* Smarty version Smarty-3.1.8, created on 2013-05-15 16:45:33
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/editorial/editorial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106819089651939f8d8c3196-55548285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fc8154f1855619b5d2fb47a8be38115e1fbbc12' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/modules/editorial/editorial.tpl',
      1 => 1368368209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106819089651939f8d8c3196-55548285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'homepage_logo' => 0,
    'image_path' => 0,
    'link' => 0,
    'editorial' => 0,
    'image_width' => 0,
    'image_height' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51939f8d93b846_89456260',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51939f8d93b846_89456260')) {function content_51939f8d93b846_89456260($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<div class="order-meat-message">
	<div class="cow">
		<span class="clip"></span>
		<span class="corner-top"></span>
		<span class="corner-right"></span>
		<span class="corner-bottom"></span>
		<span class="corner-left"></span>
		<?php if ($_smarty_tpl->tpl_vars['homepage_logo']->value){?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink($_smarty_tpl->tpl_vars['image_path']->value);?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_logo_subheading);?>
" <?php if ($_smarty_tpl->tpl_vars['image_width']->value){?>width="<?php echo $_smarty_tpl->tpl_vars['image_width']->value;?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['image_height']->value){?>height="<?php echo $_smarty_tpl->tpl_vars['image_height']->value;?>
" <?php }?>/>
		<?php }?>
	</div>
	<div class="label-message">
		<span class="illustration"></span>
		<div class="label">
			<p><span></span>Viandes certifiées<span></span></p>
			<ul>
				<li><span>Label Rouge</span></li>
				<li><span>Agriculture Biologique</span></li>
			</ul>
		</div>
		<div class="message">
			<span></span>
			<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph){?>
				<?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph);?>

			<?php }?>
			<p class="signature">Guy & Melchior</p>
		</div>
	</div>
	<div class="order-meat">
		<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getCategoryLink(3), 'htmlall', 'UTF-8');?>
" title="Commander nos viandes"><span></span>Commander nos viandes<span></span></a>
	</div>
</div>
<?php }} ?>