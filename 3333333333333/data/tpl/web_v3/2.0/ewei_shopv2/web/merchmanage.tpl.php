<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading">
    <h2><?php  echo m('plugin')->getName('merchmanage')?></h2>
</div>

<div class="row" style="padding: 0;">
    <div class="col-sm-12">
        <div style="border: 1px solid #e7eaec;" class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php  echo m('plugin')->getName('merchmanage')?> 应用说明</h5>
            </div>
            <div class="ibox-content">
                <p></p>
                <p>“<?php  echo m('plugin')->getName('merchmanage')?>”应用是手机端管理后台，用户可在手机端随时随地轻松的编辑店铺设置、用户管理、订单管理、商品管理、财务管理。</p>
                <p></p>
                <p></p>
            </div>
        </div>
    </div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>