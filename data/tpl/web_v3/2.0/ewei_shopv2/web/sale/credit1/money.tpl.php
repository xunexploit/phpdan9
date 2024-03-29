<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label">充值送积分</label>
    <div class="col-sm-9">
        <div class='recharge-items'>
            <?php  if(is_array($enough2)) { foreach($enough2 as $it) { ?>
            <div class="input-group recharge-item fixmore-input-group" style="margin-top:5px">
                <span class="input-group-addon">充值</span>
                <input type="text" class="form-control" name='enough2_1[]' value='<?php  echo $it['enough2_1'];?>' />
                <span class="input-group-addon">元至</span>
                <input type="text" class="form-control" name='enough2_2[]' value='<?php  echo $it['enough2_2'];?>' />
                <span class="input-group-addon">元&nbsp;&nbsp;|&nbsp;&nbsp;每消费1元赠送</span>
                <input type="text" class="form-control"  name='give2[]' value='<?php  echo $it['give2'];?>' />
                <span class="input-group-addon">积分</span>
                <div class='input-group-btn'>
                    <button class='btn btn-danger' type='button' onclick="$(this).parents('.recharge-item').remove()"><i class='fa fa-remove'></i></button>
                </div>
            </div>
            <?php  } } ?>
        </div>
        <div style="margin-top:5px">
            <button type='button' class="btn btn-default" onclick='addConsumeItem(this,"充值","enough2_1","enough2_2","give2")' style="margin-bottom:5px"><i class='fa fa-plus'></i> 增加优惠项</button>
        </div>
        <span class="help-block">两项都填写才能生效 例如 填写 满10元 赠送比例为1比1积分  则赠送10*1=10积分 <br/>这里的充值送积分可能和交易设置里面的账户充值送积分有冲突,如果您在这里设置了,那边会相应的关闭(避免重复赠送)</span>
    </div>
</div>
<!--OTEzNzAyMDIzNTAzMjQyOTE0-->