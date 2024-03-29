<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div class="we7-page-title">支付设置</div>
<ul class="we7-page-tab">
	<li <?php  if($_GPC['operate'] == 'alipay' || $_GPC['operate'] == '') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('paySetting', array('direct' => 1, 'operate' => 'alipay'))?>">支付宝支付设置</a></li>
	<li <?php  if($_GPC['operate'] == 'wechat') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('paySetting', array('direct' => 1, 'operate' => 'wechat'))?>">微信支付设置</a></li>
	<!-- <li><a href="#">京东支付设置</a></li> -->
	<!-- <li><a href="#">银行卡支付设置</a></li> -->
	<!-- <li><a href="#">applePay支付设置</a></li> -->
</ul>
<form action="" method="post" class="we7-form" id="js-pay-setting" ng-controller="storePaySettingCtrl" ng-cloak>
	<?php  if($operate == 'alipay') { ?>
	<div class="form-group">
		<label class="control-label col-sm-2">支付宝无线支付</label>
		<div class="col-sm-8">
			<div class="alert alert-warning">
				您的支付宝账号必须支持手机网页即时到账接口,才能使用手机支付功能 <a href="https://b.alipay.com/order/productDetail.htm?productId=2013080604609688" target="_blank" class="color-default">申请及详情查看这里</a>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">开关</label>
		<div class="col-sm-8">
				<input id='radio-1' type="radio" name='switch' ng-checked="alipay.switch == 1" value="1"/>
				<label for="radio-1">开启 </label>
				<input id='radio-2' type="radio" name='switch' ng-checked="alipay.switch != 1" value="2"/>
				<label for="radio-2">关闭 </label>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">收款支付宝账号</label>
		<div class="col-sm-8">
			<div class="input-group">
				<input type="text" class="form-control" name="account" ng-model="alipay.account">
				<span class="input-group-addon" ng-click="aliaccounthelp = !aliaccounthelp"><i class="wi wi-warning-sign" style="font-size:18px;"></i></span>
			</div>
			<span class="help-block" ng-show="aliaccounthelp">
				如果开启兑换或交易功能，请填写真实有效的支付宝账号，用于收取用户以现金兑换交易积分的相关款项。如账号无效或安全码有误，将导致用户支付后无法正确对其积分账户自动充值，或进行正常的交易对其积分账户自动充值，或进行正常的交易。 如您没有支付宝帐号，
				<a href="https://memberprod.alipay.com/account/reg/enterpriseIndex.htm" target="_blank" class="color-default">请点击这里注册</a>
			</span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">合作者身份</label>
		<div class="col-sm-8">
			<div class="input-group">
				<input type="text" class="form-control" name="partner" ng-model="alipay.partner">
				<span class="input-group-addon" ng-click="alipartnerhelp = !alipartnerhelp"><i class="wi wi-warning-sign" style="font-size:18px;"></i></span>
			</div>
			<span class="help-block" ng-show="alipartnerhelp">
				支付宝签约用户请在此处填写支付宝分配给您的合作者身份，签约用户的手续费按照您与支付宝官方的签约协议为准。
				<br>如果您还未签约，
					<a href="https://memberprod.alipay.com/account/reg/enterpriseIndex.htm" target="_blank" class="color-default">请点击这里签约</a>；
					如果已签约,
					<a href="https://b.alipay.com/order/pidKey.htm?pid=2088501719138773&amp;product=fastpay" target="_blank" class="color-default">请点击这里获取PID、Key</a>;
					如果在签约时出现合同模板冲突，请咨询0571-88158090
			</span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">校验密钥</label>
		<div class="col-sm-8">
			<div class="input-group">
				<input type="text" class="form-control" name="secret" ng-model="alipay.secret">
				<span class="input-group-addon" ng-click="alisecrethelp = !alisecrethelp"><i class="wi wi-warning-sign" style="font-size:18px;"></i></span>
			</div>
			<span class="help-block" ng-show="alisecrethelp">支付宝签约用户可以在此处填写支付宝分配给您的交易安全校验码，此校验码您可以到支付宝官方的商家服务功能处查看 </span>
		</div>
	</div>
	<?php  } ?>
	<?php  if($operate == 'wechat') { ?>
	<div class="form-group">
		<label class="control-label col-sm-2">开关</label>
		<div class="col-sm-8">
			<input id='radio-3' type="radio" name='switch' <?php  if($wechat['switch'] == 1) { ?>checked<?php  } ?> value="1"/>
			<label for="radio-3">开启 </label>
			<input id='radio-4' type="radio" name='switch' <?php  if($wechat['switch'] != 1) { ?>checked<?php  } ?> value="2"/>
			<label for="radio-4">关闭 </label>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">appid</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="appid" value="<?php  echo $wechat['appid'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">微信支付商户号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="mchid" value="<?php  echo $wechat['mchid'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">微信支付秘钥</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="signkey" value="<?php  echo $wechat['signkey'];?>">
		</div>
	</div>
	<?php  } ?>
	<div class="form-group">
		<label class="control-label col-sm-2"></label>
		<div class="col-sm-8">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
			<input type="hidden" name="operate" value="<?php  echo $_GPC['operate'];?>">
			<input type="submit" name="submit" value="保 存" class="btn btn-primary">
		</div>
	</div>
</form>
<script>
	angular.module('storeApp').value('config', {
		'alipay': <?php echo !empty($alipay) ? json_encode($alipay) : 'null'?>,
	});
	angular.bootstrap($('#js-pay-setting'), ['storeApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>