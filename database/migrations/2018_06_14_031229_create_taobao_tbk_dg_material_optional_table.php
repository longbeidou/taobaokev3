<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaobaoTbkDgMaterialOptionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taobao_tbk_dg_material_optional', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_category_id');
            $table->index('goods_category_id');  // 商品分类的id

            $table->string('start_dsr')->nullable();          // 店铺dsr评分，筛选高于等于当前设置的店铺dsr评分的商品0-50000之间
            $table->string('page_size')->nullable();          // 页大小，默认20，1~100
            $table->string('page_no')->nullable();            // 第几页，默认：１
            $table->char('platform', 1)->default('2');          // 链接形式：1：PC，2：无线
            $table->char('end_tk_rate', 8)->nullable();       // 淘客佣金比率上限，如：1234表示12.34%
            $table->char('start_tk_rate', 8)->nullable();     // 淘客佣金比率下限，如：1234表示12.34%
            $table->char('end_price', 8)->nullable();         // 折扣价范围上限，单位：元
            $table->char('start_price', 8)->nullable();       // 折扣价范围下限，单位：元
            $table->char('is_overseas', 5)->default('false'); // 是否海外商品，设置为true表示该商品是属于海外商品，设置为false或不设置表示不判断这个属性
            $table->char('is_tmall', 5)->default('false');    // 是否商城商品，设置为true表示该商品是属于淘宝商城商品，设置为false或不设置表示不判断这个属性
            $table->char('sort', 18)->nullable();             // 排序_des（降序），排序_asc（升序），销量（total_sales），淘客佣金比率（tk_rate）， 累计推广量（tk_total_sales），总支出佣金（tk_total_commi），价格（price）
            $table->char('itemloc', 30)->nullable();          // 所在地
            $table->string('cat')->nullable();                // 后台类目ID，用,分割，最大10个，该ID可以通过taobao.itemcats.get接口获取到
            $table->string('q')->nullable();                  // 查询词
            $table->char('has_coupon', 5)->default('false');  // 是否有优惠券，设置为true表示该商品有优惠券，设置为false或不设置表示不判断这个属性
            $table->ipAddress('ip')->nullable();              // ip参数影响邮费获取，如果不传或者传入不准确，邮费无法精准提供
            $table->string('adzone_id');                      // mm_xxx_xxx_xxx的第三位
            $table->char('need_free_shipment', 5)->default('false'); // 是否包邮，true表示包邮，空或false表示不限
            $table->char('need_prepay', 5)->default('false');        // 是否加入消费者保障，true表示加入，空或false表示不限
            $table->char('include_pay_rate_30', 5)->nullable();      // 成交转化是否高于行业均值
            $table->char('include_good_rate', 5)->nullable();        // 好评率是否高于行业均值
            $table->char('include_rfd_rate', 5)->nullable();         // 退款率是否低于行业均值
            $table->char('npx_level', 1)->nullable();                // 牛皮癣程度，取值：1:不限，2:无，3:轻微

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taobao_tbk_dg_material_optional');
    }
}
