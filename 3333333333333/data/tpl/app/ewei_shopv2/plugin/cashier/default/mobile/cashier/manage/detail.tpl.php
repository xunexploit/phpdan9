<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-commission-log">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">订单查询(<span id='total'></span>笔)</div>
    </div>
    <div class="fui-content">
        <div class='fui-cell-group' style='margin-top:0px;'>
            <div class='fui-cell'>
                <div class='fui-cell-label' style='width:auto'>流水金额</div>
                <div class='fui-cell-info'></div>
                <div class='fui-cell-remark noremark'><span id="money"></span>元</div>
            </div>
        </div>
        <form action="./index.php" method="get">
            <input type="hidden" name="i" value="<?php  echo $_GPC['i'];?>">
            <input type="hidden" name="c" value="<?php  echo $_GPC['c'];?>">
            <input type="hidden" name="m" value="<?php  echo $_GPC['m'];?>">
            <input type="hidden" name="do" value="<?php  echo $_GPC['do'];?>">
            <input type="hidden" name="r" value="<?php  echo $_GPC['r'];?>">
            <input type="hidden" name="cashierid" value="<?php  echo $_GPC['cashierid'];?>">
            <div class="fui-cell-group">
                <div class="fui-cell ">
                    <div class="fui-cell-label ">查询类型</div>
                    <div class="fui-cell-info">
                        <select name="type" id="select">
                            <option value="0">今天</option>
                            <option value="3" <?php  if($_GPC['type'] == '3') { ?>selected<?php  } ?>>近三天</option>
                            <option value="7" <?php  if($_GPC['type'] == '7') { ?>selected<?php  } ?>>近七天</option>
                            <option value="1" <?php  if($_GPC['type'] == '1') { ?>selected<?php  } ?>>自定义</option>
                        </select>
                    </div>
                </div>
                <div id="type1" <?php  if($_GPC['type']!='1') { ?>style="display:none"<?php  } ?>>
                    <div class="fui-cell ">
                        <div class="fui-cell-label ">开始时间</div>
                        <div class="fui-cell-info"><input type="text" name="starttime" value="<?php  echo $_GPC['starttime'];?>" placeholder="请选择日期" class="fui-input dt" readonly></div>
                    </div>
                    <div class="fui-cell ">
                        <div class="fui-cell-label">结束时间</div>
                        <div class="fui-cell-info"><input type="text" name="endtime" value="<?php  echo $_GPC['endtime'];?>" placeholder="请选择日期" class="fui-input dt" readonly></div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-warning block" value="查询" style="width: 95%">
        </form>
        <div class='content-empty' style='display:none;'>
            <i class='icon icon-manageorder'></i><br/>暂时没有任何数据
        </div>
        <div class="fui-list-group" id="container"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>



<script id='tpl_cashier_manage_list' type='text/html'>
    <%each list as log%>
        <a class="fui-list">
            <div class="fui-list-inner">
                <div class="row">
                    <div class="row-text"><%log.logno%></div>
                </div>
                <div class="subtitle">
                    生成时间: <%log.paytime%>
                </div>
            </div>
            <div class="row-remark">
                <p>+<%log.money%></p>
            </div>
        </a>
    <%/each%>
</script>
   </div>

<script language='javascript'>
    require(['../addons/ewei_shopv2/plugin/cashier/static/js/order.js'], function (modal) {
        modal.init(<?php  echo json_encode($params)?>);
    });
    require(['foxui','foxui.picker'],function(){
        $('.dt').datetimePicker();
    })
</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+4-->