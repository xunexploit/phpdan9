<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">当前位置：<span class="text-primary">基础设置</span></div>

<div class="page-content">
    <form id="setform"  <?php if(cv('globonus.set.edit')) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate">

    <input type="hidden" id="tab" name="tab" value="#tab_<?php  echo $_GPC['tab'];?>" />
    <div class="tabs-container>
         <div class="tabs-left">
    <ul class="nav nav-tabs" id="myTab">
        <li  <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>class="active"<?php  } ?>><a href="#tab_basic">基本</a></li>
        <li  <?php  if($_GPC['tab']=='relate') { ?>class="active"<?php  } ?> ><a href="#tab_relate">股东资格</a></li>
        <li <?php  if($_GPC['tab']=='money') { ?>class="active"<?php  } ?> ><a href="#tab_money">结算</a></li>
        <li <?php  if($_GPC['tab']=='level') { ?>class="active"<?php  } ?> ><a href="#tab_level">股东升级</a></li>
        <li <?php  if($_GPC['tab']=='center') { ?>class="active"<?php  } ?> ><a href="#tab_center">股东中心</a></li>
        <li <?php  if($_GPC['tab']=='style') { ?>class="active"<?php  } ?> ><a href="#tab_style">样式/文字</a></li>
        <li <?php  if($_GPC['tab']=='protocol') { ?>class="active"<?php  } ?>><a href="#tab_protocol">申请协议</a></li>
    </ul>
    <div class="tab-content ">
        <div class="tab-pane   <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>active<?php  } ?>" id="tab_basic"><div class="panel-body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('globonus/set/basic', TEMPLATE_INCLUDEPATH)) : (include template('globonus/set/basic', TEMPLATE_INCLUDEPATH));?></div></div>
        <div class="tab-pane  <?php  if($_GPC['tab']=='relate') { ?>active<?php  } ?>" id="tab_relate"> <div class="panel-body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('globonus/set/relate', TEMPLATE_INCLUDEPATH)) : (include template('globonus/set/relate', TEMPLATE_INCLUDEPATH));?></div></div>
        <div class="tab-pane <?php  if($_GPC['tab']=='money') { ?>active<?php  } ?>" id="tab_money"> <div class="panel-body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('globonus/set/money', TEMPLATE_INCLUDEPATH)) : (include template('globonus/set/money', TEMPLATE_INCLUDEPATH));?></div></div>
        <div class="tab-pane <?php  if($_GPC['tab']=='level') { ?>active<?php  } ?>" id="tab_level"> <div class="panel-body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('globonus/set/level', TEMPLATE_INCLUDEPATH)) : (include template('globonus/set/level', TEMPLATE_INCLUDEPATH));?></div></div>
        <div class="tab-pane <?php  if($_GPC['tab']=='center') { ?>active<?php  } ?>" id="tab_center"> <div class="panel-body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('globonus/set/center', TEMPLATE_INCLUDEPATH)) : (include template('globonus/set/center', TEMPLATE_INCLUDEPATH));?></div></div>
        <div class="tab-pane <?php  if($_GPC['tab']=='style') { ?>active<?php  } ?>" id="tab_style"> <div class="panel-body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('globonus/set/style', TEMPLATE_INCLUDEPATH)) : (include template('globonus/set/style', TEMPLATE_INCLUDEPATH));?></div></div>
        <div class="tab-pane <?php  if($_GPC['tab']=='protocol') { ?>active<?php  } ?>" id="tab_protocol"> <div class="panel-body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('globonus/set/protocol', TEMPLATE_INCLUDEPATH)) : (include template('globonus/set/protocol', TEMPLATE_INCLUDEPATH));?></div></div>
    </div>
    </div>
    <?php if(cv('globonus.set.edit')) { ?>
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
    function showBecome(obj) {
        var $this = $(obj);
        $('.become').hide();
        $('.becomeconsume').hide();
        $('.becomecheck').hide();

        if ($this.val() == '1') {
            $('.protocol-group').show();
        } else {
            $('.protocol-group').hide();
        }

        if ($this.val() == '2') {
            $('.become2').show();
            $('.becomeconsume').show();
        } else if ($this.val() == '3') {
            $('.become3').show();
            $('.becomeconsume').show();
        } else if ($this.val() == '4') {
            $('.become4').show();
            $('.becomeconsume').show();
        }

        if($this.data('needcheck')==1){
            $('.becomecheck').show();
        }
    }

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--913702023503242914-->