<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .fui-list-inner .text{
        color: #999;
        font-size: .6rem;
    }
    .fui-list-inner .title{
        font-size: .65rem;
    }
    .fui-list.goods-item{
        height: 3rem;
    }
    .fui-list{
        background: #fff;
    }
</style>
<div class='fui-page  fui-page-current member-log-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  if($_W['shopset']['trade']['withdraw']) { ?><?php  echo $_W['shopset']['trade']['moneytext'];?>明细<?php  } else { ?>充值记录<?php  } ?></div>
    </div>

    <div class='fui-content navbar' >

        <?php  if($_W['shopset']['trade']['withdraw']) { ?>
        <div id="tab" class="fui-tab fui-tab-danger">
            <a data-tab="tab1"  class="external <?php  if($_GPC['type']==0) { ?>active<?php  } ?>" data-type='0'>充值记录</a>
            <a data-tab="tab2" class='external <?php  if($_GPC['type']==1) { ?>active<?php  } ?>'  data-type='1'>提现记录</a>
        </div>
        <?php  } ?>


        <div class='content-empty' style='display:none;'>
            <i class='icon icon-searchlist'></i><br/>暂时没有任何记录!
        </div>

        <div class='fui-list-group container' style="display:none;background: #f3f3f3"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
    </div>

    <script id="tpl_member_log_list" type="text/html">

        <%each list as log%>
        <div class="fui-list goods-item <%if log.type==1%>no-border<%/if%>" <%if log.type==1%>style="height:2.75rem"<%/if%>>

            <div class="fui-list-inner">
                <div class='title' <%if log.rechargetype==""%>style="display:none"<%/if%>>
                    <!--<%if log.type==0%>充值金额: <%/if%>-->
                    <!--<%if log.type==1%>提现金额: <%/if%>-->
                    <!--<%if log.type==2%>佣金打款: <%/if%>-->
                    <%if log.rechargetype=="wechat"%>微信充值<%/if%>
                    <%if log.rechargetype=="alipay"%>支付宝充值<%/if%>
                    <%if log.rechargetype=="system"%>后台充值<%/if%>
                    <%if log.rechargetype=="credit"%><%log.title%><%/if%>
                    <%if log.rechargetype=="exchange"%>兑换中心<%/if%>
                    <%if log.rechargetype=="creditshop"%>积分兑换<%/if%>
                </div>
            <%if log.type==1%>
                    <div class='title'> 提现到<%log.typestr%></div>
            <%/if%>
                <div class='text'><%log.createtime%></div>
            </div>
            <div class='fui-list-angle'>
                <div style="font-size: .75rem;color: #000;"><%if log.money>0%>+<%/if%><%log.money%> 元</div>
                <%if log.status==0%>
                <span class=' text-warning'><%if log.type==0%>未充值<%else%>申请中<%/if%></span>
                <%/if%>
                <%if log.status==1%>
                <!--<span  class='fui-label fui-label-success'>成功</span>-->
                <%/if%>
                <%if log.status==-1%>
                <span  class=' text-danger'><%if log.type==1%>提现失败<%/if%></span>
                <%/if%>
                <%if log.status==3%>
                <span  class=' text-default'><%if log.type==0%>退款<%/if%></span>
                <%/if%>

            </div>

        </div>
        <%if log.type==1%>
        <div class="fui-list" style="height: 1.85rem;margin-bottom: .5rem">
            <div class="fui-list-inner">
                <div class='text' style="display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;"><div style="margin-right: .75rem">实际<%if log.status==1%>到账<%else%>金额<%/if%>:<%if log.deductionmoney>0%><%log.realmoney%><%else%><%log.money%><%/if%>元</div><div >手续费:<%log.deductionmoney%> 元</div></div>
            </div>
        </div>
        <%/if%>
        <%/each%>
    </script>

    <script language='javascript'>require(['biz/member/log'], function (modal) {
        modal.init({type:"<?php  echo $_GPC['type'];?>"});
    });</script>
    <?php  $this->footerMenus()?>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>