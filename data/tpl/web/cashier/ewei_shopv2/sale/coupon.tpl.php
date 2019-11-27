<?php defined('IN_IA') or exit('Access Denied');?>            <div class="form-group">
                <label class="col-sm-2 control-label">赠送优惠券时间</label>
                <div class="col-sm-4 col-xs-6">
                    <?php echo tpl_form_field_eweishop_daterange('coupontime', array('starttime'=>date('Y-m-d H:i', !empty($item['coupontime']['start'])?$item['coupontime']['start']:time()),'endtime'=>date('Y-m-d H:i', !empty($item['coupontime']['end'])?$item['coupontime']['end']:time())),true);?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">赠送优惠券时间段</label>
                <div class="col-sm-8 col-xs-12" id="addcoupontime">
                    <?php  if(is_array($item['coupontime']['start1'])) { foreach($item['coupontime']['start1'] as $key => $value) { ?>
                    <div class="input-group" style="margin-top: 10px;margin-bottom: 10px">
                        <input type="number" name="data[coupontime][start1][]" class="form-control" value="<?php  echo $item['coupontime']['start1'][$key];?>">
                        <span class="input-group-addon">:</span>
                        <input type="number" name="data[coupontime][start2][]" class="form-control valid" value="<?php  echo $item['coupontime']['start2'][$key];?>">
                        <span class="input-group-addon">至</span>
                        <input type="number" name="data[coupontime][end1][]" class="form-control" value="<?php  echo $item['coupontime']['end1'][$key];?>">
                        <span class="input-group-addon">:</span>
                        <input type="number" name="data[coupontime][end2][]" class="form-control" value="<?php  echo $item['coupontime']['end2'][$key];?>">
                        <span class="input-group-btn"><button type="button" class="btn btn-danger" onclick="$(this).parents('.input-group').remove()">删除</button></span>
                    </div>
                    <?php  } } ?>
                    <div></div>
                    <div style="margin-top:5px">
                        <button type='button' class="btn btn-default" onclick='addrandtime(this,"coupontime")' style="margin-bottom:5px"><i class='fa fa-plus'></i> 添加区间</button>
                    </div>
                    <div class="help-block">如果赠送优惠券时间段为空 则赠送优惠券时间为全天~</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">最低支付</label>
                <div class="col-sm-8">
                    <div class='input-group'>
                        <span class="input-group-addon">支付金额不低于</span>
                        <input type="number" name="data[coupon][minmoney]" value="<?php  echo $item['coupon']['minmoney'];?>" class="form-control" step="0.01"/>
                        <span class='input-group-addon'> 元</span>
                    </div>
                    <div class="help-block">如果 为空 或者 0 则为不限制支付金额</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">可用优惠卷</label>
                <div class="col-sm-8 col-xs-12">
                    <?php  echo tpl_selector('couponid',array(
			'preview'=>true,
                    'readonly'=>true,
                    'multi'=>0,
                    'value'=>null,
                    'nokeywords'=>true,
                    'url'=>cashierUrl('sale/querycoupons'),
                    'items'=>$coupon,
                    'buttontext'=>'选择优惠券',
                    'placeholder'=>'请选择优惠券')
                    )
                    ?>
                </div>
            </div>