<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label">结算周期</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('globonus.shareholder.edit')) { ?>
        <label class="radio radio-inline" >
            <input type="radio" name="data[paytype]" value="1" <?php  if($data['paytype']==1) { ?>checked<?php  } ?>/> 按月发放
        </label>
        <label class="radio radio-inline">
            <input type="radio" name="data[paytype]" value="2" <?php  if($data['paytype']==2) { ?>checked<?php  } ?>/> 按周发放
        </label>

        <span class="help-block">分红结算周期</span>
        <?php  } else { ?>
        <?php  if($data['paytype']==1 || empty($data['paytype'])) { ?>按月结算<?php  } ?>
        <?php  if($data['paytype']==2) { ?>按周结算<?php  } ?>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">结算形式</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('globonus.shareholder.edit')) { ?>
        <label class="radio radio-inline" >
            <input type="radio" name="data[moneytype]" value="0" <?php  if($data['moneytype']==0) { ?>checked<?php  } ?>/> 余额
        </label>
        <label class="radio radio-inline">
            <input type="radio" name="data[moneytype]" value="1" <?php  if($data['moneytype']==1) { ?>checked<?php  } ?>/> 微信钱包
        </label>

        <span class="help-block">结算打款形式, 如果选择了微信钱包形式，某个股东结算金额不足1元，会自动结算到该股东的商城余额</span>
        <?php  } else { ?>
        <?php  if($data['moneytype']==1 || empty($data['moneytype'])) { ?>余额<?php  } ?>
        <?php  if($data['moneytype']==2) { ?>微信钱包<?php  } ?>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">分红比例</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('globonus.set.edit')) { ?>
        <div class='input-group fixsingle-input-group' >
            <input type='text' class='form-control' name='data[bonusrate]' value="<?php  echo $data['bonusrate'];?>" />
            <div class='input-group-addon'>%</div>
        </div>
        <span class="help-block">如果为空的话则按照原价 进行分红</span>
        <?php  } else { ?>
        <?php  echo $data['bonusrate'];?>%
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">订单结算天数</label>
    <div class="col-sm-9 col-xs-12 ">
        <div class="input-group fixsingle-input-group">
        <?php if(cv('globonus.set.edit')) { ?>
        <input type="text" name="data[settledays]" class="form-control" value="<?php  echo $data['settledays'];?>"  />
        <span class="help-block">当订单完成后的n天后才纳入到分红结算, 设置空或0则收货就进行结算</span>
        <?php  } else { ?>
        <?php  echo $data['settledays'];?>
        <?php  } ?>
            </div>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">分红提现手续费</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('globonus.set.edit')) { ?>
        <div class="input-group fixsingle-input-group">
            <input type="text" name="data[paycharge]" class="form-control" value="<?php  echo $data['paycharge'];?>" />
            <div class="input-group-addon">%</div>
        </div>
        <span class="help-block">发放分红时,扣除的提现手续费.空为不扣除提现手续费</span>
        <?php  } else { ?>
        <?php echo empty($data['paycharge'])?"0":$data['paycharge']?>%
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">免提现手续费金额区间</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('sysset.trade.edit')) { ?>
        <div class='input-group fixmore-input-group'>
            <span class='input-group-addon'>开始金额￥</span>
            <input type="text" name="data[paybegin]" class="form-control" value="<?php  echo $data['paybegin'];?>" />
            <span class='input-group-addon'>结束金额￥</span>
            <input type="text" name="data[payend]" class="form-control" value="<?php  echo $data['payend'];?>" />
        </div>
        <span class='help-block'>当提现手续费金额在此区间内时,不扣除提现手续费. 结束金额 必须大于 开始金额才能生效</span>
        <span class='help-block'>例如 设置开始金额0元 结束金额5元,只有提现手续费金额高于5元时,才扣除</span>
        <?php  } else { ?>
        <input type="hidden" name="data[paybegin]" value="<?php  echo $data['paybegin'];?>"/>
        <input type="hidden" name="data[payend]" value="<?php  echo $data['payend'];?>"/>
        <div class='form-control-static'>
            <?php  echo $data['paybegin'];?> 元 - <?php  echo $data['payend'];?>元
        </div>
        <?php  } ?>
    </div>
</div>

<!--OTEzNzAyMDIzNTAzMjQyOTE0-->