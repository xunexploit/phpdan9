<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
  
<div class="page-header">
    当前位置：<span class="text-primary">海报管理 </span>
</div>
	<div class="page-content">
        <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_shopv2" />
                <input type="hidden" name="do" value="web" />
                <input type="hidden" name="r"  value="poster" />
                <div class="page-toolbar m-b-sm m-t-sm">
                            <div class="col-sm-4">
                                <span class="">
                                         <?php if(cv('poster.add')) { ?>
                                             <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('poster/add')?>"><i class="fa fa-plus"></i> 添加海报</a>
                                        <?php  } ?>
                                        <?php if(cv('poster.clear')) { ?>
                                            <button class="btn btn-danger btn-sm" type="button" data-toggle='ajaxPost' data-confirm="确认要清空缓存?" data-href="<?php  echo webUrl('poster/clear')?>"><i class='fa fa-trash'></i> 清除当前公众号海报缓存</button>
                                        <?php  } ?>
                                </span>
                            </div>
                            <div class="col-sm-6 pull-right">
				                <div class="input-group">
                                        <div class="input-group-select">
                                            <select name="type" class='form-control'>
                                                <option value="" <?php  if($_GPC['type'] == '') { ?> selected<?php  } ?>>类型</option>
                                                <option value="1" <?php  if($_GPC['type'] == '1') { ?> selected<?php  } ?>>商城</option>
                                                <option value="2" <?php  if($_GPC['type'] == '2') { ?> selected<?php  } ?>>小店</option>
                                                <option value="3" <?php  if($_GPC['type'] == '3') { ?> selected<?php  } ?>>商品</option>
                                                <option value="4" <?php  if($_GPC['type'] == '4') { ?> selected<?php  } ?>>关注</option>
                                            </select>
                                        </div>
                                        <input type="text" class=" form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"> 搜索</button> </span>
                                </div>
								
                            </div>
                </div>
  </form>
<form action="" method="post" >

            <?php  if(count($list)>0) { ?>
            <div class="page-table-header">
                <input type="checkbox">
                <div class="btn-group">
                    <?php if(cv('poster.delete')) { ?>
                    <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('poster/delete')?>">
                        <i class='icow icow-shanchu1'></i> 删除</button>
                    <?php  } ?>
                </div>
            </div>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
		                <th style="width:25px;"></th>
                        <th>海报名称</th>
                        <th>海报类型</th>
                        <th>扫描数</th>
                        <th>关注数</th>
                        <th>是否默认</th>
                        <th style="width: 110px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>
                        
								<td>
									<input type='checkbox'   value="<?php  echo $row['id'];?>"/>
							</td>
							<td><?php  echo $row['title'];?></td>
                        <td>
                            <?php  if($row['type']==1) { ?>
                            <label class='label label-primary'>商城</label>
                            <?php  } else if($row['type']==2) { ?>
                            <label class='label label-success'>小店</label>
                            <?php  } else if($row['type']==3) { ?>
                            <label class='label label-warning'>商品</label>
                            <?php  } else if($row['type']==4) { ?>
                            <label class='label label-danger'>关注</label>
                         
                            <?php  } ?>
                        </td>
                        <td><?php  if($row['type']!=4) { ?><?php  echo $row['times'];?><?php  } else { ?>--<?php  } ?></td>
                        <td><?php  if($row['type']==4) { ?><?php  echo $row['follows'];?><?php  } else { ?>--<?php  } ?></td>
                            <td>
                                   <?php  if($row['isdefault']==1) { ?>
                                <label for="" class="label label-primary">是</label>
                                <?php  } else { ?>
                                <label for="" class="label label-default">否</label>
                                    <?php  } ?>
                        </td>
                        <td>
                        
                            <?php if(cv('poster.log')) { ?>
                                 <?php  if($row['type']==4) { ?>
                                <a class='btn btn-default btn-sm btn-op btn-operation' href="<?php  echo webUrl('poster/log', array('id' => $row['id']))?>"  >
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="查看关注记录">
                                        <i class="icow icow-chakan"></i>
                                     </span>
                                </a>
                                <?php  } else { ?>
                                <a class='btn btn-default  btn-sm btn-op btn-operation' href="<?php  echo webUrl('poster/scan', array('id' => $row['id']))?>">
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="查看扫描记录">
                                        <i class="icow icow-chakan"></i>
                                     </span>
                                </a>
                                <?php  } ?>
                            <?php  } ?>
                            <?php if(cv('poster.edit|poster.view')) { ?>
                                <a class='btn btn-default btn-sm btn-op btn-operation' href="<?php  echo webUrl('poster/edit', array('id' => $row['id']))?>">
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php if(cv('poster.edit')) { ?>编辑<?php  } else { ?>查看<?php  } ?>">
                                        <?php if(cv('poster.edit')) { ?>
                                        <i class="icow icow-bianji2"></i>
                                        <?php  } else { ?>
                                        <i class="icow icow-chakan-copy"></i>
                                        <?php  } ?>
                                     </span>
                                </a>
                            <?php  } ?>
                                 <?php  if($row['isdefault']==0) { ?>
                                 <?php if(cv('poster.setdefault')) { ?><a class='btn btn-default btn-sm btn-op btn-operation' data-toggle='ajaxPost' href="<?php  echo webUrl('poster/setdefault', array('id' => $row['id']))?>" data-confirm="确认设置此海报为默认海报吗？">
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="设置默认">
                                        <i class="icow icow-sysset"></i>
                                     </span>
                        </a>
                            <?php  } ?>
                                 <?php  } ?>
                            <?php if(cv('poster.delete')) { ?><a class='btn btn-default btn-sm btn-op btn-operation' data-toggle='ajaxRemove'  href="<?php  echo webUrl('poster/delete', array('id' => $row['id']))?>" data-confirm="确认删除此海报吗？">
                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                                <i class="icow icow-shanchu1"></i>
                             </span>
                        </a>
                        </td>
                        <?php  } ?>
						
                    </tr>
                    <?php  } } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td colspan="2">
                            <div class="btn-group">
                                <?php if(cv('poster.delete')) { ?>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('poster/delete')?>">
                                    <i class='icow icow-shanchu1'></i> 删除</button>
                                <?php  } ?>
                            </div>
                        </td>
                        <td colspan="4" class="text-right"><?php  echo $pager;?></td>
                    </tr>
                </tfoot>
            </table>
    <?php  } else { ?>
<div class='panel panel-default'>
	<div class='panel-body' style='text-align: center;padding:30px;'>
		 暂时没有任何海报!
	</div>
</div>
<?php  } ?>
       
         </form>
    </div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<!--青岛易联互动网络科技有限公司-->