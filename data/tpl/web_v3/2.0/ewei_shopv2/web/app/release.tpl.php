<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<link href="../addons/ewei_shopv2/plugin/app/static/css/page.css?v=20170922" rel="stylesheet" type="text/css"/>

<style type="text/css">
    .jconfirm.jconfirm-white .jconfirm-box .buttons button {font-size: 12px; font-weight: normal;}
    .summary_lg {padding: 35px 30px;}
    .summary_lg p {font-size: 15px; line-height: 28px;}
</style>

<div class="page-header">
    当前位置：
    <span class="text-primary">发布与审核</span>
</div>

<div class="page-content">
    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('app/_tab', TEMPLATE_INCLUDEPATH)) : (include template('app/_tab', TEMPLATE_INCLUDEPATH));?>

    <?php  if($error) { ?>
    <div class="page-tips">
        <p><?php  echo $error;?></p>
    </div>
    <?php  } else { ?>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="summary_box">
                <div class="summary_title">
                    <span class="text-default title_inner">发布说明</span>
                </div>
                <div class="summary_lg">
                    <p>将微信小程序基本信息填写到【小程序设置】，然后用开发者工具导入前端项目，并提交到微信，即可获得店铺的微信小程序。</p>
                    <p>注意：你的小程序的主体必须是「企业」，并开通了微信支付，才能具备支付权限。</p>
                    <p>如果你还没有注册微信小程序，<a href="https://mp.weixin.qq.com" target="_blank">点击此处注册</a>；注册成功后，再尝试发布小程序</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
   

    <?php  } ?>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
