<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">当前位置： <span class="text-primary">商品核销统计</span> </div>

<div class="page-content">
    <form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="ewei_shopv2" />
        <input type="hidden" name="do" value="web" />
        <input type="hidden" name="r" value="store.verify.log" />
        <div class="page-toolbar">
            <div class="col-sm-9" style='padding-right:0; width: 67.5%'>
                <div class="input-group " >
                    <?php  echo tpl_daterange('verifydate', array('sm'=>true,'placeholder'=>'核销时间'),true);?>
                    <?php  echo tpl_daterange('buydate', array('sm'=>true,'placeholder'=>'购买时间'),true);?>
                </div>
            </div>
            <div class="input-group " >
                <div class="input-group-select">
                    <select name='searchfield'  class='form-control  input-sm select-md'    >
                        <option value='goodtitle' <?php  if($_GPC['searchfield']=='goodtitle') { ?>selected<?php  } ?>>商品名称</option>
                        <option value='ordersn' <?php  if($_GPC['searchfield']=='ordersn') { ?>selected<?php  } ?>>订单号</option>
                        <option value='verifyid' <?php  if($_GPC['searchfield']=='verifyid') { ?>selected<?php  } ?>>核销ID</option>
                        <option value='store' <?php  if($_GPC['searchfield']=='store') { ?>selected<?php  } ?>>核销门店</option>
                    </select>
                </div>
                <input type="text" class="form-control input-sm"  name="keyword" value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词" />
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit"> 搜索</button>
                    <button type="submit" name="export"  value="1" class="btn btn-success">导出</button>
                </span>
            </div>
        </div>
    </form>
    <?php  if(count($list)>0) { ?>
    <table class="table table-responsive">
        <thead class="navbar-inner">
        <tr>
            <th >记次时商品信息</th>
            <th style='width:180px;'>订单号</th>
            <th style='width:65px;'>核销次数</th>
            <th style='width:135px;'>核销时间</th>
            <th style='width:135px;'>购买时间</th>
            <th style='width:55px;'>购买人</th>
            <th style='width:100px;'>手机号</th>
            <th style='width:70px;'>核销人</th>
            <th style='width:120px;'>核销门店</th>
            <th >备注信息</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr>
            <td>
                <img src='<?php  echo tomedia($row['thumb'])?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'"/>
                <?php  echo $row['title'];?>
            </td>
            <td><?php  echo $row['ordersn'];?></td>
            <td><?php  echo $row['verifynum'];?></td>
            <td><?php  echo date('Y-m-d H:i:s',$row['verifydate'])?></td>
            <td><?php  echo date('Y-m-d H:i:s',$row['paytime'])?></td>
            <td>
                <?php  echo $row['username'];?>
            </td>
            <td>
                <?php  echo $row['mobile'];?>
            </td>
            <td>
                <?php  echo $row['salername'];?>
            </td>
            <td>
                <?php  echo $row['storename'];?>
            </td>
            <td>
                <?php  echo $row['remarks'];?>
            </td>
        </tr>

        <?php  } } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9" class="text-right">  <?php  echo $pager;?></td>
            </tr>
        </tfoot>
    </table>
<?php  } else { ?>
    <div class='panel panel-default'>
        <div class='panel-body' style='text-align: center;padding:30px;'>
            暂时没有任何商品
        </div>
    </div>
<?php  } ?>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--NDAwMDA5NzgyNw==-->