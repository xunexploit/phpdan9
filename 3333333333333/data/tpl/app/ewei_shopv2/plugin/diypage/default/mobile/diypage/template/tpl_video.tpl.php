<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($diyitem['params'])) { ?>
    <video id="Video<?php  echo $diyitemid;?>"
           style="object-fit:fill"
           preload="auto"
           webkit-playsinline="true"
           playsinline x5-video-player-type="h5"
           x5-video-player-fullscreen="true"
           x5-video-orientation="portraint"
           src="<?php  echo tomedia($diyitem['params']['videourl'])?>"
           controls style='width:100%;'
           poster="<?php  echo tomedia($diyitem['params']['poster'])?>">
    </video>
    <script>
        var width = $(document.body).width();
        var scale = "<?php  echo $diyitem['style']['ratio'];?>";
        var height = 0;
        if (scale == 0) {
            height = width / 16*9;
        } else if (scale == 1) {
            height = width / 4*3;
        } else if (scale == 2) {
            height = width;
        }
        var videoid = "#Video<?php  echo $diyitemid;?>";
        $(videoid).height(height).width(width);
    </script>
<?php  } ?>
