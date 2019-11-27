<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
	当前位置：<span class="text-primary">基础设置</span>

</div>
<div class="page-content">
	<form id="setform"  <?php if(cv('cashier.set.edit')) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate">
		<input type="hidden" id="tab" name="tab" value="#tab_basic" />
		<div class="tabs-container">
			<ul class="nav nav-tabs" id="myTab">
				<li  <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>class="active"<?php  } ?>><a href="#tab_basic">基本设置</a></li>

				<li  <?php  if($_GPC['tab']=='money') { ?>class="active"<?php  } ?>><a href="#tab_money">结算</a></li>
			</ul>
			<div class="tab-content ">
				<div class="tab-pane   <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>active<?php  } ?>" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('cashier/set/basic', TEMPLATE_INCLUDEPATH)) : (include template('cashier/set/basic', TEMPLATE_INCLUDEPATH));?></div>

				<div class="tab-pane   <?php  if($_GPC['tab']=='money') { ?>active<?php  } ?>" id="tab_money"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('cashier/set/money', TEMPLATE_INCLUDEPATH)) : (include template('cashier/set/money', TEMPLATE_INCLUDEPATH));?></div>
			</div>
		</div>
	<?php if(cv('cashier.set.edit')) { ?>
		<div class="form-group">
			<label class="col-lg control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<input type="submit"  value="提交" class="btn btn-primary" />
			</div>
		</div>
	<?php  } ?>
	</form>
</div>
<script language='javascript'>
        require(['bootstrap'], function () {
            $('#myTab a').click(function (e) {
                $('#tab').val($(this).attr('href'));
                e.preventDefault();
                $(this).tab('show');
            })
        });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--青岛易联互动网络科技有限公司-->