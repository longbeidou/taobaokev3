<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->index('id');
            $table->char('name', 30);                           // 分类的名称
            $table->char('parent_id', 30);                      // 父id
            $table->string('path');                             // 组合路径
            $table->integer('order')->default(0);              // 分类排列顺序
            $table->char('is_shown', 1)->default("1");         // 是否显示
            $table->char('is_recommended', 1)->default("0");  // 是否推荐
            $table->char('font_icon', 250)->nullable();        // 字体图标
            $table->integer('level');                          // 栏目的等级
            $table->char('image', 200);                        // 图片地址
            $table->index(['id', 'path']);                     // 符合索引
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
        Schema::dropIfExists('goods_categorys');
    }
}
