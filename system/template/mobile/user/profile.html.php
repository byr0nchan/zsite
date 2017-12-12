{*php
/**
 * The profile view file of user for mobile template of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     user
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
{!js::import($control->config->webRoot . 'js/fingerprint/fingerprint.js')}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'user', 'side')}
<table class="table table-layout">
  <tbody>
    <tr>
      <td colspan='2'><strong><i class='icon icon-user'></i> {!echo $lang->user->profile?></strong></td>
    </tr>
    <tr>
      <th>{$lang->user->realname}</th>
      <td>
        {$user->realname}
        {if(isset($user->provider) and isset($user->openID) and strpos($user->account, "{$user->provider}_") === false)}
          <span class='bg-info-pale text-info'>{!echo $lang->user->oauth->typeList[$user->provider]}</span>
        {/if}
      </td>
    </tr>
    <tr>
      <th>{!echo $lang->user->email}</th>
      <td>{if(!empty($user->email)) echo str2Entity($user->email)}</td>
    </tr>
    <tr>
      <th>{!echo $lang->user->company}</th>
      <td>{!echo $user->company}</td>
    </tr>
    <tr>
      <th>{!echo $lang->user->address}</th>
      <td>{!echo $user->address}</td>
    </tr>
    <tr>
      <th>{!echo $lang->user->zipcode}</th>
      <td>{!echo $user->zipcode}</td>
    </tr>
    <tr>
      <th>{!echo $lang->user->mobile}</th>
      <td>{!echo str2Entity($user->mobile)}</td>
    </tr>
    <tr>
      <th>{!echo $lang->user->phone}</th>
      <td>{!echo str2Entity($user->phone)}</td>
    </tr>
    <tr>
      <th>{!echo $lang->user->qq}</th>
      <td>{!echo str2Entity($user->qq)}</td>
    </tr>
    <tr>
      <th>{!echo $lang->user->gtalk}</th>
      <td>{!echo $user->gtalk}</td>
    </tr>
    <tr>
      <td colspan='2'>
        <div class='row'>
          <div class='col-6'>{!echo html::a(inlink('edit'), "<i class='icon-pencil'></i> " . $lang->user->editProfile, "class='btn block primary' data-toggle='modal'")}</div>
          <div class='col-6'>{!echo html::a(inlink('setemail'), "<i class='icon-envelope'></i> " . $lang->user->setEmail, "class='btn block primary' data-toggle='modal'")}</div>
          {if(isset($user->provider) and isset($user->openID))}
          {if(strpos($user->account, "{$user->provider}_") === false)}
          <div class='col-6'>{!echo html::a(inlink('oauthUnbind', "account=$user->account&provider=$user->provider&openID=$user->openID"), "<i class='icon-unlink'></i> " . $lang->user->oauth->lblUnbind, "class='btn block primary ajaxaction jsoner'")}</div>
          {else}
          <br>
          <div class='col-6'>{!echo html::a(inlink('oauthRegister'), "<i class='icon-link'></i> " . $lang->user->oauth->lblProfile, "class='btn block primary'")}</div>
          <div class='col-6'>{!echo html::a(inlink('oauthBind'), "<i class='icon-link'></i> " . $lang->user->oauth->lblBind, "class='btn block primary'")}</div>
          {/if}
          {/if}
        </div>
      </td>
    </tr>
  </tbody>
</table>

{include TPL_ROOT . 'common/form.html.php'}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
