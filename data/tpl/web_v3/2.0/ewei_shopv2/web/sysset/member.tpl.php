<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">当前位置：<span class="text-primary">会员设置</span></div>

  <div class="page-content">
      <form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data" >



          <div class="form-group">
              <label class="col-lg control-label">会员等级说明链接</label>
              <div class="col-sm-9 col-xs-12">
                  <?php if(cv('sysset.member.edit')) { ?>
                  <div class="input-group">
                      <input type="text" name="data[levelurl]" class="form-control" value="<?php  echo $data['levelurl'];?>" id="levelurl" />
                      <div class="input-group-btn">
                          <div class="btn btn-default" data-toggle="selectUrl" data-input="#levelurl">选择链接</div>
                      </div>
                  </div>
                  <?php  } else { ?>
                  <input type="hidden" name="data[levelurl]" value="<?php  echo $data['levelurl'];?>" />
                  <div class='form-control-static'><?php  echo $data['levelurl'];?></div>
                  <?php  } ?>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg control-label">会员等级升级依据</label>
              <div class="col-sm-9 col-xs-12">
                  <?php if(cv('sysset.member.edit')) { ?>
                  <label class="radio radio-inline">
                      <input type="radio" name="data[leveltype]" value="0" <?php  if(empty($data['leveltype'])) { ?>checked<?php  } ?>/> 已完成的订单金额
                  </label>
                  <label class="radio radio-inline">
                      <input type="radio" name="data[leveltype]" value="1" <?php  if($data['leveltype']==1) { ?>checked<?php  } ?>/> 已完成的订单数量
                  </label>
                  <label class="radio radio-inline">
                      <input type="radio" name="data[leveltype]" value="2" <?php  if($data['leveltype']==2) { ?>checked<?php  } ?>/> 购买指定商品
                  </label>
                  <span class="help-block">默认为完成订单金额</span>
                  <?php  } else { ?>
                  <input type="hidden" name="data[leveltype]" value="<?php  echo $data['leveltype'];?>" />
                  <div class='form-control-static'>
                      <?php  if(empty($data['leveltype'])) { ?>
                      已完成的订单金额
                      <?php  } else if($data['leveltype']==1) { ?>
                      已完成的订单数量
                      <?php  } ?>
                  </div>
                  <?php  } ?>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg control-label">升级统计方式</label>
              <div class="col-sm-9 col-xs-12">
                  <?php if(cv('sysset.member.edit')) { ?>
                  <label class="radio radio-inline">
                      <input type="radio" name="data[upgrade_condition]" value="1" <?php  if((int)$data['upgrade_condition'] === 1 || empty($data['upgrade_condition'])) { ?>checked<?php  } ?>/> 订单完成后
                  </label>
                  <label class="radio radio-inline">
                      <input type="radio" name="data[upgrade_condition]" value="2" <?php  if((int)$data['upgrade_condition'] === 2) { ?>checked<?php  } ?>/> 付款后
                  </label>
                  <span class="help-block">默认为订单完成后</span>
                  <?php  } else { ?>
                  <input type="hidden" name="data[leveltype]" value="<?php  echo $data['leveltype'];?>" />
                  <div class='form-control-static'>
                      <?php  if(empty($data['leveltype'])) { ?>
                      已完成的订单金额
                      <?php  } else if($data['leveltype']==1) { ?>
                      已完成的订单数量
                      <?php  } ?>
                  </div>
                  <?php  } ?>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg control-label"></label>
              <div class="col-sm-9 col-xs-12">
                  <?php if(cv('sysset.member.edit')) { ?>
                  <input type="submit" value="提交" class="btn btn-primary"  />

                  <?php  } ?>
              </div>
          </div>

      </form>
  </div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
