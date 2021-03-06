<?php /*a:1:{s:69:"D:\phpstudy_pro\WWW\www.lilymin.com\application\admin\view\index.html";i:1616722398;}*/ ?>
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title><?=globSet('title')?></title>
		<link rel="icon" href="<?=globSet('ico')?>" type="image/x-icon"/>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4,initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="stylesheet" href="/static/admin/css/font.css">
		<link rel="stylesheet" href="/static/admin/css/xadmin.css">
		<!-- <link rel="stylesheet" href="./css/theme5.css"> -->
		<script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
		<script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
		
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<script>
			// 是否开启刷新记忆tab功能
			// var is_remember = false;
		</script>
		<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
				var date = new Date();
				$("#showDate").html(date.toLocaleDateString()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());
				setInterval("getTime();",1000); //每隔一秒运行一次
			})
			//取得系统当前时间
			function getTime(){
				var myDate = new Date();
				var date = myDate.toLocaleDateString();
				var hours = myDate.getHours();
				var minutes = myDate.getMinutes();
				var seconds = myDate.getSeconds();
				$("#showDate").html(date+" "+hours+":"+minutes+":"+seconds); //将值赋给div
			}
		</script>
	</head>
    <body class="index">
        <!-- 顶部&&左侧开始 -->
        
		<div class="container">
			<div class="logo">
				<a href="/admin"><?=globSet('title')?></a></div>
			<div class="left_open">
				<a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
			</div>
			<ul class="layui-nav left fast-add" lay-filter="">
				<li class="layui-nav-item">
					<a href="javascript:;">管理</a>
					<dl class="layui-nav-child">
						<!-- 二级菜单 -->
						<!-- <dd>
							<a onclick="xadmin.open('最大化','http://www.baidu.com','','',true)">
								<i class="iconfont">&#xe6a2;</i>弹出最大化</a>
						</dd>
						<dd>
							<a onclick="xadmin.open('弹出自动宽高','http://www.baidu.com')">
								<i class="iconfont">&#xe6a8;</i>弹出自动宽高</a>
						</dd>
						<dd>
							<a onclick="xadmin.open('弹出指定宽高','http://www.baidu.com',500,300)">
								<i class="iconfont">&#xe6a8;</i>弹出指定宽高</a>
						</dd>
						<dd>
							<a onclick="xadmin.add_tab('在tab打开','member-list.html')">
								<i class="iconfont">&#xe6b8;</i>在tab打开</a>
						</dd>
						<dd>
							<a onclick="xadmin.add_tab('在tab打开刷新','member-del.html',true)">
								<i class="iconfont">&#xe6b8;</i>在tab打开刷新</a>
						</dd> -->
						<?php $tagColumn = new \think\template\taglib\caption\tagColumn;$taglist = $tagColumn->getColumn("son","1","","");foreach($taglist as $k=>$v): ?>
						<dd>
							<a onclick="xadmin.add_tab('<?php echo htmlentities($v['column_name']); ?>','<?php echo htmlentities($v['url']); ?>',true)">
								<i class="iconfont">&#xe6f7;</i><?php echo htmlentities($v['column_name']); ?></a>
						</dd>
						<?php endforeach; ?>
					</dl>
				</li>
			</ul>
			<ul class="layui-nav right">
				<li class="layui-nav-item layui-hide-xs layui-show-sm-inline-block">
					登录:&nbsp;<span><?php echo htmlentities($userInfo['login_time']); ?></span>
				</li>
				<li class="layui-nav-item layui-hide-xs layui-show-sm-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li class="layui-nav-item layui-hide-xs layui-show-sm-inline-block">
					当前:&nbsp;<span id="showDate"></span>
				</li>
				<li class="layui-nav-item">
					<a href="javascript:;"><span id="topname"><?php echo htmlentities($userInfo['username']); ?></span></a>
					<dl class="layui-nav-child">
						<!-- 二级菜单 -->
						<dd>
							<a onclick="xadmin.open('个人信息','http://www.baidu.com')">个人信息</a></dd>
						<!--<dd>
							<a onclick="xadmin.open('切换帐号','http://www.baidu.com')">切换帐号</a></dd>-->
						<dd>
							<a href="javascript:;" class="exit">退出</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item">
					<a href="/" target="_blank">前台首页</a></li>
			</ul>
		</div>
		<!-- 顶部结束 -->
		<!-- 中部开始 -->
		<!-- 左侧菜单开始 -->
		<div class="left-nav">
			<div id="side-nav">
				<ul id="nav">
				<?php $tagColumn = new \think\template\taglib\caption\tagColumn;$taglist = $tagColumn->getColumn("son","2","","1");foreach($taglist as $k=>$v): ?>
					<li>
						<a href="javascript:;">
							<i class="iconfont left-nav-li" lay-tips="<?php echo htmlentities($v['column_name']); ?>">&#xe6b8;</i>
							<cite><?php echo htmlentities($v['column_name']); ?></cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
						<?php if(!empty($v['son'])): foreach($v['son'] as $second): if((empty($second['son']))): ?>
							<li>
								<a onclick="xadmin.add_tab('<?php echo htmlentities($second['column_name']); ?>','<?php echo htmlentities($second['url']); ?>','true')">
									<i class="iconfont">&#xe6a7;</i>
									<cite><?php echo htmlentities($second['column_name']); ?></cite></a>
							</li>
						<?php else: ?>
							<li>
								<a href="javascript:;">
									<i class="iconfont">&#xe6a7;</i>
									<cite><?php echo htmlentities($second['column_name']); ?></cite>
									<i class="iconfont nav_right">&#xe697;</i></a>
								<ul class="sub-menu">
								<?php if(!empty($second['son'])): foreach($second['son'] as $third): ?>
									<li>
										<a onclick="xadmin.add_tab('<?php echo htmlentities($third['column_name']); ?>','<?php echo htmlentities($third['url']); ?>','true')">
											<i class="iconfont">&#xe6a7;</i>
											<cite><?php echo htmlentities($third['column_name']); ?></cite></a>
									</li>
								<?php endforeach; ?>
								<?php endif; ?>
								</ul>
							</li>
						<?php endif; ?>
						<?php endforeach; ?>
						<?php endif; ?>
						</ul>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<!-- <div class="x-slide_left"></div>
        
        <!-- 顶部&&左侧结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='/welcome' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->
        <!--jwt-->

		<script type="text/javascript">
		//退出
		$('.exit').click(function(){
		$.ajax({
				type:'POST',
				url:'/login/outlogin',
				success:function(data){
					var data = JSON.parse(data);
					if(data.code == 1){
						layer.msg(data.msg, {icon: 1});
						setTimeout(function () {
							location.href = data.url;
						},1000);
					}
				}
			});
		})
		
		</script>
    </body>
</html>