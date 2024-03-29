<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">当前位置：<span class="text-primary">首页</span></div>

<style>
    .tab-content>.tab-pane {margin-top: 10px;}
    .tab-content>.tab-pane>.fui-list-group {border-bottom: 0;}
</style>

<div class="page-content transparent">

    <div class="row">
        <div class="col-md-4">
            <div class="ibox h300">
                <div class="ibox-title">
                    <h5><i class="icow icow-shop"></i>商城信息</h5>
                    <?php if(cv('sysset.shop.edit')) { ?>
                    <ul >
                        <a href="<?php  echo webUrl('sysset/shop')?>" class="text-primary">修改</a>
                    </ul>
                    <?php  } ?>
                </div>
                <div class="ibox-content">
                    <ul class="fui-cell-group">
                        <li class="fui-cell">商城名称：<span class="text"><?php  echo $shop_data['name'];?></span></li>
                        <li class="fui-cell">商城介绍：<span class="text"><?php  echo $shop_data['description'];?></span></li>
                        <li class="fui-cell">使用应用：<span class='text-no'><?php  echo $pluginnum;?></span>个 <a href="<?php  echo webUrl('plugins')?>" class="text-primary">查看</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox h300">
                <div class="ibox-content  no-border">
                    <ul class="fui-list-group">
                        <?php if(cv('goods')) { ?>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('goods',array('goodsfrom'=>'out'))?>">
                                <div class="fui-list-media">
                                    <span class="icow text-info icow-goodsL"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="goods_totals">-</h5>
                                    <p>已售罄商品</p>
                                </div>
                            </a>
                        </li>
                        <?php  } ?>
                        <?php if(cv('order.list.status1')) { ?>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('order/list/status1')?>">
                                <div class="fui-list-media">
                                    <span class="icow text-green icow-fahuo"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="order_status1">-</h5>
                                    <p><?php  if($is_openmerch==1) { ?>自营<?php  } ?>待发货订单</p>
                                </div>
                            </a>
                        </li>
                        <?php  } ?>
                        <?php if(cv('order.list.status4')) { ?>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('order/list/status4')?>">
                                <div class="fui-list-media">
                                    <span class="icow text-primary icow-tuihuo"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="order_status4">-</h5>
                                    <p><?php  if($is_openmerch==1) { ?>自营<?php  } ?>维权中订单</p>
                                </div>
                            </a>
                        </li>
                        <?php  } ?>
                        <?php if(cv('finance.log.withdraw')) { ?>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('finance/log/withdraw',array('status'=>0))?>">
                                <div class="fui-list-media">
                                    <span class="icow text-warning icow-shenhe"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="finance_total">-</h5>
                                    <p>待审核提现</p>
                                </div>
                            </a>
                        </li>
                        <?php  } ?>
                    </ul>
                    <?php  if($hascommission) { ?>
                    <ul class="fui-list-group noborder">
                        <?php if(cv('commission.agent')) { ?>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('commission/agent')?>">
                                <div class="fui-list-media">
                                    <span class="icow text-primary icow-vip"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="commission_agent_total">-</h5>
                                    <p>分销总数</p>
                                </div>
                            </a>
                        </li>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('commission/agent')?>">
                                <div class="fui-list-media">
                                    <span class="icow text-warning icow-huiyuan2"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="commission_agent_status0_total">-</h5>
                                    <p>待审核分销商</p>
                                </div>
                            </a>
                        </li>
                        <?php  } ?>
                        <?php if(cv('commission.apply.view1')) { ?>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('commission/apply',array('status'=>1))?>">
                                <div class="fui-list-media">
                                    <span class="icow text-green icow-yongjinmingxi"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="commission_apply_status1_total">-</h5>
                                    <p>待审核佣金申请</p>
                                </div>
                            </a>
                        </li>
                        <?php  } ?>
                        <?php if(cv('commission.apply.view2')) { ?>
                        <li class="fui-list">
                            <a href="<?php  echo webUrl('commission/apply',array('status'=>2))?>">
                                <div class="fui-list-media">
                                    <span class="icow text-info icow-tixian1"></span>
                                </div>
                                <div class="fui-list-inner">
                                    <h5 class="commission_apply_status2_total">-</h5>
                                    <p>待打款佣金申请</p>
                                </div>
                            </a>
                        </li>
                        <?php  } ?>
                    </ul>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(cv('order')) { ?>
    <?php  if($ordercol) { ?>
    <div class="row">
        <div class="col-md-<?php  echo $ordercol;?>">
            <div class="ibox" style="position: relative;">
                <div class="ibox-title">
                    <h5><i class="icow">&#xe622;</i>订单概述</h5>
                    <ul class="nav nav-tabs" id="orderinfo">
                        <li class="active"><a data-toggle="tab"  href="#order_count_0" onclick="get_order(0)">今日</a></li>
                        <li><a data-toggle="tab" href="#order_count_1" onclick="get_order(1)">昨日</a></li>
                        <li><a data-toggle="tab" href="#order_count_7" onclick="get_order(7)">最近七日</a></li>
                        <li><a data-toggle="tab" href="#order_count_30" onclick="get_order(30)">本月</a></li>
                    </ul>
                </div>
                <div class="ibox-content">
                    <div class="tab-content" style="height: auto;">
                        <div class="tab-pane active" id="order_count_0">
                            <div class="fui-list-group">
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_count_0 _popover-tips" data-content="成交量：已付款订单数<br>交易量：下单总数（含未付款订单）">-</h4>
                                        成交量/交易量(件)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_price_0 _popover-tips" data-content="成交额：已付款订单金额（含运费）<br>交易额：下单总额（含运费）">-</h4>
                                        成交额/交易额(元)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_avg_0 _popover-tips" data-content="成交额/下单去重会员数（含维权订单）">-</h4>
                                        人均消费(元)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="order_count_1">
                            <div class="fui-list-group">
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_count_1 _popover-tips" data-content="成交量：已付款订单数<br>交易量：下单总数（含未付款订单）">-</h4>
                                        成交量/交易量(件)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_price_1 _popover-tips" data-content="成交额：已付款订单金额（含运费）<br>交易额：下单总额（含运费）">-</h4>
                                        成交额/交易额(元)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_avg_1 _popover-tips" data-content="成交额/下单去重会员数（含维权订单）">-</h4>
                                        人均消费(元)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="order_count_7">
                            <div class="fui-list-group">
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_count_7 _popover-tips" data-content="成交量：已付款订单数<br>交易量：下单总数（含未付款订单）">-</h4>
                                        成交量/交易量(件)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_price_7 _popover-tips" data-content="成交额：已付款订单金额（含运费）<br>交易额：下单总额（含运费）">-</h4>
                                        成交额/交易额(元)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_avg_7 _popover-tips" data-content="成交额/下单去重会员数（含维权订单）">-</h4>
                                        人均消费(元)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="order_count_30">
                            <div class="fui-list-group">
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_count_30 _popover-tips" data-content="成交量：已付款订单数<br>交易量：下单总数（含未付款订单）">-</h4>
                                        成交量/交易量(件)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_price_30 _popover-tips" data-content="成交额：已付款订单金额（含运费）<br>交易额：下单总额（含运费）">-</h4>
                                        成交额/交易额(元)
                                    </div>
                                </div>
                                <div class="fui-list no-padding">
                                    <div class="fui-list-inner">
                                        <h4 class="text-warning order_avg_30 _popover-tips" data-content="成交额/下单去重会员数（含维权订单）">-</h4>
                                        人均消费(元)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-content" style="border: 0;">
                    <div class="row relative">
                        <div class="ibox-loading" id="echarts-line-chart-loading"></div>
                        <div class="col-md-12">
                            <div class="" id="echarts-line-chart" style="height:156px; margin-top: 8px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-<?php  echo $ordercol;?>">
            <div class="ibox h300">
                <div class="ibox-title">
                    <h5><i class="icow">&#xe615;</i>商品销量排行</h5>
                    <ul class="nav nav-tabs" id="sale">
                        <li class="active"><a data-toggle="tab" href="#goods_rank_0" onclick="get_goods(0)">今日</a></li>
                        <li><a data-toggle="tab" href="#goods_rank_1" onclick="get_goods(1)">昨日</a></li>
                        <li><a data-toggle="tab" href="#goods_rank_7" onclick="get_goods(7)">最近七日</a></li>
                        <?php if(cv('statistics.goods')) { ?>
                        <li><a href="<?php  echo webUrl('statistics/goods')?>">更多</a></li>
                        <?php  } ?>
                    </ul>
                </div>
                <div class="ibox-content">
                    <div class="tab-content relative">
                        <div class="ibox-loading" id="goods-rank-loading"></div>
                        <div class="tab-pane active" id="goods_rank_0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="40px">排名</th>
                                    <th width="">商品名称</th>
                                    <th width="20%">成交数量</th>
                                    <th width="20%">成交金额</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="goods_rank_1">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="40px">排名</th>
                                    <th width="">商品名称</th>
                                    <th width="20%">成交数量</th>
                                    <th width="20%">成交金额</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="goods_rank_7">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="40px">排名</th>
                                    <th width="">商品名称</th>
                                    <th width="20%">成交数量</th>
                                    <th width="20%">成交金额</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php  } ?>
    <?php  } ?>
</div>


<script type="text/javascript">



    myrequire(['echarts'], function () {
        var hasLineChart = $("#echarts-line-chart").length>0;
        if(hasLineChart){
            var lineChart = echarts.init(document.getElementById("echarts-line-chart"));
        }
        window.onresize = function () {
            if(hasLineChart) {
                lineChart.resize();
            }
        };
        $.ajax({
            type: "GET",
            url: "<?php  echo webUrl('order/list/ajaxgettotals', array('merch' => -1))?>",
            dataType: "json",
            success: function (data) {
                var res = data.result;
                $(".order_status1").text(res.status1);
                $(".order_status4").text(res.status4);
                $.ajax({
                    type: "GET",
                    url: "<?php  echo webUrl('shop/ajax')?>",
                    dataType: "json",
                    success: function (data) {
                        var res = data.result;
                        $(".goods_totals").text(res.goods_totals);
                        $(".finance_total").text(res.finance_total);
                        $(".commission_agent_total").text(res.commission_agent_total);
                        $(".commission_agent_status0_total").text(res.commission_agent_status0_total);
                        $(".commission_apply_status1_total").text(res.commission_apply_status1_total);
                        $(".commission_apply_status2_total").text(res.commission_apply_status2_total);
                    }
                });
            }
        });

        //获取今日交易情况
        get_order(0);

        $.ajax({
            type: "GET",
            //   async: false,
            url: "<?php  echo webUrl('order/ajaxtransaction')?>",
            dataType: "json",
            success: function (json) {
                var lineoption = {
                    title: {
                        text: '近七日交易走势',
                        top: '100',
                        textStyle: {
                            fontWeight: 'normal',
                            fontSize: 12,
                            color: '#404040',
                            fontFamily: 'Microsoft YaHei UI',
                        }
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['交易量','成交量','交易额','成交额']
                    },
                    grid: {
                        x: 50,
                        x2: 50,
                        y2: 30
                    },
                    calculable: true,
                    xAxis: [
                        {
                            type: 'category',
                            boundaryGap: false,
                            data: json.price_key,
                            axisLine: {
                                lineStyle: {
                                    width: '0'
                                }
                            },
                        },
                    ],
                    yAxis: [
                        {
                            type: 'value',
                            axisLine: {
                                lineStyle: {
                                    width: '0'
                                }
                            },
                            axisLabel: {
                                formatter: '{value}'
                            }
                        }
                    ],
                    series: [
                        {
                            name: '交易额',
                            type: 'line',
                            data: json.allprice_value,
                            markPoint: {
                                data: [
                                    {
                                        type: 'max',
                                        name: '最大值'
                                    },
                                    {
                                        type: 'min', name: '最小值'
                                    }
                                ]
                            },
                            markLine: {
                                data: [
                                    {type: 'average', name: '平均值'}
                                ]
                            },
                            itemStyle: {
                                normal: {
                                    color: '#ffc000'
                                }
                            }
                        },
                        {
                            name: '成交额',
                            type: 'line',
                            data: json.price_value,
                            markPoint: {
                                data: [
                                    {
                                        type: 'max',
                                        name: '最大值'
                                    },
                                    {
                                        type: 'min', name: '最小值'
                                    }
                                ]
                            },
                            markLine: {
                                data: [
                                    {type: 'average', name: '平均值'}
                                ]
                            },
                            itemStyle: {
                                normal: {
                                    color: '#ff5555'
                                }
                            }
                        },
                        {
                            name: '交易量',
                            type: 'line',
                            data: json.allcount_value,
                            markLine: {
                                data: [
                                    {type: 'average', name: '平均值'}
                                ]
                            },
                            itemStyle: {
                                normal: {
                                    color: '#44abf7'
                                }
                            }
                        },
                        {
                            name: '成交量',
                            type: 'line',
                            data: json.count_value,
                            markLine: {
                                data: [
                                    {type: 'average', name: '平均值'}
                                ]
                            },
                            itemStyle: {
                                normal: {
                                    color: '#30af84'
                                }
                            }
                        }
                    ]
                };
                if(hasLineChart) {
                    lineChart.setOption(lineoption);
                    lineChart.resize();
                }
                $("#echarts-line-chart-loading").hide();
                $("#echarts-line-chart").show();
            }
        });
        //获取今日销量排行
        get_goods(0);


    });

    //获取订单概述
    function get_order(day) {
        $.ajax({
            type: "GET",
            url: "<?php  echo webUrl('order/ajaxorder')?>&day="+day,
            dataType: "json",
            success: function (data) {
                var json = data.result;
                $(".order_count_"+day).text(json.order.order_count+"/"+json.order.allorder_count);
                $(".order_price_"+day).text(json.order.order_price +"/"+json.order.allorder_price);
                $(".order_avg_"+day).text(json.order.avg);
            }
        });
    }

    //获取商品销售排行榜
    function get_goods(day) {
        $("#goods-rank-loading").show();
        var goodsUrl = "<?php  echo webUrl('goods/edit')?>&id=";
        $.ajax({
            type: "GET",
            url: "<?php  echo webUrl('shop/ajaxgoods')?>&day="+day,
            dataType: "json",
            success: function (data) {
                if(data.status==1 && !$.isEmptyObject(data.result.obj)){
                    $.each(data.result.obj, function (id, obj) {
                        $("#"+id+" tbody").empty();
                        if($.isEmptyObject(obj)){
                            var html = '<tfoot><tr><td colspan="4" style="line-height: 250px; text-align: center;">暂无数据</td></tr></tfoot>';
                            $("#"+id+" table").append(html).find("thead").hide();
                        }else{
                            $.each(obj, function (index, goods) {
                                var index = index+1, title = goods.title||'空', url = goodsUrl+goods.id;
                                var html = '<tr><td>'+index+'</td><td><a href="'+url+'">'+title+'</a></td><td>'+goods.count+'</td><td class="text-warning">'+goods.money+'</td></tr>';
                                $("#"+id+" tbody").append(html);
                            });
                        }
                    })
                }
                $("#goods-rank-loading").hide();
            }
        });
    }

    $('._popover-tips').popover({
        trigger: 'hover',
        delay: { "show": 500, "hide": 100 },
        content: $(this).data('fuck'),
        placement: 'top',
        title: false,
        animation: true,
        html: 'true',
    }).on('mouseenter', function () {
        // console.log($(this))
        // console.log($(this).text())
        $(this).popover("show");
    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>