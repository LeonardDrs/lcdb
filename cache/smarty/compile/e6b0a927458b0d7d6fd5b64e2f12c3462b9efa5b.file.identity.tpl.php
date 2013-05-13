<?php /* Smarty version Smarty-3.1.8, created on 2013-05-12 22:55:03
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/identity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:836902727519001a763c628-72121165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6b0a927458b0d7d6fd5b64e2f12c3462b9efa5b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/project/lcdb/themes/lcdb_theme/identity.tpl',
      1 => 1367357011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '836902727519001a763c628-72121165',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'confirmation' => 0,
    'pwd_changed' => 0,
    'email' => 0,
    'genders' => 0,
    'gender' => 0,
    'days' => 0,
    'v' => 0,
    'sl_day' => 0,
    'months' => 0,
    'k' => 0,
    'sl_month' => 0,
    'years' => 0,
    'sl_year' => 0,
    'newsletter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519001a77f7189_31784238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519001a77f7189_31784238')) {function content_519001a77f7189_31784238($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
"><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'Your personal information'),$_smarty_tpl);?>
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
			<h1>Mes informations</h1>
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			
			<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value){?>
				<p class="success">
					<?php echo smartyTranslate(array('s'=>'Your personal information has been successfully updated.'),$_smarty_tpl);?>

					<?php if (isset($_smarty_tpl->tpl_vars['pwd_changed']->value)){?><br /><?php echo smartyTranslate(array('s'=>'Your password has been sent to your e-mail:'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
<?php }?>
				</p>
			<?php }else{ ?>
				
				<p>N'hésitez pas à modifier vos informations personnelles si celles-ci ont changé.</p>
				<br>
				<p>Les champs suivis d'un astérisque (<span class="asterisque_rouge">*</span>) sont obligatoires.</p>
				<hr />
				<form  action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true);?>
" method="post" class="mes_informations">
					<p class="labels_infos">Civilité (<span class="asterisque_rouge">*</span>)</p>
					<?php  $_smarty_tpl->tpl_vars['gender'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gender']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['genders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gender']->key => $_smarty_tpl->tpl_vars['gender']->value){
$_smarty_tpl->tpl_vars['gender']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['gender']->key;
?>
						<label class="checkbox" for="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
"><input type="radio" name="id_gender" id="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
" value="<?php echo intval($_smarty_tpl->tpl_vars['gender']->value->id);?>
" <?php if (isset($_POST['id_gender'])&&$_POST['id_gender']==$_smarty_tpl->tpl_vars['gender']->value->id){?>checked="checked"<?php }?> />
							<?php echo $_smarty_tpl->tpl_vars['gender']->value->name;?>

						</label>
					<?php } ?>
					<p class="labels_infos">
						<label for="prenom">Prénom (<span class="asterisque_rouge">*</span>)</label>
					</p>
					<input type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname'];?>
" />
					<p class="labels_infos">
						<label for="nom">Nom (<span class="asterisque_rouge">*</span>)</label>
					</p>
					<input type="text" name="lastname" id="lastname" value="<?php echo $_POST['lastname'];?>
" />
					<p class="select">
						<label><?php echo smartyTranslate(array('s'=>'Date of Birth'),$_smarty_tpl);?>
</label>
						<select name="days" id="days">
							<option value="">-</option>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_day']->value==$_smarty_tpl->tpl_vars['v']->value)){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&nbsp;&nbsp;</option>
							<?php } ?>
						</select>
						
						<select id="months" name="months">
							<option value="">-</option>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['months']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_month']->value==$_smarty_tpl->tpl_vars['k']->value)){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
&nbsp;</option>
							<?php } ?>
						</select>
						<select id="years" name="years">
							<option value="">-</option>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_year']->value==$_smarty_tpl->tpl_vars['v']->value)){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&nbsp;&nbsp;</option>
							<?php } ?>
						</select>
					</p>
					<p class="labels_infos">
						<label for="mail">E-mail (<span class="asterisque_rouge">*</span>)</label>
					</p>
					<input type="text" name="email" id="email" value="<?php echo $_POST['email'];?>
" />
					<p class="labels_infos">
						<label for="old_password">Mot de passe actuel (<span class="asterisque_rouge">*</span>)</label>
					</p>
					<input type="password" name="old_passwd" id="old_passwd" />
					<p class="labels_infos">
						<label for="new_password">Nouveau mot de passe (<span class="asterisque_rouge">*</span>)</label>
					</p>
					<input type="password" name="passwd" id="passwd" />
					<p class="labels_infos">
						<label for="confirm_password">Confirmation (<span class="asterisque_rouge">*</span>)</label>
					</p>
					<input type="password" name="confirmation" id="confirmation" />
					<?php if ($_smarty_tpl->tpl_vars['newsletter']->value){?>
						<p class="checkbox">
							<input type="checkbox" id="newsletter" name="newsletter" value="1" <?php if (isset($_POST['newsletter'])&&$_POST['newsletter']==1){?> checked="checked"<?php }?> />
							<label for="newsletter"><?php echo smartyTranslate(array('s'=>'Sign up for our newsletter'),$_smarty_tpl);?>
</label>
						</p>
						<p class="labels_infos">J'accepte de recevoir par e-mail des offres, anecdotes<br>de la part des Colis du Boucher (<span class="asterisque_rouge">*</span>)<br/><span class="label_italique">Les informations vous concernant ne seront jamais vendues,<br>louées ou cédées à des tiers</span></p>
						<label class="checkbox" for="newsletter_oui"><input type="checkbox" id="newsletter_oui" />Oui</label>
						<label class="checkbox label_radio" for="newsletter_non"><input type="checkbox" id="newsletter_non" />Non</label>
					<?php }?>
					<br/><br/>
					<hr />
					<input class="red-button gradient" type="submit" value="VALIDER MES INFORMATIONS" id="informations_submit"  name="submitIdentity" />
					<p id="security_informations">
						<?php echo smartyTranslate(array('s'=>'[Insert customer data privacy clause or law here, if applicable]'),$_smarty_tpl);?>

					</p>
				</form>
			<?php }?>
		</div>
	</div><!-- / #center_column -->
	
</div><!-- / .content --><?php }} ?>