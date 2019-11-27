<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($diy_topmenu['data']) && $diy_topmenu['style']['showtype'] == 1) { ?>
<div class="fui-tabbar fui-topmenu style1" style="height: 2rem;  z-index: 11;">
    <?php  $i = 0;?>
    <?php  if(is_array($diy_topmenu['data'])) { foreach($diy_topmenu['data'] as $topmenu) { ?>
    <?php  if(strpos($topmenu['linkurl'],'index.php') === false ) { ?>
    <a class="item external tab topmenu_tab" style="<?php  if(count($diy_topmenu['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="1" data-url="<?php  echo $topmenu['linkurl'];?>" data-textcolor="<?php  echo $diy_topmenu['style']['color'];?>" data-activecolor="<?php  echo $diy_topmenu['style']['activecolor'];?>" data-bgcolor="<?php  echo $diy_topmenu['style']['background'];?>" data-activebgcolor="<?php  echo $diy_topmenu['style']['activebackground'];?>" data-index="<?php  echo $i;?>"><?php  echo $topmenu['text'];?></a>
    <?php  } else { ?>
    <a class="item external tab topmenu_tab" style="<?php  if(count($diy_topmenu['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="0" data-url="<?php  echo $topmenu['linkurl'];?>" data-textcolor="<?php  echo $diy_topmenu['style']['color'];?>" data-activecolor="<?php  echo $diy_topmenu['style']['activecolor'];?>" data-bgcolor="<?php  echo $diy_topmenu['style']['background'];?>" data-activebgcolor="<?php  echo $diy_topmenu['style']['activebackground'];?>" data-index="<?php  echo $i;?>"><?php  echo $topmenu['text'];?></a>
    <?php  } ?>
    <?php  $i++;?>
    <?php  } } ?>
</div>
<?php  } ?>


<?php  if(!empty($diy_topmenu['data']) && $diy_topmenu['style']['showtype'] == 2) { ?>
<div class="fui-tabbar fui-topmenu style2" style="margin-bottom: 0;z-index: 999;">
    <?php  $i = 0;?>
    <?php  if(is_array($diy_topmenu['data'])) { foreach($diy_topmenu['data'] as $topmenu) { ?>
    <?php  if(strpos($topmenu['linkurl'],'index.php') === false ) { ?>
    <a class="item external tab topmenu_tab" style="<?php  if(count($diy_topmenu['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="1" data-url="<?php  echo $topmenu['linkurl'];?>" data-textcolor="<?php  echo $diy_topmenu['style']['color'];?>" data-activecolor="<?php  echo $diy_topmenu['style']['activecolor'];?>" data-bgcolor="<?php  echo $diy_topmenu['style']['background'];?>" data-activebgcolor="<?php  echo $diy_topmenu['style']['activebackground'];?>" data-index="<?php  echo $i;?>"><?php  echo $topmenu['text'];?></a>
    <?php  } else { ?>
    <a class="item external tab topmenu_tab" style="<?php  if(count($diy_topmenu['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="0" data-url="<?php  echo $topmenu['linkurl'];?>" data-textcolor="<?php  echo $diy_topmenu['style']['color'];?>" data-activecolor="<?php  echo $diy_topmenu['style']['activecolor'];?>" data-bgcolor="<?php  echo $diy_topmenu['style']['background'];?>" data-activebgcolor="<?php  echo $diy_topmenu['style']['activebackground'];?>" data-index="<?php  echo $i;?>"><?php  echo $topmenu['text'];?></a>
    <?php  } ?>
    <?php  $i++;?>
    <?php  } } ?>
</div>
<?php  } ?>
<script type="text/javascript">
    $(function () {
        var h = $('.fui-topmenu').height(); //顶部菜单高度
        $('.fui-topmenu-height').css('height', h+ 'px')
    })
</script>