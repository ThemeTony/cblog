<div align="center">
  <h1>Cblog</h1>
  <p>一个使用PHP Laravel框架的简洁强大的博客</p>
</div>

#### 关联项目
https://github.com/ThemeTony <br/>
#### 作者
前端主要由 [HelipengTony](https://github.com/HelipengTony) 制作 <br/>
[MatrixCoder-CHEN](https://github.com/MatrixCoder-CHEN)本蒟蒻移植

### 特征与依赖
- Markdown 写作支持（Parsedown 库）（暂不能关闭）
- MathJax 数学公式渲染支持（可开启或关闭）
- PJAX 无刷新体验 （不影响SEO）
- RemixIcon 图标
- Prism.js 代码高亮 
- Algolia 搜索（您需要到官网注册获得id与秘钥）
- Laravel 开发框架
- Nprogress 加载进度条
- Laravel-admin 强大的后台管理系统
- Artalk 评论系统 
- Bootstarap 制作的简洁但优雅的界面
- 无限级分类支持
### 要求
- PHP >= 7.2.5
- BCMath PHP 拓展
- Ctype PHP 拓展
- JSON PHP 拓展
- Mbstring PHP 拓展
- OpenSSL PHP 拓展
- PDO PHP 拓展
- Tokenizer PHP 拓展
- XML PHP 拓展
- Mysql Or Postgresql (推荐) PHP 拓展

### 安装
```
//从github上克隆源码到本地
git clone https://github.com/ThemeTony/cblog.git

cd cblog 
php -r "copy('.env.example', '.env');"
php artisan key:generate
```
然后，你需要设置`.env`，按照注释填写
```
php artisan migrate //生成数据表
php artisan admin:install //如有报错，请直接忽视
```

请把运行目录设置在`./public`<br>
给您的网站用户读写`./storage`的权限，这个目录是用来储存session、图片等文件的<br>
做完以上步骤，您不出意外就可以跑起来了<br><br>
您还需要设置评论板，依赖于[Artalk](https://github.com/qwqcode/Artalk)
```
cd ArtalkServerPhp
php -r "copy('Config.example.php', 'Config.php');"
```
然后，你需要设置`Config.php`，按照注释填写，
```
// 确保当前在 ArtalkServerPhp 目录
composer install 
```
，新建网站`ArtalkPhpServer/public`，给您的网站用户读写`ArtalkPhpServer/data`的权限，这个用来存放评论数据

具体可见[Artalk-API-PHP](https://github.com/qwqcode/Artalk-API-PHP)

之后，请更改`config/cblog.php`，按注释填写
### 使用
后台地址 www.example.com/admin
- 账户 admin
- 密码 admin （请务必记得更改）

在admin|menu选项卡中自定义菜单
1. 文章管理的路径：/articles
2. 页面管理的路径：/pages
3. 分类管理的路径：/cates
4. 标签管理的路径：/tags
5. 顶栏管理的路径：/navs
6. 导航分类管理的路径：/nav_cates

### 维护
由于本人是个初中住宿生，没有太多时间维护,**欢迎Pull request** <br/>
现维护计划：每两周更新一次，将[ThemeTony](https://github.com/ThemeTony)系列项目的重要变更添加进来，由于每个人的审美观和博客的用途不同且我没有太多的时间维护，会对一些不重要的更新忽略，请谅解！<br/>
寒暑假等闲暇时光，我将会对前端部分重构，会尽可能在不影响study的情况下珍惜兴趣爱好，尽可能维护此项目
