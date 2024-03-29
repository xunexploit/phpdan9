<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .btn-default.btn-color{
        position: relative;padding: 4px 15px 4px 4px;
    }
    .btn-default.btn-color .inner{
        height:22px;width:50px;
    }
    .dropdown-menu.color-list .color-block{
        width: 25px;height: 25px;border: 1px solid #fff;margin: 2px;padding: 0;float: left;
    }
    .dropdown-menu.color-list{
        max-width: 184px;margin-left: 10px;padding: 4px;
    }
    .btn-color:after{
        content: "";
        display: block;
        position: absolute;
        top: 50%;
        right: 4px;
        width: 0;
        height: 0;
        border: 3px solid;
        margin-top: -2px;
        border-color: #fff transparent transparent transparent;
    }

    .btn-color:before {
        content: "";
        display: block;
        position: absolute;
        top: 50%;
        right: 4px;
        width: 0;
        height: 0;
        border: 3px solid;
        margin-top: -1px;
        border-color: #000 transparent transparent transparent;
    }
</style>
<form <?php if(cv('app.setting.edit')) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data" >

<div class="page-header">
    当前位置：
    <span class="text-primary">小程序设置</span>
</div>

<div class="page-content" style="padding-bottom: 50px;">
    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('app/_tab', TEMPLATE_INCLUDEPATH)) : (include template('app/_tab', TEMPLATE_INCLUDEPATH));?>

    <div class="form-group-title">基本设置</div>
    <div class="form-group">
        <label class="col-lg control-label must">AppID(小程序ID)</label>
        <div class="col-sm-9">
            <input class="form-control valid" value="<?php  echo $sets['app']['appid'];?>" <?php if(cv('app.setting.edit')) { ?>name="set[appid]"<?php  } else { ?>disabled<?php  } ?> />
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label must" style="padding-top: 0;">AppSecret<br>(小程序密钥)</label>
        <div class="col-sm-9">
            <input class="form-control valid" name="set[secret]" value="<?php  echo $sets['app']['secret'];?>" <?php if(cv('app.setting.edit')) { ?>name="set[secret]"<?php  } else { ?>disabled<?php  } ?> />
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">维护小程序</label>
        <div class="col-sm-9">
            <label class="radio-inline"><input class="toggle" data-show="1" data-class="closetext" type="radio" value="1" <?php  if(!empty($sets['app']['isclose'])) { ?>checked<?php  } ?>  <?php if(cv('app.setting.edit')) { ?>name="set[isclose]"<?php  } else { ?>disabled<?php  } ?> > 维护中</label>
            <label class="radio-inline"><input class="toggle" data-show="0" data-class="closetext" type="radio" value="0" <?php  if(empty($sets['app']['isclose'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[isclose]"<?php  } else { ?>disabled<?php  } ?> >正常</label>
        </div>
    </div>

    <div class="form-group closetext" <?php  if(empty($sets['app']['isclose'])) { ?>style="display: none"<?php  } ?>>
    <label class="col-lg control-label must">维护说明</label>
    <div class="col-sm-9">
        <textarea class="form-control" <?php if(cv('app.setting.edit')) { ?>name="set[closetext]"<?php  } else { ?>disabled<?php  } ?>><?php  echo $sets['app']['closetext'];?></textarea>
    </div>
</div>

<?php  if(com('sms')&&com('wap')) { ?>
<div class="form-group">
    <label class="col-lg control-label">开启用户绑定</label>
    <div class="col-sm-9">
        <label class="radio-inline"><input class="toggle" data-show="1" data-class="openbind" type="radio" value="1" <?php  if(!empty($sets['app']['openbind'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[openbind]"<?php  } else { ?>disabled<?php  } ?>> 开启</label>
        <label class="radio-inline"><input class="toggle" data-show="0" data-class="openbind" type="radio" value="0" <?php  if(empty($sets['app']['openbind'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[openbind]"<?php  } else { ?>disabled<?php  } ?>>关闭</label>
        <div class="help-block">注意：如果<span class="text-danger">小程序开启用户绑定或者WAP端开启</span> 都为开启用户绑定</div>
    </div>
</div>

<div class="form-group openbind" <?php  if(empty($sets['app']['openbind'])) { ?>style="display: none"<?php  } ?>>
<label class="col-lg control-label must">绑定短信模板</label>
<div class="col-sm-9 col-xs-12">
    <select class="select2" style="display: block; width: 100%" <?php if(cv('app.setting.edit')) { ?>name="set[sms_bind]"<?php  } else { ?>disabled<?php  } ?>>
    <option value=''>从短信消息库中选择</option>
    <?php  if(is_array($sms_list)) { foreach($sms_list as $template_val) { ?>
    <option value="<?php  echo $template_val['id'];?>" <?php  if($sets['app']['sms_bind']==$template_val['id']) { ?>selected<?php  } ?>><?php  echo $template_val['name'];?></option>
    <?php  } } ?>
    </select>
</div>
</div>

<div class="form-group openbind" <?php  if(empty($sets['app']['openbind'])) { ?>style="display: none"<?php  } ?>>
<label class="col-lg control-label">绑定提示文字</label>
<div class="col-sm-9 col-xs-12">
    <textarea class="form-control" <?php if(cv('app.setting.edit')) { ?>name="set[bindtext]"<?php  } else { ?>disabled<?php  } ?>><?php  echo $sets['app']['bindtext'];?></textarea>
    <div class="help-block">提示：此处文字显示在会员中心提示绑定手机号位置，不填默认显示“绑定手机号可合并或同步您其他账号数据”</div>
</div>
</div>
<?php  } ?>

<?php  if($commission) { ?>
<div class="form-group">
    <label class="col-lg control-label">是否显示分销</label>
    <div class="col-sm-9">
        <label class="radio-inline"><input type="radio" value="0" <?php  if(empty($sets['app']['hidecom'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[hidecom]"<?php  } else { ?>disabled<?php  } ?> >显示</label>
        <label class="radio-inline"><input type="radio" value="1" <?php  if(!empty($sets['app']['hidecom'])) { ?>checked<?php  } ?>  <?php if(cv('app.setting.edit')) { ?>name="set[hidecom]"<?php  } else { ?>disabled<?php  } ?> > 不显示</label>
        <div class="help-block">提示：此处关闭后则不在会员中心显示分销入口</div>
    </div>
</div>
<?php  } ?>

<div class="form-group">
    <label class="col-lg control-label">模板消息链接</label>
    <div class="col-sm-9">
        <label class="radio-inline"><input type="radio" value="1" <?php  if(!empty($sets['app']['sendappurl'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[sendappurl]"<?php  } else { ?>disabled<?php  } ?>> 优先使用小程序</label>
        <label class="radio-inline"><input type="radio" value="0" <?php  if(empty($sets['app']['sendappurl'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[sendappurl]"<?php  } else { ?>disabled<?php  } ?>>优先使用公众号</label>
        <div class="help-block">小程序开启后,系统默认模板消息使用的详情链接优先使用小程序链接</div>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">快捷导航(商品详情)</label>
    <div class="col-sm-9">
        <label class="radio-inline"><input type="radio" value="0" <?php  if(empty($sets['app']['navbar'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[navbar]"<?php  } else { ?>disabled<?php  } ?>> 样式一</label>
        <label class="radio-inline"><input type="radio" value="1" <?php  if(!empty($sets['app']['navbar'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[navbar]"<?php  } else { ?>disabled<?php  } ?>> 样式二</label>

        <div class="help-block">仅在商品详情悬浮显示，<a href="javascript:;" data-placement="right" data-toggle="popover" data-trigger="hover" data-html="true" data-content="<img src='../addons/ewei_shopv2/plugin/app/static/images/navbar.png'>">预览样式</a></div>
    </div>
</div>

<!--<div class="form-group">-->
<!--    <label class="col-lg control-label must">授权页背景图</label>-->
<!--    <div class="col-md-9">-->
<!--        <?php  echo tpl_form_field_image2('auth_background_image',$sets['app']['auth_background_image'])?>-->
<!--        <span class="help-block image-block">小程序授权页面背景图，不设置使用默认图片。</span>-->
<!--        <span class="help-block">建议尺寸****。</span>-->
<!--    </div>-->
<!--</div>-->

<div class="form-group">
    <label class="col-lg control-label">授权方式</label>
    <div class="col-sm-9">
        <label class="radio-inline"><input type="radio" value="0" name="set[force_auth]" <?php  if(empty($sets['app']['force_auth'])) { ?>checked<?php  } ?>>下单授权</label>
        <label class="radio-inline"><input type="radio" value="1" name="set[force_auth]" <?php  if($sets['app']['force_auth'] == 1) { ?>checked<?php  } ?>>首页授权</label>
        <div class="help-block">下单授权：购买、加入购物车、会员中心页时强制授权。</div>
        <div class="help-block">首页授权：启动小程序时强制授权。（推荐使用）</div>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label" style="padding-top: 0;">核销二维码生成链接<br>(公众号业务域名)</label>
    <div class="col-sm-9">
        <input class="form-control valid" name="set[verifyurl]" value="<?php  echo $sets['app']['verifyurl'];?>" <?php if(cv('app.setting.edit')) { ?>name="set[verifyurl]"<?php  } else { ?>disabled<?php  } ?> />
        <div class="help-block">请填写带有https或者http的完整域名 <span style="color: red"> (最后不要带/)</span></div>
    </div>
</div>



<div class="form-group-title">客服功能</div>
<div class="form-group">
    <label class="col-lg control-label">客服功能</label>
    <div class="col-sm-9">
        <label class="radio-inline"><input class="toggle" data-show="1" data-class="block-kfbtn" type="radio" value="1" <?php  if(!empty($sets['app']['customer'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[customer]"<?php  } else { ?>disabled<?php  } ?>> 开启</label>
        <label class="radio-inline"><input class="toggle" data-class="block-kfbtn" type="radio" value="0" <?php  if(empty($sets['app']['customer'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[customer]"<?php  } else { ?>disabled<?php  } ?>>关闭</label>
        <div class="help-block">客服按钮显示位置：首页、商品详情页、会员中心页、订单详情页 <a href="https://mpkf.weixin.qq.com/" target="_blank">客服登录地址</a></div>
    </div>
</div>
<input type="hidden" name="set[customercolor]" value="<?php  echo $customercolor;?>" id="customercolors">
<div class="form-group">
    <label class="col-lg control-label">电话客服</label>
    <div class="col-sm-9">
        <label class="radio-inline"><input class="toggle" data-show="1" data-class="block-phonebtn" type="radio" value="1" <?php  if(!empty($sets['app']['phone'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[phone]"<?php  } else { ?>disabled<?php  } ?>> 开启</label>
        <label class="radio-inline"><input class="toggle" data-class="block-phonebtn" type="radio" value="0" <?php  if(empty($sets['app']['phone'])) { ?>checked<?php  } ?> <?php if(cv('app.setting.edit')) { ?>name="set[phone]"<?php  } else { ?>disabled<?php  } ?>>关闭</label>
        <div class="help-block">客服按钮显示位置：首页、商品详情页、会员中心页、订单详情页</div>
    </div>
</div>
<div class="form-group block-phonebtn"  <?php  if(empty($sets['app']['phonenumber'])) { ?>style="display: none;"<?php  } ?>>
<label class="col-lg control-label">电话号码</label>
<div class="col-sm-9">
    <input class="form-control" type="text" name="set[phonenumber]" value="<?php  echo $sets['app']['phonenumber'];?>">
            <div class="help-block">请填写正确的座机号码或手机号码</div>
</div>
</div>
<div class="form-group block-phonebtns">
    <label class="col-lg control-label">按钮颜色</label>
    <div class="col-sm-9">
        <div class="btn btn-default btn-color <?php if(cv('app.setting.edit')) { ?><?php  } else { ?>disabled<?php  } ?>" data-toggle="dropdown" aria-expanded="false" id="phonecolor">
            <div class="inner" style="background: <?php  echo $phonecolor;?>;"></div>
            <input type="hidden" name="set[phonecolor]" value="<?php  echo $phonecolor;?>">
        </div>
        <?php if(cv('app.setting.edit')) { ?>
        <div class="dropdown-menu color-list">
            <?php  if(is_array($phonecolors)) { foreach($phonecolors as $color) { ?>
            <div class="color-block phone" style="background: <?php  echo $color;?>;" data-color="<?php  echo $color;?>"></div>
            <?php  } } ?>
        </div>
        <?php  } ?>
    </div>
</div>

<div class="form-group-title">模板消息</div>
<div class="alert alert-danger">模板消息下发条件说明：当用户在小程序内完成1次微信支付时，可向用户在7天内推送3条模板消息，<b>余额支付则将不能触发</b></div>

<div class="form-group">
    <label class="col-lg control-label">买家支付通知模板</label>
    <div class="col-sm-9">
        <select class="form-control select2" <?php if(cv('app.setting.edit')) { ?>name="set[tmessage_pay]" <?php  } else { ?>disabled<?php  } ?>>
        <option>请选择消息模板</option>
        <?php  if(is_array($tmsg_list)) { foreach($tmsg_list as $trow) { ?>
        <option value="<?php  echo $trow['id'];?>" <?php  if($sets['app']['tmessage_pay']==$trow['id']) { ?>selected<?php  } ?>><?php  echo $trow['name'];?></option>
        <?php  } } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">卖家发货通知模板</label>
    <div class="col-sm-9">
        <select class="form-control select2" <?php if(cv('app.setting.edit')) { ?>name="set[tmessage_send]" <?php  } else { ?>disabled<?php  } ?>>
        <option>请选择消息模板</option>
        <?php  if(is_array($tmsg_list)) { foreach($tmsg_list as $trow) { ?>
        <option value="<?php  echo $trow['id'];?>" <?php  if($sets['app']['tmessage_send']==$trow['id']) { ?>selected<?php  } ?>><?php  echo $trow['name'];?></option>
        <?php  } } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">自动发货通知模板</label>
    <div class="col-sm-9">
        <select class="form-control select2" <?php if(cv('app.setting.edit')) { ?>name="set[tmessage_virtualsend]" <?php  } else { ?>disabled<?php  } ?>>
        <option>请选择消息模板</option>
        <?php  if(is_array($tmsg_list)) { foreach($tmsg_list as $trow) { ?>
        <option value="<?php  echo $trow['id'];?>" <?php  if($sets['app']['tmessage_virtualsend']==$trow['id']) { ?>selected<?php  } ?>><?php  echo $trow['name'];?></option>
        <?php  } } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <lab的el class="col-lg control-label">买家收货通知模板</lab的el>
    <div class="col-sm-9">
        <select class="form-control select2" <?php if(cv('app.setting.edit')) { ?>name="set[tmessage_finish]" <?php  } else { ?>disabled<?php  } ?>>
        <option>请选择消息模板</option>
        <?php  if(is_array($tmsg_list)) { foreach($tmsg_list as $trow) { ?>
        <option value="<?php  echo $trow['id'];?>" <?php  if($sets['app']['tmessage_finish']==$trow['id']) { ?>selected<?php  } ?>><?php  echo $trow['name'];?></option>
        <?php  } } ?>
        </select>
    </div>
</div>

<?php if(cv('app.setting.pay')) { ?>
<div class="form-group-title">微信支付</div>
<div class="alert alert-primary">在开启微信支付前，请到 <a href="https://mp.weixin.qq.com" target="_blank">微信公众平台</a> 去申请小程序微信支付。</div>

<div class="form-group">
    <label class="col-lg control-label">微信支付</label>
    <div class="col-sm-9">
        <label class="radio-inline">
            <input class="toggle" data-show="1" data-class="wxpay-group" type="radio" value="1" name="pay[wxapp]" <?php  if(!empty($sets['pay']['wxapp'])) { ?>checked<?php  } ?>> 开启</label>
        <label class="radio-inline">
            <input class="toggle" data-show="0" data-class="wxpay-group" type="radio" value="0" name="pay[wxapp]" <?php  if(empty($sets['pay']['wxapp'])) { ?>checked<?php  } ?>> 关闭</label>
    </div>
</div>

<div class="wxpay-group" <?php  if(empty($sets['pay']['wxapp'])) { ?>style="display: none;"<?php  } ?>>
<div class="form-group">
    <label class="col-lg control-label must">商户号(Mch_ID)</label>
    <div class="col-sm-9">
        <input class="form-control valid" value="<?php  echo $sec['wxapp']['mchid'];?>" <?php if(cv('app.setting.pay')) { ?> name="pay[wxapp_mchid]"<?php  } else { ?>disabled<?php  } ?> />
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label must">微信支付密钥(APIKEY)</label>
    <div class="col-sm-9">
        <input class="form-control valid" value="<?php  echo $sec['wxapp']['apikey'];?>" <?php if(cv('app.setting.pay')) { ?> name="pay[wxapp_apikey]"<?php  } else { ?>disabled<?php  } ?> />
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">CERT证书文件</label>
    <div class="col-sm-9 col-xs-12">
        <input type="hidden" name="pay[wxapp_cert]" value="<?php  echo $sets['pay']['wxapp_cert'];?>"/>
        <?php if(cv('app.pay.edit')) { ?>
        <input type="file" name="wxapp_cert_file" class="form-control" />
        <span class="help-block">
                                        <?php  if(!empty($sec['wxapp_cert'])) { ?>
                                            <span class='label label-success'>已上传</span>
                                        <?php  } else { ?>
                                            <span class='label label-danger'>未上传</span>
                                        <?php  } ?>
                                        下载证书 cert.zip 中的 apiclient_cert.pem 文件
                                    </span>
        <?php  } else { ?>
        <?php  if(!empty($sec['wxapp_cert'])) { ?>
        <span class='label label-success'>已上传</span>
        <?php  } else { ?>
        <span class='label label-danger'>未上传</span>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">KEY密钥文件</label>
    <div class="col-sm-9 col-xs-12">
        <input type="hidden" name="pay[wxapp_key]" value="<?php  echo $sets['pay']['wxapp_key'];?>"/>
        <?php if(cv('app.pay.edit')) { ?>
        <input type="file" name="wxapp_key_file" class="form-control" />
        <span class="help-block">
                                        <?php  if(!empty($sec['wxapp_key'])) { ?>
                                            <span class='label label-success'>已上传</span>
                                        <?php  } else { ?>
                                            <span class='label label-danger'>未上传</span>
                                        <?php  } ?>
                                        下载证书 cert.zip 中的 apiclient_key.pem 文件
                                    </span>
        <?php  } else { ?>
        <?php  if(!empty($sec['wxapp_key'])) { ?>
        <span class='label label-success'>已上传</span>
        <?php  } else { ?>
        <span class='label label-danger'>未上传</span>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">ROOT文件</label>
    <div class="col-sm-9 col-xs-12">
        <input type="hidden" name="pay[wxapp_root]" value="<?php  echo $sets['pay']['wxapp_root'];?>"/>
        <?php if(cv('app.pay.edit')) { ?>
        <input type="file" name="wxapp_root_file" class="form-control" />
        <span class="help-block">
                                        <?php  if(!empty($sec['wxapp_root'])) { ?>
                                            <span class='label label-success'>已上传</span>
                                        <?php  } else { ?>
                                            <span class='label label-danger'>未上传</span>
                                        <?php  } ?>
                                        下载证书 cert.zip 中的 rootca.pem 文件,新下载证书无需上传此文件！
                                    </span>
        <?php  } else { ?>
        <?php  if(!empty($sec['root'])) { ?>
        <span class='label label-success'>已上传</span>
        <?php  } else { ?>
        <span class='label label-danger'>未上传</span>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>
</div>
<?php  } ?>

<?php if(cv('app.setting.edit')) { ?>
<div class="form-group" style="margin-top: 20px;"><label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <input type="submit" value="提交" class="btn btn-primary">
    </div>
</div>
<?php  } ?>

</div>
</form>

<script type="text/javascript">
    $(function () {
        $(".toggle").unbind('click').click(function () {
            var show = $(this).data('show');
            var classs = $(this).data('class');
            var eml = $("."+classs);
            if(show){
                eml.show();
            }else {
                eml.hide();
            }
        });
//        $('.color-list .customer').click(function () {
//            var color = $(this).data('color');
//            $('#customercolor .inner').css('background', color);
//            $('#customercolor input').val(color);
//            $('#phonecolor .inner').css('background', color);
//            $('#phonecolor input').val(color);
//        });
        $('.color-list .phone').click(function () {
            var color = $(this).data('color');
            $('#customercolor .inner').css('background', color);
            $('#customercolors').val(color);
            $('#phonecolor .inner').css('background', color);
            $('#phonecolor input').val(color);
        });

        $('.color-list .phone').mousemove(function(){
            $(this).css('border','1px solid #000')
        })

        $('.color-list .phone').mouseout(function(){
            $(this).css('border','1px solid #fff')
        })

        $("input[name='set[phonenumber]']").blur(function(){
            var phone = $(this).val();
            var status = checkTel(phone);
            if(status == false){
                tip.msgbox.err('请填写正确手机号码或座机号码');
                return;
            }
        });


        $("form").submit(function () {
            var openbind = $("input[name='data[openbind]']:checked").val();
            if(openbind==1){
                var sms_bind = $("select[name='data[sms_bind]'] option:selected").val();
                if(!sms_bind){
                    tip.msgbox.err('开启用户绑定请先选择绑定短信模板');
                    $('form').attr('stop',1);
                    return;
                }
            }

            $('form').removeAttr('stop');
            return true;
        });
    });

    function checkTel(tel)
    {
        tel = tel.split('-').join('')
        // 港澳大陆通用正则表达式
        var mobile = /^[1][3-8]\d{9}$|^([6|9])\d{7}$|^[0][9]\d{8}$|^[6]([8|6])\d{5}$/;
        var telphone = /^\d{7,8}$|^\d{10,12}$/;
        return mobile.test(tel) || telphone.test(tel);
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>