{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<script type="text/javascript">
// <![CDATA[
    ThickboxI18nClose = "{l s='Close' mod='referralprogram'}";
    ThickboxI18nOrEscKey = "{l s='or Esc key' mod='referralprogram'}";
    tb_pathToImage = "{$img_ps_dir}loadingAnimation.gif";
    //]]>
</script>

{capture name=path}<a href="{$link->getPageLink('my-account', true)}">{l s='My account' mod='referralprogram'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='Referral Program' mod='referralprogram'}{/capture}

<div id="columns" class="content clearfix">
    <div id="left_column">
        {include file=$tpl_dir|cat:"/account-left-col.tpl"}
    </div><!-- / #left_column -->
    <div id="center_column">
        <div class="big-bloc">
            <h1>{l s='Referral program' mod='referralprogram'}</h1>
            <hr />
            {if $error}
                <p class="error">
                    {if $error == 'conditions not valided'}
                        {l s='You need to agree to the conditions of the referral program!' mod='referralprogram'}
                    {elseif $error == 'email invalid'}
                        {l s='At least one e-mail address is invalid!' mod='referralprogram'}
                    {elseif $error == 'name invalid'}
                        {l s='At least one first name or last name is invalid!' mod='referralprogram'}
                    {elseif $error == 'email exists'}
                        {l s='Someone with this e-mail address has already been sponsored!' mod='referralprogram'}: {foreach from=$mails_exists item=mail}{$mail} {/foreach}
                    {elseif $error == 'no revive checked'}
                        {l s='Please mark at least one checkbox' mod='referralprogram'}
                    {elseif $error == 'cannot add friends'}
                        {l s='Cannot add friends to database' mod='referralprogram'}
                    {/if}
                </p>
            {/if}

            {if $invitation_sent}
                <p class="success">
                {if $nbInvitation > 1}
                    {l s='E-mails have been sent to your friends!' mod='referralprogram'}
                {else}
                    {l s='An e-mail has been sent to your friend!' mod='referralprogram'}
                {/if}
                </p>
            {/if}

            {if $revive_sent}
                <p class="success">
                {if $nbRevive > 1}
                    {l s='Reminder e-mails have been sent to your friends!' mod='referralprogram'}
                {else}
                    {l s='A reminder e-mail has been sent to your friend!' mod='referralprogram'}
                {/if}
                </p>
            {/if}

            <ul class="menu_parrainage clearfix">
                <li class="parrainage_active" id="first_li">{l s='Sponsor my friends' mod='referralprogram'}</li>
                <li id="second_li">{l s='Pending friends' mod='referralprogram'}</li>
                <li id="third_li">{l s='Friends I sponsored' mod='referralprogram'}</li>
            </ul>

            <div class="conteneur_blocs_parrainge">
                <div class="parrainage_bloc_first_li">
                    <p>Pour parrainer vos amis, <strong>saisisez leur nom, prénom et adresse e-mail</strong> dans le formulaire ci-dessous.<br>Ils recevront un e-mail les invitant à découvrir les Colis du Boucher.</p>
                    <p>A chaque fois qu'un de vos filleuls passera une première commande, vous aurez un crédit de {$discount} à valoir sur votre prochain achat!</p>
                    {if $canSendInvitations}
                    <form method="post" action="{$link->getModuleLink('referralprogram', 'program', [], true)}" >
                        <table>
                            {section name=friends start=0 loop=$nbFriends step=1}
                            <tr>
                                <td class="friendsLastName">
                                    <label for="friendsLastName[{$smarty.section.friends.index}]">{l s='Last name' mod='referralprogram'}</label>
                                    <input type="text" class="text" name="friendsLastName[{$smarty.section.friends.index}]" id="friendsLastName[{$smarty.section.friends.index}]" value="{if isset($smarty.post.friendsLastName[$smarty.section.friends.index])}{$smarty.post.friendsLastName[$smarty.section.friends.index]|escape:'htmlall':'UTF-8'}{/if}" />
                                </td>
                                <td class="friendsFirstName">
                                    <label for="friendsFirstName[{$smarty.section.friends.index}]">{l s='First name' mod='referralprogram'}</label>
                                    <input type="text" class="text" name="friendsFirstName[{$smarty.section.friends.index}]" id="friendsFirstName[{$smarty.section.friends.index}]" value="{if isset($smarty.post.friendsFirstName[$smarty.section.friends.index])}{$smarty.post.friendsFirstName[$smarty.section.friends.index]|escape:'htmlall':'UTF-8'}{/if}" />
                                </td>
                                <td class="friendsEmail">
                                    <label for="friendsEmail[{$smarty.section.friends.index}]">{l s='E-mail' mod='referralprogram'}</label>
                                    <input type="text" class="text" name="friendsEmail[{$smarty.section.friends.index}]" id="friendsEmail[{$smarty.section.friends.index}]" value="{if isset($smarty.post.friendsEmail[$smarty.section.friends.index])}{$smarty.post.friendsEmail[$smarty.section.friends.index]|escape:'htmlall':'UTF-8'}{/if}" />
                                </td>
                            </tr>
                            {/section}
                        </table>
                        <p class="clear_both"><strong>Important :</strong> Les e-mails de vos amis ne seront jamais utilisés à d'autres fins que celles de notre programme.</p>
                        <p><label class="checkbox" for="conditionsValided"><input type="checkbox" name="conditionsValided" id="conditionsValided" value="1" {if isset($smarty.post.conditionsValided) AND $smarty.post.conditionsValided eq 1}checked="checked"{/if} />{l s='I agree to the terms of service and adhere to them unconditionally.' mod='referralprogram'}</label> <span class="lien_vert"><a href="{$link->getModuleLink('referralprogram', 'rules', ['height' => '500', 'width' => '400'], true)}" title="{l s='Conditions of the referral program' mod='referralprogram'}">{l s='Read conditions.' mod='referralprogram'}</a></span></p>
                        <p>{l s='Preview' mod='referralprogram'}{assign var="file" value="{$lang_iso}/referralprogram-invitation.html"} <span class="lien_vert"><a href="{$link->getModuleLink('referralprogram', 'email', ['height' => '500', 'width' => '600', 'mail' => {$file}], true)}" class="thickbox" title="{l s='Invitation e-mail' mod='referralprogram'}">{l s='the default e-mail' mod='referralprogram'}</a></span> {l s='that will be sent to your friend(s).' mod='referralprogram'}</p>
                        <p id="parrainage_submit"><input class="red-button gradient" type="submit" value="ENVOYER LES INVITATIONS" id="submitSponsorFriends" name="submitSponsorFriends"  /></p>
                    </form>
                    {else}
                        <p class="warning">
                            {l s='To become a sponsor, you need to have completed at least' mod='referralprogram'} {$orderQuantity} {if $orderQuantity > 1}{l s='orders' mod='referralprogram'}{else}{l s='order' mod='referralprogram'}{/if}.
                        </p>
                    {/if}
                </div>
                <div class="parrainage_bloc_second_li">
                    {if $pendingFriends AND $pendingFriends|@count > 0}
                    <p>{l s='These friends have not yet placed an order on this Website since you sponsored them, but you can try again! To do so, mark the checkboxes of the friend(s) you want to remind, then click on the button "Remind my friend(s)"' mod='referralprogram'}</p>
                    <form method="post" action="{$link->getModuleLink('referralprogram', 'program', [], true)}">
                        <table id="table_relancer_amis">
                            <thead>
                                <tr>
                                    <th class="first_row">&nbsp;</td>
                                    <th class="second_row">{l s='Last name' mod='referralprogram'}</td>
                                    <th class="third_row">{l s='First name' mod='referralprogram'}</td>
                                    <th class="fourth_row">{l s='E-mail' mod='referralprogram'}</td>
                                    <th class="last_row">{l s='Last invitation' mod='referralprogram'}</td>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach from=$pendingFriends item=pendingFriend name=myLoop}
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                        <input type="checkbox" name="friendChecked[{$pendingFriend.id_referralprogram}]" id="friendChecked[{$pendingFriend.id_referralprogram}]" value="1" />
                                        </label>
                                    </td>
                                    <td>
                                        <label for="friendChecked[{$pendingFriend.id_referralprogram}]">{$pendingFriend.lastname|substr:0:22}</label>
                                    </td>
                                    <td>{$pendingFriend.firstname|substr:0:22}</td>
                                    <td>{$pendingFriend.email}</td>
                                    <td>{dateFormat date=$pendingFriend.date_upd}</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        <p id="relancer_amis_submit"><input class="red-button gradient" type="submit" value="RELANCER MES AMIS" name="revive" id="revive"/></p>
                    </form>
                    {else}
                        <p class="warning">{l s='You have not sponsored any friends.' mod='referralprogram'}</p>
                    {/if}
                </div>
                <div class="parrainage_bloc_third_li">
                    {if $subscribeFriends AND $subscribeFriends|@count > 0}
                    <p>{l s='Here are sponsored friends who have accepted your invitation:' mod='referralprogram'}<br />Suivez leur statut et retrouvez vos crédits dans <span class="lien_vert"><a title="Mes réductions" href="/index.php?controller=discount">Mes réductions</a></span>.</p>
                    <table id="table_amis_parraines">
                        <thead>
                            <tr>
                                <th class="first_row">{l s='Last name' mod='referralprogram'}</td>
                                <th class="second_row">{l s='First name' mod='referralprogram'}</td>
                                <th class="third_row">{l s='E-mail' mod='referralprogram'}</td>
                                <th class="fourth_row">{l s='Inscription date' mod='referralprogram'}</td>
                                <th class="last_row">Statut</td>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$subscribeFriends item=subscribeFriend name=myLoop}
                            <tr>
                                <td>{$subscribeFriend.lastname|substr:0:22}</td>
                                <td>{$subscribeFriend.firstname|substr:0:22}</td>
                                <td>{$subscribeFriend.email}</td>
                                <td>{dateFormat date=$subscribeFriend.date_upd}</td>
                                <td>Première commande effectuée<br>Crédit de 7€ à utiliser</td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>
                    {else}
                        <p class="warning">
                            {l s='No sponsored friends have accepted your invitation yet.' mod='referralprogram'}
                        </p>
                    {/if}
                </div>
            </div>
        </div>
    </div><!-- / #center_column -->
</div><!-- / .content -->



