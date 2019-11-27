<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($diyitem['data'])) { ?>
    <?php $textyuan = !empty($_W['shopset']['commission']['texts']['yuan'])?$_W['shopset']['commission']['texts']['yuan']:'元'?>
    <?php $textjifen = !empty($_W['shopset']['trade']['credittext'])?$_W['shopset']['trade']['credittext']:'积分'?>
    <?php  if(empty($diyitem['params']['goodsscroll'])) { ?>
        <div class="fui-goods-group <?php  echo $diyitem['style']['liststyle'];?>" style="background: <?php  echo $diyitem['style']['background'];?>;">
            <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $goodsitem) { ?>

                <a class="fui-goods-item" data-goodsid="<?php  echo $goodsitem['gid'];?>" href="<?php  echo mobileUrl('groups/goods', array('id'=>$goodsitem['gid']))?>"data-type="<?php echo empty($diyitem['params']['goodstype'])? $goodsitem['ctype']:0?>" data-nocache="true" style="position: relative;">
                    <div class="image <?php echo $diyitem['style']['liststyle']=='block one'?'auto':''?> " data-text="拼团" <?php  if($diyitem['style']['liststyle']!='block one') { ?>data-lazy-background="<?php  echo tomedia($goodsitem['thumb'])?>"<?php  } else { ?>style="background:none; min-height: 50px;"<?php  } ?>>
                        <div style="position: relative; top: 0; left: 0; z-index: 9;width: 44px; height: 20px;background: <?php  echo $diyitem['style']['groupscorner'];?>;text-align: center;color: #fff">拼团</div>
                        <?php  if($diyitem['style']['liststyle']=='block one') { ?>
                            <img class="exclude" src="<?php  echo tomedia($_W['shopset']['shop']['loading'])?>" data-lazy="<?php  echo tomedia($goodsitem['thumb'])?>" />
                        <?php  } ?>
                        <?php  if($diyitem['params']['showicon']==2) { ?>
                            <div class="goodsicon <?php  echo $diyitem['params']['iconposition'];?>  "
                                 <?php  if($diyitem['params']['iconposition']=='left top') { ?>
                                    style="top: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; left: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: left;"
                                 <?php  } else if($diyitem['params']['iconposition']=='right top') { ?>
                                    style="top: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; right: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: right;"
                                 <?php  } else if($diyitem['params']['iconposition']=='left bottom') { ?>
                                    style="bottom: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; left: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: left;"
                                 <?php  } else if($diyitem['params']['iconposition']=='left bottom') { ?>
                                    style="bottom: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; right: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: right;"
                                 <?php  } ?>
                            >
                                <?php  if($diyitem['params']['showicon']==1) { ?>


                                <?php  } else if($diyitem['params']['showicon']==2 && !empty($diyitem['params']['goodsiconsrc'])) { ?>
                                    <img class="exclude" src="<?php  echo tomedia($diyitem['params']['goodsiconsrc'])?>" onerror="this.src=''" style="width: <?php  echo $diyitem['style']['iconzoom'];?>%;" />
                                <?php  } ?>
                            </div>
                        <?php  } ?>
                            <?php  if(($goodsitem['total']<=0 && empty($diyitem['params']['goodstype']) && $goodsitem['cansee']<=0) || ( $goodsitem['total']<=0 && empty($diyitem['params']['goodstype']) && $goodsitem['cansee']>0 &&   $goodsitem['seecommission']<=0) ) { ?>
                                <?php  if($diyitem['params']['saleout']>-1) { ?>
                                    <?php  if($diyitem['params']['saleout']==0) { ?>
                                    <div class="salez diy" style="background-image: url('<?php  if(!empty($_W['shopset']['shop']['saleout' ]) ) { ?><?php  echo tomedia($_W['shopset']['shop']['saleout'])?><?php  } else { ?>../addons/ewei_shopv2/static/images/shouqin.png<?php  } ?>'); "></div>
                                    <?php  } ?>
                                    <?php  if($diyitem['params']['saleout']==1) { ?>
                                    <div class="salez diy" style="background-image: url('../addons/ewei_shopv2/plugin/diypage/static/images/default/saleout-<?php  echo $diyitem['style']['saleoutstyle'];?>.png');"></div>
                                    <?php  } ?>
                                 <?php  } ?>
                            <?php  } ?>
                        <!--分销佣金-->
                        <?php  if($goodsitem['cansee']>0 &&  $goodsitem['seecommission']>0 ) { ?>
                        <div class="goods-Commission">
                            <?php echo empty($goodsitem['seetitle'])?'预计最高佣金':$goodsitem['seetitle']?>￥<?php  echo $goodsitem['seecommission'];?>
                        </div>
                        <?php  } ?>
                    </div>
                    <?php  if($diyitem['params']['showtitle']==1 || $diyitem['params']['showprice']==1) { ?>
                        <div class="detail">
                            <?php  if($diyitem['params']['showtitle']==1) { ?>
                                <div class="name" style="color: <?php  echo $diyitem['style']['titlecolor'];?>;">
                                    <?php  echo $goodsitem['title'];?>
                                </div>
                            <?php  } ?>
                            <?php  if($diyitem['params']['showprice']==1) { ?>
                            <p class="productprice">

                                <span style="color: <?php  echo $diyitem['style']['productpricecolor'];?>;"><?php echo !empty($diyitem['params']['productpricetext'])?$diyitem['params']['productpricetext']:''?><span <?php  if(!empty($diyitem['params']['productpriceline'])) { ?>style="text-decoration: line-through;"<?php  } ?>>&yen;<?php  echo $goodsitem['productprice'];?></span></span>

                            </p>
                                <div class="price <?php  if(!empty($diyitem['style']['buystyle'])) { ?>buy<?php  } ?>">

                                    <span class="text" style="color: <?php  echo $diyitem['style']['pricecolor'];?>;">
                                        <p class="minprice">&yen;<?php  echo round($goodsitem['price'],2)?></p>

                                    </span>
                                    <?php  if($goodsitem['is_ladder'] == 0) { ?>
                                    <span class="buy buybtn-1" style="border-color: <?php  echo $diyitem['style']['buybtncolor'];?>;color:  <?php  echo $diyitem['style']['buybtncolor'];?>"><?php  echo $goodsitem['groupnum'];?>人团</span>
                                    <?php  } else { ?>
                                    <span class="buy buybtn-1" style="border-color: <?php  echo $diyitem['style']['buybtncolor'];?>;color:  <?php  echo $diyitem['style']['buybtncolor'];?>">阶梯团</span>
                                    <?php  } ?>
                                </div>
                            <?php  } ?>
                        </div>
                    <?php  } ?>

                </a>
            <?php  } } ?>
        </div>
    <?php  } else { ?>
        <div class="swiper swiper-<?php  echo $diyitemid;?>" data-element=".swiper-<?php  echo $diyitemid;?>" data-view="<?php  if($diyitem['style']['liststyle']=='block three') { ?>3<?php  } else if($diyitem['style']['liststyle']=='block one') { ?>1<?php  } else { ?>2<?php  } ?>" data-free="true" data-btn="true">
            <div class="swiper-container fui-goods-group <?php  echo $diyitem['style']['liststyle'];?>" style="background: <?php  echo $diyitem['style']['background'];?>;">
                <div class="swiper-wrapper">
                    <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $goodsitem) { ?>
                    <a  class="swiper-slide fui-goods-item" data-goodsid="<?php  echo $goodsitem['gid'];?>" href="<?php  if($goodsitem['ctype']==9) { ?><?php  echo mobileUrl('cycelbuy/goods/detail', array('id'=>$goodsitem['gid']))?><?php  } else { ?><?php echo mobileUrl(empty($diyitem['params']['goodstype'])?'goods/detail':'creditshop/detail', array('id'=>$goodsitem['gid']))?><?php  } ?>" data-type="<?php echo empty($diyitem['params']['goodstype'])? $goodsitem['ctype']:0?>" data-nocache="true" style="position: relative;">
                        <div class="image   <?php  if($diyitem['params']['showicon']==1) { ?><?php  echo $diyitem['style']['iconstyle'];?><?php  } ?>" data-text="
                            <?php  if($diyitem['style']['goodsicon']=='recommand') { ?>推荐<?php  } ?>
                            <?php  if($diyitem['style']['goodsicon']=='hotsale') { ?>热销<?php  } ?>
                            <?php  if($diyitem['style']['goodsicon']=='isnew') { ?>新上<?php  } ?>
                            <?php  if($diyitem['style']['goodsicon']=='sendfree') { ?>包邮<?php  } ?>
                            <?php  if($diyitem['style']['goodsicon']=='istime') { ?>限时卖<?php  } ?>
                            <?php  if($diyitem['style']['goodsicon']=='bigsale') { ?>促销<?php  } ?>
                        " style="background-image: url(<?php  echo tomedia($goodsitem['thumb'])?>)">

                            <?php  if(($goodsitem['total']<=0 && empty($diyitem['params']['goodstype']) && $goodsitem['cansee']<=0) || ( $goodsitem['total']<=0 && empty($diyitem['params']['goodstype']) && $goodsitem['cansee']>0 &&   $goodsitem['seecommission']<=0) ) { ?>
                                <?php  if($diyitem['params']['saleout']>-1) { ?>
                                    <?php  if($diyitem['params']['saleout']==0) { ?>
                                    <div class="salez diy" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div>
                                    <?php  } ?>
                                    <?php  if($diyitem['params']['saleout']==1) { ?>
                                    <div class="salez diy" style="background-image: url('../addons/ewei_shopv2/plugin/diypage/static/images/default/saleout-<?php  echo $diyitem['style']['saleoutstyle'];?>.png');"></div>
                                    <?php  } ?>
                                <?php  } ?>
                            <?php  } ?>

                            <?php  if($diyitem['params']['showicon']==1 || $diyitem['params']['showicon']==2) { ?>
                                <div class="goodsicon <?php  echo $diyitem['params']['iconposition'];?>"
                                     <?php  if($diyitem['params']['iconposition']=='left top') { ?>
                                        style="top: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; left: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: left;"
                                     <?php  } else if($diyitem['params']['iconposition']=='right top') { ?>
                                        style="top: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; right: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: right;"
                                     <?php  } else if($diyitem['params']['iconposition']=='left bottom') { ?>
                                        style="bottom: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; left: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: left;"
                                     <?php  } else if($diyitem['params']['iconposition']=='left bottom') { ?>
                                        style="bottom: <?php  echo $diyitem['style']['iconpaddingtop'];?>px; right: <?php  echo $diyitem['style']['iconpaddingleft'];?>px; text-align: right;"
                                     <?php  } ?>
                                 >
                                    <?php  if($diyitem['params']['showicon']==1) { ?>
                                        <!--<img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goodsicon-<?php  echo $diyitem['style']['goodsicon'];?>.png" style="width: <?php  echo $diyitem['style']['iconzoom'];?>%;" />-->
                                    <?php  } else if($diyitem['params']['showicon']==2 && !empty($diyitem['params']['goodsiconsrc'])) { ?>
                                        <img src="<?php  echo tomedia($diyitem['params']['goodsiconsrc'])?>" onerror="this.src=''" style="width: <?php  echo $diyitem['style']['iconzoom'];?>%;" />
                                    <?php  } ?>
                                </div>
                                <?php  } ?>
                        <!--分销佣金-->
                        <?php  if($goodsitem['cansee']>0 &&  $goodsitem['seecommission']>0 ) { ?>
                        <div class="goods-Commission">
                            <?php echo empty($goodsitem['seetitle'])?'预计最高佣金':$goodsitem['seetitle']?>￥<?php  echo $goodsitem['seecommission'];?>
                        </div>
                        <?php  } ?>
                            </div>
                             <?php  if($diyitem['params']['showtitle']==1 || $diyitem['params']['showprice']==1) { ?>
                            <div class="detail">
                                <?php  if($diyitem['params']['showtitle']==1) { ?>
                                    <div class="name" style="color: <?php  echo $diyitem['style']['titlecolor'];?>; ">
                                        <?php  echo $goodsitem['title'];?>
                                    </div>
                                <?php  } ?>
                                <?php  if($diyitem['params']['showprice']==1) { ?>
                                <?php  if((!empty($diyitem['params']['showproductprice']) && $goodsitem['productprice']>0 && $goodsitem['productprice']>$goodsitem['price']) || $diyitem['params']['showsales']==1) { ?>
                                <p class="productprice <?php  if(empty($diyitem['params']['showproductprice']) && $diyitem['params']['showsales']!=1) { ?>noheight<?php  } ?>">
                                    <?php  if(!empty($diyitem['params']['showproductprice']) && $goodsitem['productprice']>0 && $goodsitem['productprice']>$goodsitem['price']) { ?>
                                    <span style="color: <?php  echo $diyitem['style']['productpricecolor'];?>;"><?php echo !empty($diyitem['params']['productpricetext'])?$diyitem['params']['productpricetext']:'原价'?>:<span <?php  if(!empty($diyitem['params']['productpriceline'])) { ?>style="text-decoration: line-through;"<?php  } ?>>&yen<?php  echo $goodsitem['productprice'];?></span></span>
                                    <?php  } ?>
                                    <?php  if($diyitem['params']['showsales']==1) { ?>
                                    <span style="color: <?php  echo $diyitem['style']['salescolor'];?>;"><?php echo !empty($diyitem['params']['salestext'])?$diyitem['params']['salestext']:'销量'?>: <?php  echo $goodsitem['sales'];?></span>
                                    <?php  } ?>
                                </p>
                                <?php  } ?>
                                <div class="price <?php  if(!empty($diyitem['style']['buystyle'])) { ?>buy<?php  } ?>">
                                        <span class="text" style="color: <?php  echo $diyitem['style']['pricecolor'];?>;">
                                            <?php  if(empty($diyitem['params']['goodstype'])) { ?>
                                                <p class="minprice">&yen<?php  echo round($goodsitem['price'],2)?></p>
                                            <?php  } else { ?>
                                                <p style="text-overflow:ellipsis;display: -webkit-box;overflow:hidden;-webkit-line-clamp: 1;-webkit-box-orient: vertical;word-break: break-all">
                                                    <?php  if($goodsitem['price']==0&&$goodsitem['credit']==0) { ?>免费
                                                    <?php  } else if($goodsitem['price']>0&&$goodsitem['credit']==0) { ?><?php  echo $goodsitem['price'];?><small><?php  echo $textyuan;?></small>
                                                    <?php  } else if($goodsitem['price']==0&&$goodsitem['credit']>0) { ?><?php  echo $goodsitem['credit'];?><small><?php  echo $textjifen;?></small>
                                                    <?php  } else if($goodsitem['price']>0&&$goodsitem['credit']>0) { ?><?php  echo $goodsitem['credit'];?><small><?php  echo $textjifen;?></small>+<?php  echo $goodsitem['price'];?><small><?php  echo $textyuan;?></small><?php  } ?>
                                                </p>
                                            <?php  } ?>

                                        </span>

                                        <span class="buy buybtn-1" style="border-color: <?php  echo $diyitem['style']['buybtncolor'];?>;color:  <?php  echo $diyitem['style']['buybtncolor'];?>">购买</span>


                                    </div>
                                <?php  } ?>
                            </div>
                        <?php  } ?>

                    </a>
                    <?php  } } ?>
                </div>

                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
        <script>
            var goodsGroup = $(".swiper-<?php  echo $diyitemid;?> .fui-goods-group");
            var swiperBtnTop= goodsGroup.find('.image').outerHeight() * 0.5;
            var swiperBtn = goodsGroup.find('.swiper-button-white');
            var swiperBtnMarginTop = swiperBtnTop - (swiperBtn.height() * 0.5)+10;
            swiperBtn.css({'top':0, 'margin-top': swiperBtnMarginTop})
        </script>
        </div>
    <?php  } ?>
<?php  } ?>
