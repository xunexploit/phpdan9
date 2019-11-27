<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Orderlog_EweiShopV2Page extends MobileLoginPage
{
	public function main()
	{
		global $_W;
		global $_GPC;
		$_GPC['type'] = intval($_GPC['type']);
		include $this->template();
	}

	public function get_list()
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 10;
		$apply_type = array(0 => '微信钱包', 2 => '支付宝', 3 => '银行卡');
		$paytype = array(0 => '微信', 1 => '支付宝', 2 => '商城余额', 3 => '现金收款', 101 => '系统微信', 102 => '系统支付宝');
		$orderpaytype=array(
			'1'=>'余额支付','2'=>'在线支付','3'=>'货到付款','11'=>'后台付款','21'=>'微信支付','22'=>'支付宝支付','23'=>'银联支付'
		);
		$condition = ' and status=1 and type=0 and openid=:openid and uniacid=:uniacid';
		$params = array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']);
		$uidinfo = M('member')->getInfo($_W['openid']);
		$uid = $uidinfo['uid'];
		
		$list = pdo_fetchall('select * from ' . tablename('ewei_shop_member_log') . (' where 1 ' . $condition . ' order by createtime desc LIMIT ') . ($pindex - 1) * $psize . ',' . $psize, $params);
		$total = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_member_log') . (' where 1 ' . $condition), $params);

		foreach ($list as &$row) {
			$row['l_type']=1;
			$row['createtime'] = date('Y-m-d H:i', $row['createtime']);
			$row['typestr'] = $apply_type[$row['applytype']];
		}
		unset($row);

		$p_condition = ' and status=1 and openid=:openid and uniacid=:uniacid';
		$p_list = pdo_fetchall('select * from ' . tablename('ewei_shop_cashier_pay_log') . (' where 1 ' . $p_condition . ' order by createtime desc LIMIT ') . ($pindex - 1) * $psize . ',' . $psize, $params);
		$p_total = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_cashier_pay_log') . (' where 1 ' . $p_condition), $params);

		foreach ($p_list as &$row) {
			$row['l_type']=2;
			$row['createtime'] = date('Y-m-d H:i', $row['createtime']);
			$row['typestr'] = $paytype[$row['paytype']];
		}
		unset($row);

		$o_condition = ' and o.status in(1,2,3) and o.openid=:openid and o.uniacid=:uniacid';
		$o_list = pdo_fetchall('select g.*,o.paytype,gi.title from ' . tablename('ewei_shop_order_goods') .' g left join '.tablename('ewei_shop_order').' o on o.id=g.orderid left join '.tablename('ewei_shop_goods').' gi on gi.id=g.goodsid'. (' where 1 ' . $o_condition . ' order by g.createtime desc LIMIT ') . ($pindex - 1) * $psize . ',' . $psize, $params);
		$o_total = pdo_fetchcolumn('select g.* from ' . tablename('ewei_shop_order_goods') .' g left join '.tablename('ewei_shop_order').' o on o.id=g.orderid'. (' where 1 ' . $o_condition), $params);

		foreach ($o_list as &$row){
			$row['l_type']=3;
			$row['createtime'] = date('Y-m-d H:i', $row['createtime']);
			$row['typestr']=$orderpaytype[$row['paytype']];
		}

		unset($row);

		if (is_array($p_list) or is_array($o_list)) {
			$list = array_merge($list,$p_list,$o_list);
		}

		$createtimes=array_column($list, 'createtime');
		array_multisort($createtimes,SORT_DESC,$list);

		if($p_total>$total){
			$total=$p_total;
		}
		if($o_total>$total){
			$total=$o_total;
		}

		show_json(1, array('list' => $list, 'total' => $total, 'pagesize' => $psize));
	}
}

?>
