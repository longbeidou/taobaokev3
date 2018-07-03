<?php

namespace App\Services\Share;

use QrCode;
use Image;

/**
 * 生成优惠券分享的海报图片
 */
class MakeCouponShareImageService
{
  const QRCODES_SRC = 'coupon/qrcodes';   // 二维码的保存路径
  const IMG_SRC     = 'coupon/img';       // 商品的推广图片保存地址
  const BGIMG_SRC   = 'tuiguang/bg.png';  // 背景图的存放路径
  const TAOBAO_SRC  = 'coupon/taobao';    // 淘宝网商品图的保存路径
  const NAME        = 'id';               // 文件的名称

  // 生成海报分享的图片
  public function makeImage($coupon)
  {
    $info = $this->imageCouponInfo($coupon);

    // 检测并生成目录
    $this->mkdirSelf(self::QRCODES_SRC);  // 二维码的目录
    $this->mkdirSelf(self::IMG_SRC);      // 商品推广图片的路径
    $this->mkdirSelf(self::TAOBAO_SRC);   // 淘宝商品图片的路径

    // 生成二维码图片
    $this->makeQrCode(242, 0, '0,0,0', '255,255,255', $info['linkInfo'], public_path(self::QRCODES_SRC.'/'.self::NAME.'.png'));
    // 将淘宝的图片保存到本地
    $this->saveOutImageToLocal($info['img'], 889, self::TAOBAO_SRC.'/'.self::NAME.'.png');

    $img = Image::make(public_path(self::BGIMG_SRC))
            ->insert(public_path(self::QRCODES_SRC.'/'.self::NAME.'.png'), 'bottom-right', 61, 66) // 插入二维码
            ->insert(public_path(self::TAOBAO_SRC.'/'.self::NAME.'.png'), 'top');                  // 插入淘宝图

    $img = $this->addGoodsNameToImage ($img, $info['goodsName']); // 将商品名称写入图片
    $img = $this->addText($img, ['text'=>$info['priceNow'], 'x'=>369, 'y'=>1165, 'size'=>'60', 'color'=>array(255, 79, 30, 1)]); // 写入现价到图片
    $img = $this->addText($img, ['text'=>$info['priceOrigin'], 'x'=>118, 'y'=>1120, 'size'=>'40', 'color'=>array(149, 149, 149, 1)]); // 写入现价到图片
    $img = $this->addText($img, ['text'=>$info['couponInfo'], 'x'=>105, 'y'=>1180, 'size'=>'30', 'color'=>array(255, 79, 30, 1)]); // 写入优惠券面额
    $img = $this->addCopyToImage($img); // 插入版权
    $img = $img->save(public_path(self::IMG_SRC.'/'.self::NAME.'.jpg'));
    $this->deleteImages(); // 删除生成的图片

    return $img;
  }

  // 生成二维码图片
  public function makeQrCodeImage($info, $size = 242, $margin = 0, $color = '0,0,0', $bgcolor = '255,255,255', $path = '')
  {
    if ( $path == '' ) {
      $path = public_path(self::QRCODES_SRC.'/'.self::NAME.'.png');
    }

    // 检测并生成目录
    $this->mkdirSelf(self::QRCODES_SRC);  // 二维码的目录

    // 生成二维码图片
    $this->makeQrCode($size, $margin, $color, $bgcolor, $info, $path);

    $img = Image::make(public_path(self::QRCODES_SRC.'/'.self::NAME.'.png'));

    $img = $img->save(public_path(self::IMG_SRC.'/'.self::NAME.'.jpg'));
    $this->deleteImages(); // 删除生成的图片

    return $img;
  }

  public function imageCouponInfo ($coupon)
  {
    $info['goodsName']   = $coupon->title;
    $info['priceOrigin'] = number_format($coupon->zk_final_price, 2);
    $info['priceNow']    = $coupon->coupon_amount === null ? '扫码领券' : number_format($coupon->zk_final_price - $coupon->coupon_amount, 2);
    $info['img']         = $coupon->pict_url;
    $info['linkInfo']    = route('wx.itemInfo.item', ['id'=>$coupon->num_iid]);
    $info['couponInfo']  = $coupon->coupon_amount === null ? 'VIP渠道券' : floor($coupon->coupon_amount).'元';

    return $info;
  }

 /**
 * 检测并生成目录
 *
 */
  public function mkdirSelf($path)
  {
      $dirArr = explode('/', $path);

      foreach ($dirArr as $key => $value) {
          // 拼接路径
          $p = $dirArr[0];
          for ($i=0; $i<$key; $i++) {
              $p .= '/'.$value;
          }

          // 判断并生成目录
          if (!file_exists(public_path($p))) {
              mkdir(public_path($p));
          }
      }
  }

  // 生成二维码图片
  public function makeQrCode($size, $margin, $color, $bgcolor, $info, $path = '')
  {
    $color = explode(',', $color);
    $bgcolor = explode(',', $bgcolor);

    $QrCode = QrCode::encoding('UTF-8')
                     ->format('png')
                     ->size($size)
                     ->margin($margin)
                     ->color($color[0], $color[1], $color[2])
                     ->backgroundColor($bgcolor[0], $bgcolor[1], $bgcolor[2]);

    if ( $path == '') {
      $QrCode = $QrCode->generate($info);
    } else {
      $QrCode = $QrCode->generate($info, $path);
    }

    return $QrCode;
  }

  // 将淘宝的图片下载到本地
  public function saveOutImageToLocal($imgSrc, $width, $path)
  {
    $img = Image::make($imgSrc)
                  ->resize($width, null, function($constraint){       // 调整图像的宽，并约束宽高比(高自动)
                        $constraint->aspectRatio();
                    })
                  ->save(public_path($path));
    unset($img);
  }

  // 将文字写入图片
  public function addText($img, Array $setArr)
  {
    $seting = [
      'text'    => '',
      'x'       => 0,
      'y'       => 0,
      'fontSrc' => public_path('tuiguang/simhei.ttf'),
      'size'    => 0,
      'color'   => array(255, 79, 30, 1),
      'align'   => 'left',
      'valign'  => 'top',
      'angle'   => 0
    ];
    $set = array_merge_update($seting, $setArr);
    $img = $img->text($set['text'], $set['x'], $set['y'], function($font) use($set) {
                                                   $font->file($set['fontSrc']);
                                                   $font->size($set['size']);
                                                   $font->color($set['color']);
                                                   $font->align($set['align']);
                                                   $font->valign($set['valign']);
                                                   $font->angle($set['angle']);
                                                });
    return $img;
  }

  // 将商品名称写入图片
  public function addGoodsNameToImage ($img, $goodsName)
  {
    $strLen  = mb_strLen($goodsName, 'utf-8');
    $textArr = [];
    $step    = 15;

    // 处理字符串变成数组
    for ($i = 0; $i < $strLen; $i += $step) {
        $textArr[] = mb_substr($goodsName, $i, $step, 'utf-8');
    }

    $seting = [
      'x'       => 95,
      'size'    => 30,
      'color'   => array(69, 69, 69, 1),
    ];

    foreach ($textArr as $key => $value) {
      $y = ['y'=>950+$key*33];
      $text = ['text'=>$value];
      $img = $this->addText($img, array_merge($seting, $y, $text));
    }

    return $img;
  }

  // 插入网站的版权
  public function addCopyToImage ($img) {
    $webName = config('website.name').'独家分享！';
    $website = '更多淘宝天猫优惠券见:'.config('website.domain');
    $img = $this->addText($img, ['text'=>$webName, 'x'=>35, 'y'=>1230, 'size'=>'25', 'color'=>array(69, 69, 69, 0.5)]);
    $img = $this->addText($img, ['text'=>$website, 'x'=>335, 'y'=>1230, 'size'=>'25', 'color'=>array(69, 69, 69, 0.5)]);
    return $img;
  }

  // 删除生成的图片
  public function deleteImages ()
  {
    // 删除二维码图片
    if (file_exists(public_path(self::QRCODES_SRC.'/'.self::NAME.'.png'))) {
        unlink(public_path(self::QRCODES_SRC.'/'.self::NAME.'.png'));
    }
    // 删除淘宝商品图片
    if (file_exists(public_path(self::TAOBAO_SRC.'/'.self::NAME.'.png'))) {
        unlink(public_path(self::TAOBAO_SRC.'/'.self::NAME.'.png'));
    }
    // 删除淘宝分享的图片
    if (file_exists(public_path(self::IMG_SRC.'/'.self::NAME.'.jpg'))) {
        unlink(public_path(self::IMG_SRC.'/'.self::NAME.'.jpg'));
    }
  }
}
