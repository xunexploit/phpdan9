<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(empty($user['founder_groupid'])) { ?>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo url('user/display');?>"><i class="wi wi-back-circlewi wi-back-circle"></i> </a>
	<li><a href="<?php  echo url('user/display');?>">用户管理</a></li>
	<li>编辑用户详情</li>
</ol>
<?php  } else { ?>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo url('founder/display');?>"><i class="wi wi-back-circlewi wi-back-circle"></i> </a>
	<li><a href="<?php  echo url('founder/display');?>">副创始人管理</a></li>
	<li>编辑副创始人详情</li>
</ol>
<?php  } ?>
<div id="js-user-edit-account" ng-controller="UserEditAccount" ng-cloak>
	<div class="user-head-info" >
		<img ng-src="{{profile.avatar || ''}}" class="img-circle user-avatar">
		<div class="info">
			<h3 class="title" ng-bind="user.username"></h3>
		</div>
		
		<?php  if($user['founder_groupid'] != ACCOUNT_MANAGE_GROUP_VICE_FOUNDER) { ?>
		<a href="javascript:;" class="btn btn-primary" ng-click="recycleUser()">禁用</a>
		<?php  } ?>
		
	</div>
	<div class="btn-group we7-btn-group we7-padding-bottom">
		<a href="<?php  echo url('user/edit/edit_base', array('uid' => $_GPC['uid']))?>" class="btn btn-default">基础信息</a>
		<?php  if(empty($user['founder_groupid'])) { ?>
		<a href="<?php  echo url('user/edit/edit_modules_tpl', array('uid' => $_GPC['uid']))?>" class="btn btn-default">应用模板权限</a>

		<a href="<?php  echo url('user/edit/edit_create_account_list', array('uid' => $_GPC['uid']))?>" class="btn btn-default ">账号创建权限</a>
		<a href="<?php  echo url('user/edit/edit_account_dateline', array('uid' => $_GPC['uid']))?>" class="btn btn-default ">账号使用期限</a>
		<a href="<?php  echo url('user/edit/edit_account', array('uid' => $_GPC['uid']))?>" class="btn btn-default active">使用账号列表</a>
		<?php  } else { ?>
		
		<a href="<?php  echo url('founder/edit/edit_account', array('uid' => $_GPC['uid']))?>" class="btn btn-default active">使用账号列表</a>
		<a href="<?php  echo url('founder/edit/edit_modules_tpl', array('uid' => $_GPC['uid']))?>" class="btn btn-default">应用模板权限</a>
		
		<?php  } ?>
	</div>
	<table class="table we7-table table-hover vertical-middle">
		<col width="70px"/>
		<col width="400px"/>
		<col />
		<col width="240px"/>
		<tr>
			<th colspan="2" class="text-left">可使用的账号</th>
			<th></th>
			<th class="text-right">操作</th>
		</tr>

		<tr ng-repeat="account in account_list" ng-if="account_list">
			<td class="text-left"><img ng-src="{{account.thumb}}" class="img-responsive account-img__list"/></td>
			<td class="text-left">
				<p ng-bind="account.name"></p>
				<span class="color-gray" ng-if="account.type_name == 'wechats'">
					<i class="wi wi-account"></i>
					<span ng-if="wechat.level == 1">普通订阅号</span>
					<span ng-if="wechat.level == 2">普通服务号</span>
					<span ng-if="wechat.level == 3">认证订阅号</span>
					<span ng-if="wechat.level == 4">认证服务号/认证媒体/政府订阅号</span>
				</span>

				<span class="color-gray" >
					<i class="wi wi-{{we7TypeDefault[account.type_name]['icon']}}"></i>
					<span >{{we7TypeDefault[account.type_name]['name']}}</span>
				</span>
			</td>
			<td>
				<span ng-if="account.role == 'founder'">创始人</span>
				
				<span ng-if="account.role == 'vice_founder'">副创始人</span>
				
				<span ng-if="account.role == 'owner'">主管理员</span>
				<span ng-if="account.role == 'manager'">管理员</span>
				<span ng-if="account.role == 'operator'"  class="label-versions">操作员</span>
				<span ng-if="account.role == 'clerk'">应用操作员</span>
			</td>
			<td>
				<div class="link-group">
					<a ng-href="./index.php?c=account&a=post&do=base&uniacid={{account.uniacid}}&acid={{account.acid}}&account_type={{account.type}}" class="color-default">设置</a>
					<a ng-href="./index.php?c=account&a=post-user&do=edit&uniacid={{account.uniacid}}&acid={{account.acid}}&account_type={{account.type}}" class="color-default">操作员设置</a>
				</div>
			</td>
		</tr>
		<tr ng-if="!account_list">
			<td colspan="100">
				<div class="we7-empty-block">
					暂无可使用账号
				</div>
			</td>
		</tr>
	</table>
</div>
<script>
	require(['daterangepicker'], function() {
		angular.module('userManageApp').value('config', {
			user: <?php echo !empty($user) ? json_encode($user) : 'null'?>,
			account_list : <?php echo !empty($account_list) ? json_encode($account_list) : 'null'?>,
			profile: <?php echo !empty($profile) ? json_encode($profile) : 'null'?>,
			links: {
				recycleUser: "<?php  echo url('user/display/operate', array('type' => 'recycle'))?>",
			},
		});
		angular.bootstrap($('#js-user-edit-account'), ['userManageApp']);
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>