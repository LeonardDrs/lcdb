<?php /* Smarty version Smarty-3.1.8, created on 2013-05-16 13:50:09
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/contact-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10481700605194c7f17a3bc0-28097712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '586f45877f71a60b9a6ad31c7d4499d8b8819aa5' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/contact-form.tpl',
      1 => 1368367102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10481700605194c7f17a3bc0-28097712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'confirmation' => 0,
    'base_dir' => 0,
    'img_dir' => 0,
    'alreadySent' => 0,
    'request_uri' => 0,
    'customerThread' => 0,
    'email' => 0,
    'isLogged' => 0,
    'orderList' => 0,
    'order' => 0,
    'contacts' => 0,
    'contact' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5194c7f1a5ef68_01609101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5194c7f1a5ef68_01609101')) {function content_5194c7f1a5ef68_01609101($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/tools/smarty/plugins/modifier.escape.php';
?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Contact'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<div id="columns" class="content clearfix contact">
	<div class="bloc">
		<h1 class="green">Contact</h1>

		<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)){?>
			<p><?php echo smartyTranslate(array('s'=>'Your message has been successfully sent to our team.'),$_smarty_tpl);?>
</p>
			<ul class="footer_links">
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
"><img class="icon" alt="" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/home.gif"/></a><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
"><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
</a></li>
			</ul>
		<?php }elseif(isset($_smarty_tpl->tpl_vars['alreadySent']->value)){?>
			<p><?php echo smartyTranslate(array('s'=>'Your message has already been sent.'),$_smarty_tpl);?>
</p>
			<ul class="footer_links">
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
"><img class="icon" alt="" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/home.gif"/></a><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
"><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
</a></li>
			</ul>
		<?php }else{ ?>
		
			<p class="italic">Des questions ? Des remarques ? Contactez-nous ! Nous nous feront un plaisir de vous aider.</p>
			<div class="hat">
				<p class="faq">Mais avant cela, pensez à lire les <a href="#" title="questions fréquentes" class="green">questions fréquentes</a> ! Vous y trouverez toutes les réponses aux
				questions les plus fréquemment posées.</p>
			</div>
			<h2 class="bold">Vos questions restent sans réponses ?</h2>
			<p class="phone">Contactez-nous par téléphone : <span class="bold">09 72 33 16 42</span></p>
			<p class="mail">
				Ou remplissez le formulaire ci-dessous
				<span class="grey">Les champs suivis d'un astérisque (<span class="asterisque"> * </span>) sont obligatoires.</span>
			</p>
			<div class="warning"></div>
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			
			<form action="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['request_uri']->value, 'htmlall', 'UTF-8');?>
" method="post" enctype="multipart/form-data" id="form-contact" name="form-contact" novalidate>
				
				<label for="name">Nom <span class="asterisque">*</span></label>
				<input type="text" name="name" id="name" data-required="true" />
				<label for="firstname">Prénom <span class="asterisque">*</span></label>
				<input type="text" id="firstname" name="firstname" data-required="true" />
				
				<label for="email">Adresse e-mail <span class="asterisque">*</span></label>
				<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['email'])){?>
					<input type="text" id="email" name="from" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customerThread']->value['email'], 'htmlall', 'UTF-8');?>
" readonly="readonly" data-required="true" />
				<?php }else{ ?>
					<input type="text" id="email" name="from" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['email']->value, 'htmlall', 'UTF-8');?>
" data-required="true" />
				<?php }?>
				
				<?php if ((!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])||$_smarty_tpl->tpl_vars['customerThread']->value['id_order']>0)){?>
						<label for="id_order"><?php echo smartyTranslate(array('s'=>'Order Reference'),$_smarty_tpl);?>
</label>
						<?php if (!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&isset($_smarty_tpl->tpl_vars['isLogged']->value)&&$_smarty_tpl->tpl_vars['isLogged']->value==1){?>
							<select name="id_order" >
								<option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
								<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['order']->value['value']);?>
" <?php if (intval($_smarty_tpl->tpl_vars['order']->value['selected'])){?>selected="selected"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value['label'], 'htmlall', 'UTF-8');?>
</option>
								<?php } ?>
							</select>
						<?php }elseif(!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&!isset($_smarty_tpl->tpl_vars['isLogged']->value)){?>
							<input type="text" name="id_order" id="id_order" value="<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&$_smarty_tpl->tpl_vars['customerThread']->value['id_order']>0){?><?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order']);?>
<?php }else{ ?><?php if (isset($_POST['id_order'])){?><?php echo intval($_POST['id_order']);?>
<?php }?><?php }?>" />
						<?php }elseif($_smarty_tpl->tpl_vars['customerThread']->value['id_order']>0){?>
							<input type="text" name="id_order" id="id_order" value="<?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order']);?>
" readonly="readonly" />
						<?php }?>
				<?php }?>
				
				<div class="select">
					<label for="subject">Votre message concerne : <span class="asterisque">*</span></label>
					<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['id_contact'])){?>
						<?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['contact']->value['id_contact']==$_smarty_tpl->tpl_vars['customerThread']->value['id_contact']){?>
								<input type="text" id="contact_name" name="contact_name" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['contact']->value['name'], 'htmlall', 'UTF-8');?>
" readonly="readonly" />
								<input type="hidden" name="id_contact" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id_contact'];?>
" />
							<?php }?>
						<?php } ?>
					<?php }else{ ?>
						<select id="id_contact" name="id_contact" onchange="showElemFromSelect('id_contact', 'desc_contact')">
							<option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
							<?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
								<option value="<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
" <?php if (isset($_POST['id_contact'])&&$_POST['id_contact']==$_smarty_tpl->tpl_vars['contact']->value['id_contact']){?>selected="selected"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['contact']->value['name'], 'htmlall', 'UTF-8');?>
</option>
							<?php } ?>
						</select>
					<?php }?>
				</div>
				
				<label for="message">Votre message <span class="asterisque">*</span></label>
				<textarea id="message" name="message" data-required="true"><?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?><?php echo stripslashes(smarty_modifier_escape($_smarty_tpl->tpl_vars['message']->value, 'htmlall', 'UTF-8'));?>
<?php }?></textarea>
				
				<div class="action">
					<button type="submit" name="submitMessage" id="submitMessage" class="red-button gradient" onclick="$(this).hide();">Envoyer</button>
				</div>
			</form>
			
		<?php }?>
	</div>
</div>

<?php }} ?>