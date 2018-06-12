<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbkDgItemCouponGetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbk_dg_item_coupon_get', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_category_id');
            $table->index('goods_category_id');  // 商品分类的id
            $table->string('cat');               // 后台类目ID，用,分割，最大10个，该ID可以通过taobao.itemcats.get接口获取到
            $table->integer('page_size');       // 页大小，默认20，1~100
            $table->string('q');                 // 查询词
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
        Schema::dropIfExists('tbk_dg_item_coupon_get');
    }
}
