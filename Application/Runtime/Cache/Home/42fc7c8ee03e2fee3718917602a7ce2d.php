<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>团团微店</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <!--<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="/tuan/Public/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="/tuan/Public/css/bootstrap-theme.min.css">-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/tuan/Public/css/mystyle.css">
</head>
<body>
<div class="container-fluid">

    <!-- header -->
    <div class="row header">
        <div class="col-xs-3">
            <img src="/tuan/Public/images/logo.png" class="img-responsive">
        </div>
        <div class="col-xs-4 title" style="padding-left: inherit">
				<span><div class="row" >
                    <div class="col-xs-12" style="padding-left: inherit;padding-right: inherit">团团微店</div>
                </div>
				<div class="row">
                    <div class="col-xs-12" style="font-size: smaller;padding-left: inherit;padding-right: inherit;padding-top: 0.3em;">重庆学子的创业家园</div>
                </div></span>
        </div>

        <div class="col-xs-2" style="padding-left: inherit;padding-top: 0.6em;">
            <!--<div class="row" style="padding-top:0.5em;">-->
                <!--<div class="col-xs-12">-->
                    <a href="<?php echo U('Join/index');;?>"><button class="btn btn-xs btn-warning">申请入驻</button></a>
                <!--</div>-->
            <!--</div>-->
        </div>
        <div class="col-xs-2" style="padding-top: 0.6em;">
            <!--<div class="row" style="padding-top:0.5em;">-->
                <!--<div class="col-xs-12">-->
                    <a href="<?php echo U('Login/index');;?>"><button class="btn btn-xs btn-info" style="background: #459BD6;">卖家登陆</button></a>
                <!--</div>-->
            <!--</div>-->

        </div>

    </div>

<!-- pic -->
<div class="row" >
    <div class="col-xs-12" style="padding: inherit;">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active" ></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" ></li>
                <li data-target="#carousel-example-generic" data-slide-to="3" ></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <a href="<?php echo U('Topic/index');?>?topic_id=<?php echo ($topic[0]["id"]); ?>">
                        <img  id="0" src="<?php echo ($topic[0]["pic"]); ?>" class="img-responsive" style="height: 10.4em;">
                        <div class="carousel-caption">

                        </div>
                    </a>
                </div>

                <?php if(is_array($topic)): $i = 0; $__LIST__ = array_slice($topic,1,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item">
                        <a href="<?php echo U('Topic/index');?>?topic_id=<?php echo ($vo["id"]); ?>">
                            <img id="<?php echo ($i); ?>" src="<?php echo ($vo["pic"]); ?>" class="img-responsive" style="height: 10.4em;">
                            <div class="carousel-caption">

                            </div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" style="display: none">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" ></span>

            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" style="display: none">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span>

            </a>
        </div>
    </div>
</div>

<!-- 导航-->
<div class="row">
    <div class="col-xs-12" style="text-align: center; padding-top:10px;">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <a href="<?php echo U('View/index');;?>" class="btn btn-default" id="myactivc" role="button">商品浏览</a>
            <a href="<?php echo U('List/index');;?>" class="btn btn-default" role="button">排行榜</a>
            <a href="<?php echo U('Search/index');;?>" class="btn btn-default" role="button">搜索</a>
        </div>
    </div>
</div>

<!-- 排序方式 -->
    <div class="row" style="padding-top:10px;padding-bottom:10px;text-align: center;">

        <div class="col-xs-6" style="padding-right: inherit">
            <div class="radio">
                <label>
                    <a href="<?php echo U('List/index');;?>" style="color: #000000">
                        <input type="radio" name="order_id" value="0" checked>
                            最热店家Top10
                    </a>
                </label>
            </div>
        </div>

        <div class="col-xs-6" style="padding-left: inherit;">
            <div class="radio">
                <label>
                    <a href="<?php echo U('List/tag');;?>" style="color: #000000">
                        <input type="radio" name="order_id" value="1">
                    最热标签Top10
                    </a>
                </label>
            </div>
        </div>
    </div>
<!-- 店铺展示 -->
<?php if(is_array($store)): $i = 0; $__LIST__ = $store;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="margin: inherit;padding-bottom: 10px;">
        <div class="col-xs-12">
            <div class="row" style="background: white;padding-top: 1em;display: flex;">
                <div class="col-xs-4" style="width: 50%;margin: auto;margin-right: inherit;">
                    <img src="<?php echo ($vo["show_pic"]); ?>" class="img-responsive" alt="Responsive image">
                </div>
                <div class="col-xs-8" style="padding-left:inherit;width: 50%;">
                    <div class="row">
                        <div class="col-xs-12"><h4><?php echo ($vo["store_name"]); ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12"><p>商品: <?php foreach($vo['goods_type'] as $v){echo $v['type'].'  ';} ?></p></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12"><p>标签: <?php foreach($vo['tags'] as $v){echo $v['tag_name'].'  ';} ?></p></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">卖家: <?php echo ($vo["nickname"]); ?></div>
                    </div>
                </div>
            </div>
            <div class="row" style="background: white;padding-bottom: 1em;">
                <div class="col-xs-12" style="padding-top: 1em;">
                    <a href="<?php echo U('Person/index');?>?person_id=<?php echo ($vo["person_id"]); ?>"><button class="btn btn-warning">查看卖家风采</button></a>
                </div>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<!--<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>-->
<script src="/tuan/Public/js/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<!-- <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
<script src="/tuan/Public/js/bootstrap.min.js"></script>
<script src="/tuan/Public/js/mobile.js"></script>
<script>
    touch.on('.img-responsive', 'swiperight', function(){
        $(".left.carousel-control").click();
    });
    touch.on('.img-responsive', 'swipeleft', function(){
        $(".right.carousel-control").click();
    });
</script>
</body>
</html>
<script>$('input').change(function(){
    console.log($(this).parent().attr('href'));
    var link = $(this).parent().attr('href');
    window.location.href=link;
})</script>