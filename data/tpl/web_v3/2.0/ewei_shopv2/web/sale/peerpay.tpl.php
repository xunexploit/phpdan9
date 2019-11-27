<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
	当前位置：<span class="text-primary">找人代付</span>
</div>
<div class="page-content">
	<form <?php if(cv('sale.peerpay.edit')) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate">

	<div class="panel panel-default" >
		<div class="panel-body">
			<div class="col-sm-10 col-xs-12">
				<h4 class="set_title">找人代付</h4>
				<span>启用代付功能后，代付发起人（买家）下单后，可将订单分享给小伙伴（朋友圈、微信群、微信好友），请他帮忙付款。</span>
			</div>
			<div class="col-lg pull-right" style="padding-top:10px;text-align: right" >
				<?php if(cv('sale.deduct')) { ?>
				<input type="checkbox" class="js-switch" name="data[open]" value="1" <?php  if($data['open']==1) { ?>checked<?php  } ?> />
				<?php  } else { ?>
				<?php  if($data['open']==1) { ?>
				<span class='text-success'>开启</span>
				<?php  } else { ?>
				<span class='text-default'>关闭</span>
				<?php  } ?>
				<?php  } ?>

			</div>
		</div>

		<div class="panel-body hide <?php  if(!empty($data['open'])) { ?>show<?php  } ?>" id="setform">
			<input type="hidden" id="tab" name="tab" value="#tab_basic" />
			<div class="tabs-container">
				<ul class="nav nav-tabs" id="myTab">
					<li  <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>class="active"<?php  } ?>><a href="#tab_basic">发起人的求助</a></li>

					<li  <?php  if($_GPC['tab']=='money') { ?>class="active"<?php  } ?>><a href="#tab_money">代付人的配置</a></li>
				</ul>
				<div class="tab-content ">
					<div class="tab-pane   <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>active<?php  } ?>" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sale/peerpay/basic', TEMPLATE_INCLUDEPATH)) : (include template('sale/peerpay/basic', TEMPLATE_INCLUDEPATH));?></div>

					<div class="tab-pane   <?php  if($_GPC['tab']=='money') { ?>active<?php  } ?>" id="tab_money"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sale/peerpay/money', TEMPLATE_INCLUDEPATH)) : (include template('sale/peerpay/money', TEMPLATE_INCLUDEPATH));?></div>
				</div>
			</div>
		</div>
	</div>

	<?php if(cv('sale.peerpay.edit')) { ?>
	<div class="form-group">
		<div class="col-sm-12 col-xs-12">
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

		function addConsumeItem(obj,enough1){
			var $this = $(obj).parent().prev();
			var html= '<div class="input-group recharge-item"  style="margin-top:5px">';
			html+='<input type="text" class="form-control" name="'+enough1+'[]"  />';
			html+='<div class="input-group-btn"><button type="button" class="btn btn-danger" onclick="$(this).parents(\'.recharge-item\').remove()"><i class="fa fa-remove"></i></button></div>';
			html+='</div>';
			$this.append(html);
		}

        function addConsumeItem1(obj,enough1,enough2){
            var $this = $(obj).parent().prev();
            var html= '<div class="input-group recharge-item"  style="margin-top:5px">';
            html+='<div class="input-group-addon">姓名:</div>';
            html+='<input type="text" class="form-control" name="'+enough1+'[]"  />';
            html+='<div class="input-group-addon">留言:</div>';
            html+='<input type="text" class="form-control" name="'+enough2+'[]"  />';
            html+='<div class="input-group-btn"><button type="button" class="btn btn-danger" onclick="$(this).parents(\'.recharge-item\').remove()"><i class="fa fa-remove"></i></button></div>';
            html+='</div>';
            $this.append(html);
        }
		function removeConsumeItem(obj){
			$(obj).closest('.recharge-item').remove();
		}

        $(":checkbox").click(function () {
            var $this = $(this);
            var $setform = $("#setform");
            switch ($this.prop('name'))
			{
				case 'data[open]':
                    this.checked ? $setform.addClass('show') : $setform.removeClass('show');
				    break;
			}
        })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--OTEzNzAyMDIzNTAzMjQyOTE0-->