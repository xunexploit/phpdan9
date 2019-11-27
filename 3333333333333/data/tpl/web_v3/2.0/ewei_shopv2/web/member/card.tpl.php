<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/static/css/card/index.css"/>
<style type="text/css">
	.preview{
		margin-top: 30px;
		float: left;
		width: 318px;
		margin-left:30px;
		padding-bottom: 150px;
		overflow: hidden;
		background-color:#f6f6f8;
		border: 1px solid #e7e7eb;
		position: static;
	}

	.basic{
		float: left;
		width: 492px;
		height: 600px;
		border: 1px solid #e5e5e5;
		margin: 30px 0 0 30px;
	}
	.basic .header{
		font-size: 14px;
		height: 60px;
		width: 100%;
		background: #ececec;
		line-height: 60px;
		padding: 0 40px;
		color: #000;
	}
	.delete_card{
		font-size: 12px;
		float: right;
		color: #999;
	}
	.delete_card:hover{
		text-decoration: none;
	}
	.basic .basic_content{
		padding: 0 40px;
	}
	.basic .card_cell{
		height:80px;
		line-height: 78px;
		border-bottom: 1px solid #efefef;
		position: relative;
	}
	.basic .card_cell .text{
		color: #999;
		font-size: 12px;
		float: right;
	}
	.basic .card_cell .remark{
		font-size: 24px;
		float: right;
		color: #000;
	}
	.edit_btn{
		display: inline-block;
		height: 50px;
		width: 195px;
		color: #fff;
		text-align: center;
		line-height: 50px;
		border-radius: 4px;
		margin-top: 40px;
		text-decoration: none;
		cursor: pointer;
	}
	.edit_btn:hover{
		color: #fff;
		text-decoration: none;
	}

	.edit_card{
		background: #1ab394;
	}
	.act_card{
		background: #f9f9f9;
		color:#1ab394 ;
		border: 1px solid #e5e5e5;
		margin-left: 15px;
	}
	.act_card:hover{
		color:#1ab394 ;
	}
	.card_empty{
		text-align: center;
		margin-top: 170px;
	}
	.card_empty p{
		line-height: 72px;
		font-size: 20px;
		color: #999;
	}
	.card_empty a{
		display: inline-block;
		width: 125px;
		height: 37px;
		border: 1px solid #2097f5;
		color: #2097f5;
		line-height: 35px;
		border-radius: 4px;
	}
	.card_empty a:hover{
		text-decoration: none;
	}
	.delete_sure{
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		font-family: '微软雅黑','Microsoft Yahei';
		z-index: 1000002;
		animation-duration: 0.6s;
	}
	.delete_sure.show{
		display: block;
	}
	.div_dailog {
		width: 280px;
		height: auto;
		background: rgb(255, 255, 255);
		border-radius: 4px;
		padding: 10px 16px;
		position: fixed;
		left: 50%;
		top: 50%;
		/*min-width: 240px;
        min-height: 130px;*/
		margin-top: -65px;
		margin-left: -120px;
	}
	.div_dailog .title{
		color: #C54D54;
		border-bottom: 1px dashed #D9534F;
		font-size: 20px;
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		padding: 10px 0;
		height: 40px;
	}
	.discription_dailog{
		padding: 14px 0 10px 0;
		font-size: 14px;
		text-indent: 16px;
		line-height: 1.6;
	}
	.dailog_divOperation{
		display: -webkit-flex;
		display: flex;
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		padding: 3px 2px;
		justify-content: flex-end;
		float: right;
		height: 36px;
	}
	.div_dailog .dailog_divOperation .btn_span{
		padding: 6px 10px;
		-webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px;
		cursor: pointer;
		font-size: 14px;
		line-height: normal;
		-moz-user-select: -moz-none;
		-ms-user-select: none;
		-webkit-user-select: none;
		user-select: none;
		color: #fff;
		background: #D9534F;
	}
	.div_dailog .dailog_divOperation .btn_span:first-child {
		margin-right: 10px;
	}
</style>
	<div class='page-header'>
		当前位置：<span class="text-primary">
			微信会员卡概述
		</span>
	</div>
	<div class="page-content">
	<div class="card_empty" <?php  if(!empty($card)) { ?> style="display: none" <?php  } ?>>
        <img src="../addons/ewei_shopv2/static/images/card_empty.jpg" alt="" />
        <p>暂无微信会员卡</p>
		<?php if(cv('member.card')) { ?>
			<a  href="<?php  echo webUrl('member/card/post')?>"> 去添加</a>
		<?php  } ?>
    </div>

	<div class="preview" <?php  if(empty($card)) { ?> style="display: none" <?php  } ?>>
		<div class="cart-top">
			<img src="../addons/ewei_shopv2/static/images/cart_top.jpg" alt=""/>
		</div>
		<div class="title">
			<i class="back icon icon-back"></i>
			<i class="more pull-right icon icon-more"></i>
		</div>
		<div class="panel">
			<!--商户信息-->
			<div class="logo-area">
				<div class="logo">
					<img id="logoimg" src="<?php  echo $card['card_logoimg'];?>"/>
				</div>
				<div class="name" id="brandname">
					<?php echo empty($card['card_brand_name'])?'会员卡标题名称':$card['card_brand_name']?>
				</div>
				</br>
				<div class="name" id="title">
					<?php echo empty($card['card_title'])?'会员卡商铺名称':$card['card_title']?>
				</div>
				<div class="code">
					<img src="../addons/ewei_shopv2/static/images/code.jpg" alt="" />
				</div>

				<div class="bot">
					<span>0268 8888 8888</span>
					<i class="icon icon-info pull-right"></i>
				</div>
			</div>
			<div class="card-other">
				<ul>
					<li id="show_custom_cell1" <?php  if(empty($card['custom_cell1'])) { ?>style="display:none;" <?php  } ?>>
					<span id="show_custom_cell1_name"><?php echo empty($card['custom_cell1_name'])?'自定义入口':$card['custom_cell1_name']?></span>
						<span style="float: right;">
							<?php echo empty($card['custom_cell1_tips'])?'立即进入':$card['custom_cell1_tips']?>
							<i id="show_custom_cell1_tips" class="go pull-right icon icon-right"></i>
						</span>
					</li>
					<li>会员卡详情<i class="go pull-right icon icon-right"></i></li>
					<li>公众号<i class="go pull-right icon icon-right"></i></li>
				</ul>
			</div>
		</div>
		<!--自定义入口-->
		<!--卡券其他-->
		<div class="card-other">
			<ul>
			</ul>
		</div>
	</div>
	<div class="basic" <?php  if(empty($card)) { ?> style="display: none" <?php  } ?>>
		<div class="header">
			基本信息
			<?php if(cv('member.card')) { ?>
			<span class="delete_card">
				<a  data-toggle='ajaxPost' href="<?php  echo webUrl('member/card/delete')?>" data-confirm="确定要删除会员卡吗？如果删除,用户已领取的会员卡将全部失效,请谨慎操作!"><i class='fa fa-trash'></i> 删除会员卡</a>
			</span>
			<?php  } ?>
		</div>
		<div class="basic_content">
			<div class="card_cell">
				二维码
				<span class="text"><a href ='<?php  echo $codeimg;?>'  target="_blank" ><img border='0' width="50px" src='<?php  echo $codeimg;?>'></a>
                            <a href ='<?php  echo $codeimg;?>'  target="_blank">点击下载</a></span>
			</div>
			<div class="card_cell">
				当前会员卡状态
				<span class="remark" style="color: #1ca800;font-weight: bold;">
					<?php  if(empty($card)) { ?>
						未创建
					<?php  } else { ?>
						投放中
					<?php  } ?>
				</span>
			</div>
			<div class="card_cell">
				剩余库存
				<span class="remark"><?php  echo $card['card_quantity'];?></span>
				<?php if(cv('member.card')) { ?>
				<a data-toggle="ajaxModal" href="<?php  echo webUrl('member/card/stock', array('id'=>$row['id'],'card_id'=>$row['card_id']))?>" title='修改库存'><img style="position: absolute;right: -30px;top: 28px;" src="../addons/ewei_shopv2/static/images/edit_img.jpg" alt="" /></a>
				<?php  } ?>

			</div>
			<div class="card_cell">
				发送总量
				<span class="remark"><?php  echo $card['card_totalquantity'];?></span>
			</div>
			<div class="card_cell">
				领取数量
				<span class="remark"><?php  echo intval($card['card_totalquantity']) - intval($card['card_quantity'])?></span>
			</div>
			<div>
				<?php if(cv('member.card')) { ?>
					<a class='edit_btn edit_card' href="<?php  echo webUrl('member/card/post')?>"> 编辑会员卡</a>
					<a class="edit_btn act_card"  href="<?php  echo webUrl('member/card/activationset')?>">会员卡激活设置</a>
				<?php  } ?>
			</div>
		</div>
	</div>
	<div style="clear: both;"></div>
	<div class="delete_sure" style="background: rgba(0, 0, 0, 0.6); z-index: 10000011;">
		<div class="div_dailog ">
			<div class="title">提示！！</div>
			<div class="discription_dailog">
				这是弹窗的描述!
			</div>
			<div class="dailog_divOperation">
				<span class="btn_span delete">确定</span>
				<span class="btn_span cancel">取消</span>
			</div>
		</div>
	</div>

</div>

<script>
	<?php  if(!empty($card)&&  !empty($card['card_backgroundtype']) &&!empty($card['card_backgroundimg'])) { ?>
	$(".logo-area").css({
		"background":"url('<?php  echo $card['card_backgroundimg'];?>') no-repeat left top",
		"background-size":"100% 100%",
	});
	<?php  } ?>


	<?php  if(!empty($card)&&  empty($card['card_backgroundtype'])) { ?>
		$(".logo-area").css({
			"background":"<?php  echo $card['color2'];?>"
		});
	<?php  } ?>

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->