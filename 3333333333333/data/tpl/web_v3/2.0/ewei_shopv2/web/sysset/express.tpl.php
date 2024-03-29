<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary">物流信息接口</span>
</div>

<div class="page-content">
    <div class="alert alert-primary">
        <p>提示：</p>
        <p>快递鸟接口：目前“百世快递、申通快递、天天快递”不支持免费查询。</p>
        <p>快递100接口：商城内置接口，因接口变更，暂时关闭。您可根据需求申请/购买快递100账号，使用免费接口和企业接口。</p>
        <!--<p>提示：内置物流接口可能不稳定，您可申请/购买快递100正式接口(根据需求)</p>-->
        <!--<p>类型：商城内置接口(因快递100接口变更，商城内置接口暂时关闭); 免费接口(需要申请,相对稳定); 企业接口(收费,稳定性高)</p>-->
    </div>

    <form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data">

        <div class="form-group">
            <label class="col-lg control-label">类型选择</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('sysset.express.edit')) { ?>
                <label class="radio-inline"><input type="radio" class="express_type" data-show="express_type1" data-hide="expresstype" name="express_type" value="0" <?php  if(empty($data['express_type'])) { ?>checked="checked"<?php  } ?> /> 快递鸟</label>
                <label class="radio-inline"><input type="radio" class="express_type" data-show="express_type2" data-hide="expresstype" name="express_type" value="1" <?php  if($data['express_type']==1) { ?>checked="checked"<?php  } ?> /> 快递100</label>
                <label class="radio-inline"><input type="radio" class="express_type" data-show="express_type3" data-hide="expresstype" name="express_type" value="2" <?php  if($data['express_type']==2) { ?>checked="checked"<?php  } ?> /> 阿里云接口</label>
                <?php  } ?>
            </div>
        </div>

        <div class="expresstype express_type1" <?php  if($data['express_type'] != 0) { ?>style="display: none"<?php  } ?>>
            <div class="form-group">
                <label class="col-lg control-label">用户ID</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <input type="text" name="express_bird_userid" class="form-control" value="<?php  echo $data['express_bird']['express_bird_userid'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['express_bird']['express_bird_userid'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg control-label">API key</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <input type="text" name="express_bird_apikey" class="form-control" value="<?php  echo $data['express_bird']['express_bird_apikey'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['express_bird']['express_bird_apikey'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg control-label">数据缓存时间</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <div class="input-group">
                        <input type="text" name="express_bird_cache" class="form-control" value="<?php  echo intval($data['express_bird']['express_bird_cache'])?>"/>
                        <span class="input-group-addon">分钟</span>
                    </div>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo intval($data['express_bird']['express_bird_cache'])?>分钟</div>
                    <?php  } ?>
                    <div class="help-block">正式接口可能存在次数限制问题, 设置缓存时间后在指定时间内只读取缓存并不调用接口(数据可能会延迟)</div>
                </div>
            </div>



            <div class="form-group">
                <label class="col-lg control-label">京东商家编码</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <input type="text" name="express_bird_customer_name" class="form-control" value="<?php  echo $data['express_bird']['express_bird_customer_name'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['express_bird']['express_bird_customer_name'];?></div>
                    <?php  } ?>
                    <div class="help-block">若您使用京东物流，则需填写‘京东商家编码’，否则将会造成物流信息无法查询</div>
                </div>
            </div>
        </div>


        <div class="expresstype express_type2" <?php  if($data['express_type'] != 1) { ?>style="display: none"<?php  } ?>>
            <div class="form-group">
                <label class="col-lg control-label">接口类型</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <label class="radio-inline"><input type="radio" class="toggle" data-show="" data-hide="type" name="isopen" disabled="true" value="0" <?php  if(empty($data['express_one_hundred']['isopen'])) { ?>checked="checked"<?php  } ?> /> 商城内置接口</label>
                    <label class="radio-inline"><input type="radio" class="toggle" data-show="type1" data-hide="type" name="isopen" value="1" <?php  if($data['express_one_hundred']['isopen']==1) { ?>checked="checked"<?php  } ?> /> 免费接口</label>
                    <label class="radio-inline"><input type="radio" class="toggle" data-show="type2" data-hide="type" name="isopen" value="2" <?php  if($data['express_one_hundred']['isopen']==2) { ?>checked="checked"<?php  } ?> /> 企业接口</label>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php echo empty($data['express_one_hundred']['isopen'])?"默认免费接口":"正式接口"?></div>
                    <?php  } ?>
                    <div style="color: #999;margin-top: 10px">因快递100接口变更，商城内置接口暂时关闭</div>
                </div>
            </div>

            <div class="form-group type type1 type2" <?php  if(empty($data['express_one_hundred']['isopen'])) { ?>style="display: none"<?php  } ?>>
                <label class="col-lg control-label" style="padding-top: 0;">授权密匙<br>(Key)</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <input type="text" name="apikey" class="form-control" value="<?php  echo $data['express_one_hundred']['apikey'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['express_one_hundred']['apikey'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group type type2" <?php  if($data['express_one_hundred']['isopen']<2) { ?>style="display: none"<?php  } ?>>
                <label class="col-lg control-label" style="padding-top: 0;">公司编号<br>(Customer)</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <input type="text" name="customer" class="form-control" value="<?php  echo $data['express_one_hundred']['customer'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['express_one_hundred']['customer'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group type type1 type2" <?php  if(empty($data['express_one_hundred']['isopen'])) { ?>style="display: none"<?php  } ?>>
                <label class="col-lg control-label">数据缓存时间</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <div class="input-group">
                        <input type="text" name="cache" class="form-control" value="<?php  echo intval($data['express_one_hundred']['cache'])?>"/>
                        <span class="input-group-addon">分钟</span>
                    </div>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo intval($data['express_one_hundred']['cache'])?>分钟</div>
                    <?php  } ?>
                    <div class="help-block">正式接口可能存在次数限制问题, 设置缓存时间后在指定时间内只读取缓存并不调用接口(数据可能会延迟)</div>
                </div>
            </div>
        </div>

        <div class="expresstype express_type3" <?php  if($data['express_type'] != 2) { ?>style="display: none"<?php  } ?>>
            <div class="form-group">
                <label class="col-lg control-label"><span style="color: #ff0000">*</span>阿里云APPCODE</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.express.edit')) { ?>
                    <input type="text" name="aliappcode" required class="form-control" value="<?php  echo $data['express_ali']['aliappcode'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['express_ali']['aliappcode'];?></div>
                    <?php  } ?>
                    <div class="help-block">用于获取物流信息，<a target="_blank" href="https://market.aliyun.com/products/56928004/cmapi023201.html?spm=5176.10695662.1996646101.searchclickresult.60ff5399ppm0i7#sku=yuncode1720100006" style="color: #0066cc">阿里云接口申请</a></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('sysset.express.edit')) { ?>
                <input type="submit" value="提交" class="btn btn-primary"/>
                <?php  } ?>
            </div>
        </div>

    </form>
</div>

<script type="text/javascript">
    $(".express_type").unbind('click').click(function () {
        var hide = $(this).data('hide');
        var show = $(this).data('show');
        if(hide){
            $("."+hide).hide();
        }
        if(show){
            $("."+show).show();
        }
    });
    $(".toggle").unbind('click').click(function () {
        var hide = $(this).data('hide');
        var show = $(this).data('show');
        if(hide){
            $("."+hide).hide();
        }
        if(show){
            $("."+show).show();
        }
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
