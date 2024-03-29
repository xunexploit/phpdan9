<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
	<label class="col-lg control-label">开启商品送积分</label>
	<div class="col-sm-9 col-xs-12">
		<label class="checkbox-inline"><input type="radio" name="isgoodspoint" value="0" <?php  if(empty($credit1['isgoodspoint']) || $credit1['isgoodspoint'] == 0) { ?>checked="true"<?php  } ?>   /> 否</label>
		<label class="checkbox-inline"><input type="radio" name="isgoodspoint" value="1" <?php  if(!empty($credit1['isgoodspoint']) && $credit1['isgoodspoint'] == 1) { ?>checked="true"<?php  } ?>   /> 是</label>
		<span class="help-block">开启后会以商品赠送积分为准</span>
	</div>
</div>

<div class="form-group">
	<label class="col-lg control-label">购物送积分</label>
	<div class="col-sm-9">
		<div class='recharge-items'>
			<?php  if(is_array($enough1)) { foreach($enough1 as $it) { ?>
			<div class="input-group recharge-item fixmore-input-group" style="margin-top:5px">
				<span class="input-group-addon">购物</span>
				<input type="text" class="form-control" name='enough1_1[]' value='<?php  echo $it['enough1_1'];?>' />
				<span class="input-group-addon">元至</span>
				<input type="text" class="form-control" name='enough1_2[]' value='<?php  echo $it['enough1_2'];?>' />
				<span class="input-group-addon">元&nbsp;&nbsp;|&nbsp;&nbsp;每消费1元赠送</span>
				<input type="text" class="form-control"  name='give1[]' value='<?php  echo $it['give1'];?>' />
				<span class="input-group-addon">积分</span>
				<div class='input-group-btn'>
					<button class='btn btn-danger' type='button' onclick="$(this).parents('.recharge-item').remove()"><i class='fa fa-remove'></i></button>
				</div>
			</div>
			<?php  } } ?>
		</div>
		<div style="margin-top:5px">
			<button type='button' class="btn btn-default" onclick='addConsumeItem(this,"购物","enough1_1","enough1_2","give1")' style="margin-bottom:5px"><i class='fa fa-plus'></i> 增加优惠项</button>
		</div>
		<span class="help-block">两项都填写才能生效 例如 填写 满10元 赠送比例为1比1积分  则赠送10*1=10积分<span style="color: red">(赠送的积分请填写整数)</span></span>
	</div>
</div>

<div class="form-group">
	<label class="col-lg control-label">适用场景</label>
	<div class="col-sm-9 col-xs-12">
		<label class="checkbox-inline"><input type="checkbox" name="paytype[1]" value="1" <?php  if(!empty($credit1['paytype']['1'])) { ?>checked="true"<?php  } ?>   /> 余额支付</label>
		<label class="checkbox-inline"><input type="checkbox" name="paytype[21]" value="1" <?php  if(!empty($credit1['paytype']['21'])) { ?>checked="true"<?php  } ?>   /> 微信支付</label>
		<label class="checkbox-inline"><input type="checkbox" name="paytype[22]" value="1" <?php  if(!empty($credit1['paytype']['22'])) { ?>checked="true"<?php  } ?>   /> 支付宝支付</label>
		<label class="checkbox-inline"><input type="checkbox" name="paytype[3]" value="1" <?php  if(!empty($credit1['paytype']['3'])) { ?>checked="true"<?php  } ?>   /> 货到付款</label>
		<?php  if(p('cashier')) { ?>
		<label class="checkbox-inline"><input type="checkbox" name="paytype[37]" value="1" <?php  if(!empty($credit1['paytype']['37'])) { ?>checked="true"<?php  } ?>   /> 收银台消费</label>
		<?php  } ?>
	</div>
</div>