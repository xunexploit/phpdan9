<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<ul class="we7-page-tab">
		<li <?php  if($do == 'installed') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo url('system/template/installed')?>" >已安装模板</a>
		</li>
		<li <?php  if($do == 'not_install') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo url('system/template/not_install')?>">未安装模板</a>
		</li>
	</ul>
	<div class="search-box we7-padding-bottom clearfix">
		<?php  if($do == 'installed') { ?>
		<select class="we7-margin-right" onchange="location.href=this.value">
			<option value="<?php  echo url('system/template')?>&do=<?php  echo $do;?>&keyword=<?php  echo $_GPC['keyword'];?>">全部模板类型</option>
			<?php  if(is_array($temtypes)) { foreach($temtypes as $item) { ?>
			<option value="<?php  echo url('system/template')?>&do=<?php  echo $do;?>&keyword=<?php  echo $_GPC['keyword'];?>&type=<?php  echo $item['name'];?>" <?php  if($_GPC['type'] == $item['name']) { ?>selected="selected"<?php  } ?>><?php  echo $item['title'];?></option>
			<?php  } } ?>
		</select>
		<?php  } ?>
		<form action="" method="get" class="search-form">
			<input type="hidden" name="c" value="system">
			<input type="hidden" name="a" value="template">
			<input type="hidden" name="do" value="<?php  echo $do;?>">
			<input type="hidden" name="type" value="<?php  echo $_GPC['type'];?>">
			<div class="input-group col-sm-4">
				<input type="text" name="keyword" value="<?php  echo $_GPC['keyword'];?>" class="form-control" placeholder="请输入模板名称">
				<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
			</div>
		</form>
	</div>
	<div class="system-template">
		<?php  if($do == 'installed') { ?>
		<div class="system-template-list" id="js-system-template" ng-controller="templateCtrl" ng-cloak>
			<?php  if(is_array($template_list)) { foreach($template_list as $template) { ?>
			<div class="system-template-item" ng-class="templateList.<?php  echo $template['name'];?>.upgrade == 1 ? '' : 'active'">
				<div class="cover-lock">
					<div class="lock">
						<a href="" ng-if="templateList.<?php  echo $template['name'];?>.upgrade == 1" class="btn btn-primary item-build-btn" role="button" ng-click="setUpgradeInfo('<?php  echo $template['name'];?>')">更新</a>
						<a href="javascript:void(0)"  class="btn btn-danger item-build-btn" ng-click="deleteTemplate('<?php  echo url("system/template/uninstall", array("id" => $template["id"]))?>');" role="button">停用</a>
					</div>
				</div>
				<div class="system-template-img">
					<img src="<?php  echo tomedia('../app/themes/'. $template['name']. '/preview.jpg')?>"/>
				</div>
				<h2 class="system-template-title">
					<?php  echo $template['title'];?>
				</h2>
			</div>
			<?php  } } ?>
			<div class="modal fade" id="upgradeInfo"  tabindex="-1" role="dialog" aria-labelledby="myModalLabels" aria-hidden="true">
				<div class="modal-dialog we7-modal-dialog" style="width:800px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">模板分支版本信息</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<div class="panel panel-default">
									<div class="panel-heading">
										{{ upgradeInfo.title }}---模板分支信息
									</div>
									<div class="panel-body">
										<div class="input-group col-sm-12" ng-repeat="branch in upgradeInfo.branches">
											<div class="col-sm-3">
												分之名称 : {{ branch.name }}
											</div>
											<div class="col-sm-3">
												升级价格 : {{  branch.id > upgradeInfo.site_branch.id ? branch.upgrade_price : 0 }}
											</div>
											<div class="col-sm-2">
												<button class="btn btn-default" onclick="$(this).parent().next().next().toggle();">升级说明</button>
											</div>
											<div class="col-sm-3">
												<a ng-href="{{ './index.php?c=cloud&a=process&t='+upgradeInfo.name+'&is_upgrade=1' }}" class="btn btn-default" onclick="return confirm('确定要升级到此分之的最新版吗？')" ng-if="branch.id == upgradeInfo.site_branch.id">免费升级到【{{branch.name}}】最新版本</a>
												<a ng-href="{{ './index.php?c=cloud&a=redirect&do=buybranch&type=theme&m='+upgradeInfo.name+'&branch='+branch.id+'&is_upgrade=1' }}" class="btn btn-default" ng-click="upgrade(branch.upgrade_price)" ng-if="branch.id > upgradeInfo.site_branch.id">付费升级到【{{branch.name}}】最新版本</a>
											</div>
											<div style="display: none">
												<span class="help-block" ng-bind-html=" branch.version.description">
												</span>
											</div>
										</div>
									</div>
									<div class="input-group col-sm-12">
										<div class="alert-info">
											<span><i class="fa fa-info-circle"></i></span>
											模板分支按照等级顺序排列。
										</div>
										<div class="alert-info">
											<span><i class="fa fa-info-circle"></i></span>
											如果要升级到其它分支最新版本，需要花费对应分支价格数量的交易币。
										</div>
										<div class="alert-info">
											<span><i class="fa fa-info-circle"></i></span>
											已购买的模板分支可以免费升级到该分支的最新版本。
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="text-right">
			<?php  echo $pager;?>
		</div>
		<script>
			angular.module('moduleApp').value('config', {
				'templateList' : <?php  echo json_encode($template_list)?>,
				'url' : "<?php  echo url('system/template/check_upgrade')?>",
				'get_upgrade_info_url' : "<?php  echo url('system/template/get_upgrade_info')?>"
			});



			angular.bootstrap($('#js-system-template'), ['moduleApp']);
		</script>
		<?php  } else if($do == 'not_install') { ?>
		<?php  if(is_array($uninstall_template)) { foreach($uninstall_template as $template) { ?>
		<div class="system-template-item">
			<div class="cover-lock">
				<div class="lock">
					<a href="<?php  echo url('system/template/install', array('templateid' => $template['name']))?>" class="btn btn-warning item-build-btn" role="button">安装</a>
				</div>
			</div>
			<h2 class="system-template-title">
				<?php  echo $template['title'];?>
			</h2>
			<div class="system-template-img">
				<img src="<?php  echo tomedia($template['logo'])?>"/>
			</div>
		</div>
		<?php  } } ?>
		<?php  echo $pager;?>
		<?php  } ?>
	</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>