# 淘宝客系统第三个版本 #

代码已经全部开源！！！

===========历史===============

> 系统说明

1. 这是淘宝客系统第三个版本的部分源码，由于在实际应用不方便全部开源，如果需要相关的服务可以联系我或者在这个代码基础上进行二次开发。后面会随着系统的不断升级，会将全部代码开源。
2. 本系统分为PC端、无线端和APP端，采用独立模板的形式编写。无线端可以针对QQ、微信、浏览器采取不同的显示，例如：优化在微信上领券的过程，解决微信上不能打开淘宝链接的问题。
3. 系统的效果如下：

> 系统的效果

[龙琴时代优惠券购物网站](https://www.52010000.cn/)PC端：https://www.52010000.cn/

[龙琴时代优惠券购物网站](https://m.52010000.cn/)无线端：https://m.52010000.cn/ （请在手机上访问）

[龙琴时代优惠券购物网站](https://www.52010000.cn/download/app)APP端：https://www.52010000.cn/download/app


> 基础安装

## 运行环境要求

- PHP >= 7.0

克隆源代码到本地：

    > git clone git@github.com:longbeidou/taobaokev3.git
    
#### 进入项目目录

    > cd taobaokev3
    
#### 安装扩展包依赖

	composer install

#### 生成配置文件

```
cp .env.example .env
```

你可以根据情况修改 `.env` 文件里的内容，如数据库连接、缓存、ALIMAMA_APPKEY等配置信息

#### 迁移数据库

```shell
$ php artisan migrate --seed
```

#### 生成秘钥

```shell
$ php artisan key:generate
```

#### 配置 hosts 文件

    echo "127.0.0.1   taobaokev3.test" | sudo tee -a /etc/hosts
    
至此, 安装完成

