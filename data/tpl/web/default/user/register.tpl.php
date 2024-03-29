<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<script>
	$('#form1').submit(function(){
		if ($.trim($(':text[name="username"]').val()) == '') {
			util.message('没有输入用户名.', '', 'error');
			return false;
		}
		if ($('#password').val() == '') {
			util.message('没有输入密码.', '', 'error');
			return false;
		}
		if ($('#password').val() != $('#repassword').val()) {
			util.message('两次输入的密码不一致.', '', 'error');
			return false;
		}
		/* 		<?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>
		<?php  if($item['required']) { ?>
		if (!$.trim($('[name="<?php  echo $item['field'];?>"]').val())) {
		util.message('<?php  echo $item['title'];?>为必填项，请返回修改！', '', 'error');
		return false;
		}
		<?php  } ?>
		<?php  } } ?>
		*/
		<?php  if($_W['setting']['register']['code']) { ?>
		if ($.trim($(':text[name="code"]').val()) == '') {
			util.message('没有输入验证码.', '', 'error');
			return false;
		}
		<?php  } ?>
		});
	var h = document.documentElement.clientHeight;
	$(".login").css('min-height',h);
</script>
<div class="head">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php  echo $_W['siteroot'];?>">
					<img src="<?php  if(!empty($_W['setting']['copyright']['flogo'])) { ?><?php  echo to_global_media($_W['setting']['copyright']['flogo'])?><?php  } else { ?>./resource/images/logo/login-logo.png<?php  } ?>" class="logo" style="100%">
				</a>
			</div>
		</div>
	</nav>
</div>
<div class="main">
	<div class="register" style="">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="title register-nav">
					<?php  if(!empty($_W['setting']['register']['open'])) { ?>
					<a href="<?php  echo url('user/register', array('register_type' => 'system', 'owner_uid' => $_GPC['owner_uid'], 'type' => $user_type, 'm' => $_GPC['m'], 'redirect' => $_GPC['redirect']))?>" <?php  if($_GPC['register_type'] == 'system' || empty($_GPC['register_type'])) { ?>class="active"<?php  } ?>>用户名密码</a>
					<?php  } ?>
					<?php  if(!empty($_W['setting']['copyright']['mobile_status'])) { ?>
					<a href="<?php  echo url('user/register', array('register_type' => 'mobile', 'owner_uid' => $_GPC['owner_uid'], 'type' => $user_type, 'm' => $_GPC['m'], 'redirect' => $_GPC['redirect']))?>" <?php  if($_GPC['register_type'] == 'mobile') { ?>class="active"<?php  } ?>>手机注册</a>
					<?php  } ?>
				</div>

				<?php  if(!empty($_W['setting']['register']['open'])) { ?>
				<?php  if($_GPC['register_type'] == 'system' || empty($_GPC['register_type'])) { ?>
				<form action="" class="we7-form register-mobile" method="post" role="form" id="form1" ng-controller="UserRegisterSystem" ng-cloak>
					<?php  if($user_type == USER_TYPE_CLERK) { ?>
					<input type="hidden" name="type" value="<?php echo USER_TYPE_CLERK;?>"/>
					<?php  } ?>
					<div class="form-group" ng-class="{true:'has-error has-feedback',false:'has-success has-feedback'}[usernameErr]">
						<label class="control-label col-sm-1">用户名:<span class="color-red">*</span></label>
						<div class="col-sm-11">
							<input name="username" type="text" class="form-control" placeholder="请输入<?php  if($user_type == USER_TYPE_CLERK) { ?>应用操作员<?php  } ?>用户名" ng-model="username" ng-blur="checkUsername()" required>
							<span ng-class="{true:'fa fa-times form-control-feedback reg-system-valid',false:'fa fa-check form-control-feedback reg-system-valid'}[usernameErr]" aria-hidden="true"></span>
							<span ng-class="{true:'color-red',false:'sr-only'}[usernameErr]" ng-bind="usernameMsg"></span>
						</div>
					</div>

					<div class="form-group" ng-class="{true:'has-error has-feedback',false:'has-success has-feedback'}[passwordErr]">
						<label class="control-label col-sm-1">密码:<span class="color-red">*</span></label>
						<div class="col-sm-11">
							<input name="password" type="password" id="password" class="form-control col-sm-10" placeholder="请输入不少于8位的密码" ng-model="password" ng-blur="checkPassword()" required>
							<span ng-class="{true:'fa fa-times form-control-feedback reg-system-valid',false:'fa fa-check form-control-feedback reg-system-valid'}[passwordErr]" aria-hidden="true"></span>
							<span ng-class="{true:'color-red',false:'sr-only'}[passwordErr]" ng-bind="passwordMsg"></span>
						</div>
					</div>

					<div class="form-group" ng-class="{true:'has-error has-feedback',false:'has-success has-feedback'}[repasswordErr]">
						<label class="control-label col-sm-1">确认密码:<span class="color-red">*</span></label>
						<div class="col-sm-11">
							<input name="password " type="password" id="repassword" class="form-control col-sm-10" placeholder="请再次输入不少于8位的密码" ng-blur="checkRepassword()" ng-model="repassword" required>
							<span ng-class="{true:'fa fa-times form-control-feedback reg-system-valid',false:'fa fa-check form-control-feedback reg-system-valid'}[repasswordErr]" aria-hidden="true"></span>
							<span ng-class="{true:'color-red',false:'sr-only'}[repasswordErr]" ng-bind="repasswordMsg"></span>
						</div>
					</div>

					<!--用户注册拓展字段 end -->
					<?php  if($extendfields) { ?>
						<?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>
							<div class="form-group">
								<label class="control-label col-sm-1"><?php  echo $item['title'];?>:<?php  if($item['required']) { ?><span class="color-red">*</span><?php  } ?></label>
								<div class="col-sm-11">
									<?php  echo tpl_fans_form($item['field'])?>
								</div>
							</div>
						<?php  } } ?>
					<?php  } ?>

					<?php  if($_W['setting']['register']['code']) { ?>
					<div class="form-group">
						<label class="control-label col-sm-1">验证码:<span class="color-red">*</span></label>
						<div class="col-sm-11">
							<div class="input-group">
								<input name="code" type="text" class="form-control" placeholder="请输入验证码" ng-blur="checkCode()" ng-model="code">
								<a href="javascript:;" class="input-group-btn imgverify" ng-click="changeVerify()"><img ng-src="{{image}}" style="height: 32px;"/></a>
							</div>
							<span ng-class="{true:'color-red',false:'sr-only'}[codeErr]" ng-bind="codeMsg"></span>
						</div>
					</div>
					<?php  } ?>

					<div class="login-submit text-center">
						<input type="submit" name="submit" value="注册" class="btn btn-primary" ng-disabled="usernameInvalid || passwordInvalid || repasswordInvalid"/>
						<a href="<?php  echo url('user/login');?>" class="btn btn-default">登录</a>
						<input name="token" value="<?php  echo $_W['token'];?>" type="hidden"/>
						<input name="owner_uid" value="<?php  echo $_GPC['owner_uid'];?>" type="hidden"/>
						<input name="register_type" value="" type="hidden"/>
						<input name="do" value="register" type="hidden"/>
					</div>
				</form>
				<?php  } ?>
				<?php  } ?>
				<!--div class="form-group">
					<label>邀请码:<span style="color:red">*</span></label>
					<input name="invitation" type="text" class="form-control" placeholder="请输入邀请码">
				</div-->
				<?php  if(!empty($_W['setting']['copyright']['mobile_status'])) { ?>
				<?php  if($_GPC['register_type'] == 'mobile') { ?>
				<form action="javascript:;" class="we7-form">
					<div class="register-mobile" ng-controller="UsersRegisterMobile" ng-cloak>
						<div class="form-group">
							<label class="control-label col-sm-2">手机号:<span class="color-red">*</span></label>
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="请输入常用手机号" ng-model="mobile">
									<a href="javascript:;" class="input-group-btn">
										<!--<button class="btn btn-primary">发送验证码</button>-->
										<input type="button" class="btn btn-primary send-code" ng-disabled="isDisable" ng-click="sendMessage()" value="{{text}}">
									</a>
								</div>
							</div>
						</div>

						<button style="display:none;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#imageCode" >开始演示模态框</button>
						<div class="modal fade" id="imageCode" role="dialog" >
							<div class="we7-modal-dialog modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<div class="modal-title">输入图形验证码</div>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<div class="input-group">
												<input ng-model="imagecode" type="text" class="form-control" placeholder="请输入图形验证码">
												<a href="javascript:;" class="input-group-btn imgverify" ng-click="changeVerify()">
													<img ng-src="{{image}}" style="height: 32px;"/>
												</a>
											</div>
											<span ng-class="{true:'color-red',false:'sr-only'}[imagecodeErr]" ng-bind="imagecodeMsg"></span>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" ng-click="sendMessage()">发送短信验证码</button>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">输入验证码:<span class="color-red">*</span></label>
							<div class="col-sm-10">
								<input ng-model='smscode' type="text" class="form-control" placeholder="请输入手机验证码">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">密码:<span class="color-red">*</span></label>
							<div class="col-sm-10">
								<input ng-model="password" type="password" class="form-control" placeholder="请输入不少于8位的密码" ng-blur="checkPassword()">
								<span ng-class="{true:'fa fa-times form-control-feedback color-red reg-system-valid',false:'fa fa-check form-control-feedback color-green reg-system-valid'}[passwordErr]" aria-hidden="true"></span>
								<span ng-class="{true:'color-red',false:'sr-only'}[passwordErr]" ng-bind="passwordMsg"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">确认密码:<span class="color-red">*</span></label>
							<div class="col-sm-10">
								<input ng-model="repassword" type="password" class="form-control" placeholder="请再次输入密码" ng-blur="checkRepassword()">
								<span ng-class="{true:'fa fa-times form-control-feedback color-red reg-system-valid',false:'fa fa-check form-control-feedback color-green reg-system-valid'}[repasswordErr]" aria-hidden="true"></span>
								<span ng-class="{true:'color-red',false:'sr-only'}[repasswordErr]" ng-bind="repasswordMsg"></span>
							</div>
						</div>
						<div class="login-submit text-center">
							<input type="submit" ng-click="register()" value="注册" class="btn btn-primary" />
							<a href="<?php  echo url('user/login');?>" class="btn btn-default">登录</a>
						</div>
					</div>
				</form>
				<?php  } ?>
				<?php  } ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	angular.module('userManageApp').value('config', {
		'owner_uid': "<?php echo !empty($owner_uid) ? $owner_uid : 0?>",
		'register_type': "<?php echo !empty($register_type) ? $register_type : 0?>",
		'register_sign': "<?php echo !empty($register_sign) ? $register_sign : 'null'?>",
		'image': "<?php  echo url('utility/code')?>",
		'password_safe': "<?php  echo $setting['safe'];?>",
		'links': {
			'valid_mobile_link': "<?php  echo url('user/register/valid_mobile')?>",
			'send_code_link': "<?php  echo url('utility/verifycode/send_code')?>",
			'check_smscode_link': "<?php  echo url('utility/verifycode/check_smscode')?>",
			'img_verify_link': "<?php  echo url('utility/code')?>",
			'register_link': "<?php  echo url('user/register/register', array('type' => $user_type, 'm' => $_GPC['m'], 'redirect' => $_GPC['redirect']))?>",
			'check_username_link': "<?php  echo url('user/register/check_username')?>",
			'check_code_link': "<?php  echo url('user/register/check_code')?>",
			'check_password_link': "<?php  echo url('user/register/check_password_safe')?>",
		},
	});
	angular.bootstrap($('.register-mobile'), ['userManageApp']);
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-base', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-base', TEMPLATE_INCLUDEPATH));?>