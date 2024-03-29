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
		<img ng-src="{{profile.avatar || ''}}" class="img-circle user-avatar ">
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
		<a href="<?php  echo url('user/edit/edit_account_dateline', array('uid' => $_GPC['uid']))?>" class="btn btn-default active">账号使用期限</a>
		<a href="<?php  echo url('user/edit/edit_account', array('uid' => $_GPC['uid']))?>" class="btn btn-default">使用账号列表</a>
		<?php  } else { ?>
		
		<a href="<?php  echo url('founder/edit/edit_account', array('uid' => $_GPC['uid']))?>" class="btn btn-default active">使用账号列表</a>

		<a href="<?php  echo url('user/edit/edit_create_account_list', array('uid' => $_GPC['uid']))?>" class="btn btn-default active">账号创建权限</a>
		<a href="<?php  echo url('user/edit/edit_account_dateline', array('uid' => $_GPC['uid']))?>" class="btn btn-default ">账号使用期限</a>
		<a href="<?php  echo url('founder/edit/edit_modules_tpl', array('uid' => $_GPC['uid']))?>" class="btn btn-default">应用模板权限</a>
		
		<?php  } ?>
	</div>
	<table class="table we7-table ">
		<tr>
			<th>账户使用期限</th>
			<th class="text-left">总有效天数：<?php  echo $total_timelimit;?></th>
			<th class="text-right">有效期至：<?php  echo $endtime;?></th>
		</tr>
		<tr>
			<td>所属用户组：{{ group_info.name }}</td>
			<td class="text-left">有 效 天 数：{{ group_info.timelimit  == 0 || !group_info ? '永久' : group_info.timelimit }} </td>
			<td class="text-right">
				<a href="#group" class="color-default" data-toggle="modal" data-target="#group">修改</a>
			</td>
		</tr>
		<tr>
			<td>附加权限</td>
			<td class="text-left">有 效 天 数：{{ extra_limit_info.timelimit * 1 }} </td>
			<td class="text-right">
				<a href="#date" class="color-default" data-toggle="modal" data-target="#date" >修改</a>
			</td>
		</tr>
	</table>
	<div class="modal fade" id="group" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">应用权限组</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<select class="we7-select" ng-model="groupid">
							<option value="">请选择所属用户组</option>
							<option ng-value="group.id" ng-repeat="group in groups" ng-selected="group.id == group_info.id" ng-bind="group.name"></option>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="changeGroup()">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="date" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">附加天数</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" ng-change="changeTime()" ng-model="extra_limit_info.timelimit">
							<div class="input-group-addon"  we7-date-range-picker ng-model="dateRange" enabletimepicker={{datePickerConfig}}>
								<i class="fa fa-calendar"></i>	选择日期
							</div>
						</div>
					</div>
					<div class="text-center color-gray">
						到期时间：{{group_info && group_info.timelimit ? dateRange.startDate : '永久'}}
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="chageExtraTimelimit()" >确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	require(['daterangepicker'], function() {
		angular.module('userManageApp').value('config', {
			user: <?php echo !empty($user) ? json_encode($user) : 'null'?>,
			profile: <?php echo !empty($profile) ? json_encode($profile) : 'null'?>,
			group_info: <?php echo !empty($group_info) ? json_encode($group_info) : 'null'?>,
			extra_limit_info: <?php echo !empty($extra_limit_info) ? json_encode($extra_limit_info) : 'null'?>,

			groups: <?php echo !empty($groups) ? json_encode($groups) : 'null'?>,
			links: {
				recycleUser: "<?php  echo url('user/display/operate', array('type' => 'recycle'))?>",
				editUserGroup: "<?php  echo url('user/edit/edit_user_group', array('uid' => $uid))?>",
				chageExtraTimelimit: "<?php  echo url('user/edit/edit_user_extra_limit', array('uid' => $uid))?>",
			},
		});
		angular.bootstrap($('#js-user-edit-account'), ['userManageApp']);
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>