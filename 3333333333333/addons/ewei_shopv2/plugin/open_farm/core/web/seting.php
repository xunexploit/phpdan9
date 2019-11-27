<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Seting_EweiShopV2Page extends PluginWebPage
{
	/**
	private $table = 'ewei_open_farm_seting';
	/**
	private $field = array('id', 'uniacid', 'eat_time', 'time_steal', 'steal_eat_time', 'eat_tips', 'warehouse', 'bowl', 'lay_eggs_eat', 'lay_eggs_tips', 'lay_eggs_number_min', 'lay_eggs_number_max', 'obtain_feed_max', 'exchange_integral_max', 'feed_invalid_time', 'egg_invalid_time', 'surprised_invalid_time', 'eat_experience', 'rate', 'advertisement_max', 'surprised_probability', 'shop', 'create_time');
	/**
	private $message = array('eat_time' => '请填写吃一克饲料所需的时间', 'eat_tips' => '请填写吃完放置饲料之后的提示', 'warehouse' => '请填写仓库储存的饲料总数限制', 'bowl' => '请填写食盆里面的数量限制', 'lay_eggs_eat' => '请填写下蛋需要吃的饲料克数', 'lay_eggs_tips' => '请填写下蛋之后的提示消息', 'lay_eggs_number_min' => '请填写下蛋最少个数', 'lay_eggs_number_max' => '请填写下蛋最大个数', 'exchange_integral_max' => '请填写一天内最多兑换积分', 'eat_experience' => '请填写吃一克的经验', 'rate' => '请填写鸡蛋与积分的汇率', 'surprised_probability' => '请填写生出彩蛋概率', 'shop' => '请填写商城链接');

	/**
	public function __construct($_init = true)
	{
		parent::__construct($_init);
		$this->addInfo();
	}

	/**
	public function main()
	{
		global $_W;
		require_once $this->template();
	}

	/**
	private function addInfo()
	{
		global $_W;
		$where = array('uniacid' => $_W['uniacid']);
		$info = array('uniacid' => $_W['uniacid'], 'advertisement_max' => 3);
		$setingInfo = pdo_get($this->table, $where);

		if (!$setingInfo) {
			pdo_insert($this->table, $info);
		}
	}

	/**
	public function getInfo()
	{
		global $_W;
		$setingInfo = pdo_get($this->table, array('uniacid' => $_W['uniacid']));
		$this->model->returnJson($setingInfo);
	}

	/**
	public function getAdvertisementMax()
	{
		global $_W;
		$advertisementMax = pdo_getcolumn($this->table, array('uniacid' => $_W['uniacid']), 'advertisement_max', 1);
		$this->model->returnJson($advertisementMax);
	}

	/**
	public function editInfo()
	{
		global $_W;
		global $_GPC;
		$data = $_GPC['__input'];
		$this->checkInfo($data);
		$data = $this->model->removeUselessField($data, $this->field);
		$query = pdo_update($this->table, $data, array('uniacid' => $_W['uniacid']));
		$this->model->returnJson($query);
	}

	/**
	private function checkInfo($data)
	{
		$this->model->checkDataRequired($data, $this->message);
	}
}

?>