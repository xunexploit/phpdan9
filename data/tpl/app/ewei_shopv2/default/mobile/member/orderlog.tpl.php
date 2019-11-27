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
        <div class="title">消费记录</div>
    </div>

    <div class='fui-content navbar' >
        <div class='content-empty' style='display:none;'>
            <i class='icon icon-searchlist'></i><br/>暂时没有任何记录!
        </div>

        <div class='fui-list-group container' style="display:none;background: #f3f3f3"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
    </div>

    <script id="tpl_member_orderlog_list" type="text/html">

        <%each list as log%>
        <div class="fui-list goods-item <%if log.type==1%>no-border<%/if%>" <%if log.type==1%>style="height:2.75rem"<%/if%>>
            <%if log.l_type==1%>
                <div class="fui-list-inner">
                
                    <div class='title' <%if log.rechargetype==""%>style="display:none"<%/if%>>
                        充值
                    </div>
                    <div class='text'><%log.createtime%></div>
                </div>
                <div class="fui-list-type"><%log.typestr%></div>
                <div class='fui-list-angle'>
                    <div style="font-size: .75rem;color: #000;"><%if log.money>0%>+<%/if%><%log.money%> 元</div>
                </div>
            <%/if%>
            <%if log.l_type==2%>
                <div class="fui-list-inner">
                    <div class='title' <%if log.rechargetype==""%>style="display:none"<%/if%>>
                        收银台消费
                    </div>
                    <div class='text'><%log.createtime%></div>
                </div>
                <div class="fui-list-type"><%log.typestr%></div>
                <div class='fui-list-angle'>
                    <div style="font-size: .75rem;color: #000;"><%if log.money>0%>-<%/if%><%log.money%> 元</div>
                </div>
            <%/if%>
            <%if log.l_type==3%>
                <div class="fui-list-inner">
                    <div class='title' <%if log.rechargetype==""%>style="display:none"<%/if%>>
                        购买<%log.title%>
                    </div>
                    <div class='text'><%log.createtime%></div>
                </div>
                <div class="fui-list-type"><%log.typestr%></div>
                <div class='fui-list-angle'>
                    <div style="font-size: .75rem;color: #000;"><%if log.price>0%>-<%/if%><%log.price%> 元</div>
                </div>
            <%/if%>
            </div>
        </div>
        <%/each%>
    </script>

    <script language='javascript'>require(['biz/member/orderlog'], function (modal) {
        modal.init({type:"<?php  echo $_GPC['type'];?>"});
    });</script>
    <?php  $this->footerMenus()?>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>