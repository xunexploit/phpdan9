<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">微信模板管理</span>
</div>


<div class="page-content">
    <div class="alert alert-warning">
        <b>注意：</b>
        <p>请将公众平台模板消息所在行业选择为：<b>IT科技/互联网|电子商务&nbsp;&nbsp;&nbsp;其他/其他</b>，所选行业不一致将会导致模板消息不可用。</p>
        <p>您的公众平台模板消息目前所属行业为：<b><?php  echo $industrytext;?></b></p>
        <p>当前列表内的模板消息为您已申请的模板消息，您可以点击查看详情或者删除处理。</p>
    </div>

    <form action="" method="post">
        <div class="page-toolbar row m-b-sm m-t-sm">
            <div class="col-sm-6 pull-right">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" id="tempcode"  value="" placeholder="请输入模板编码"> <span class="input-group-btn">
                             <button class="btn btn-sm btn-primary" type="button" onclick="addtempoption()"> 添加微信模板</button> </span>
                </div>
            </div>
        </div>
        <?php  if(count($list)>0) { ?>
        <div class="page-table-header">
            <input type='checkbox' />
            <div class="btn-group">
                <?php if(cv('sysset.weixintemplate.delete')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sysset/weixintemplate/delete')?>">
                    <i class='icow icow-shanchu1'></i> 删除
                </button>
                <?php  } ?>
            </div>
        </div>
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <th style="width:25px;"></th>
                <th style="width:45px;">序号</th>
                <th >模板名称</th>
                <th>所属行业</th>
                <th style="width: 65px;">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $index => $row) { ?>
            <tr>
                <td>
                    <input type='checkbox'   value="<?php  echo $row['template_id'];?>"/>
                </td>
                <td>
                    <?php  echo $index+1?>
                </td>
                <td><?php  echo $row['title'];?></td>
                <td><?php  echo $row['primary_industry'];?>/<?php  echo $row['deputy_industry'];?></td>
                <td>
                    <a class='btn btn-op btn-operation' href="<?php  echo webUrl('sysset/weixintemplate/post', array('id' => $row['template_id']))?>" >
                        <span data-toggle="tooltip" data-placement="top" data-original-title="查看">
                            <i class='icow icow-bianji2'></i>
                        </span>
                    </a>
                    <?php if(cv('sysset.weixintemplate.delete')) { ?>
                    <a class='btn btn-op btn-operation'  data-toggle='ajaxRemove' href="<?php  echo webUrl('sysset/weixintemplate/delete', array('id' => $row['template_id']))?>" data-confirm="确认删除此模板吗？" >
                        <span data-toggle="tooltip" data-placement="top" data-original-title="删除">
                            <i class='icow icow-shanchu1'></i>
                        </span>
                    </a>
                    <?php  } ?>
                </td>
            </tr>
            <?php  } } ?>

            </tbody>
            <tfoot>
                <tr>
                    <td><input type="checkbox"></td>
                    <td colspan="2">
                            <div class="input-group-btn">
                                <?php if(cv('sysset.weixintemplate.delete')) { ?>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sysset/weixintemplate/delete')?>">
                                    <i class='icow icow-shanchu1'></i> 删除
                                </button>
                                <?php  } ?>
                            </div>
                    </td>
                    <td colspan="2">
                        <span class="pull-right" style="line-height: 28px;">共<?php  echo count($list)?>条记录</span>
                    </td>
                </tr>
            </tfoot>
        </table>
        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何微信模板!
            </div>
        </div>
        <?php  } ?>
    </form>
</div>


<script language='javascript'>

    function addtempoption() {
        var tempcode = $("#tempcode").val();
        var data = {
            templateidshort: tempcode
        };
        $.ajax({
            url: "<?php  echo webUrl('sysset/weixintemplate/gettemplateid')?>",
            data: data,
            cache: false
        }).done(function (result) {

            var  data= jQuery.parseJSON(result);

            if(data.status==1) {
                alert("加入成功");
                location.reload();

            }else
            {
                alert("加入失败,请检查模板数量是否达到上限(25个)以及模板编码是否输入正确!");
            }

        });
    }
</script>



<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->