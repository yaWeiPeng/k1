<?php /*a:5:{s:68:"/www/wwwroot/www.lilymin.com/application/admin/view/column/list.html";i:1615799180;s:71:"/www/wwwroot/www.lilymin.com/application/admin/view/public/_header.html";i:1614937591;s:67:"/www/wwwroot/www.lilymin.com/application/admin/view/top/search.html";i:1615951527;s:65:"/www/wwwroot/www.lilymin.com/application/admin/view/top/curd.html";i:1616138187;s:71:"/www/wwwroot/www.lilymin.com/application/admin/view/public/_footer.html";i:1615798732;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/static/admin/css/font.css">
        <link rel="stylesheet" href="/static/admin/css/xadmin.css">
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
		<!--兼容jq-->
		<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
		
		<!--百度编辑器js-->
		<script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.min.js"> </script>
		<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
		<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
		<script type="text/javascript" charset="utf-8" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
		
    </head>
    <body>
	<div class="x-nav">
		<?php if(isset($title)): ?>
		<!-- <span class="layui-breadcrumb">
			<a href="javascript:void(0)">首页</a>
			<a><cite><?php echo htmlentities($title); ?></cite></a>
		</span> -->
		<?php endif; ?>
		<a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
	</div>
	<?php if(('list'=='list')): ?>
	<div class="layui-fluid">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md12">
				<div class="layui-card">
	<?php endif; if(('list'=='edit')): ?>
	<div class="layui-fluid">
		<div class="layui-row">
	<?php endif; ?>
<!-- 搜索项 -->
<div class="layui-card-body ">
	<form class="layui-form layui-col-space5" action="/column/index" method="get">
		<?php if(('[date]'==1)): ?>
		<div class="layui-inline layui-show-xs-block">
			<input class="layui-input"  autocomplete="off" placeholder="开始日" name="search[time][start]" id="start" <?php if((!empty($search['time']['start']))): ?>value="<?php echo htmlentities($search['time']['start']); ?>"<?php endif; ?>>
		</div>
		<div class="layui-inline layui-show-xs-block">
			<input class="layui-input"  autocomplete="off" placeholder="截止日" name="search[time][end]" id="end" <?php if((!empty($search['time']['end']))): ?>value="<?php echo htmlentities($search['time']['end']); ?>"<?php endif; ?>>
		</div>
		<?php endif; if((['位置'=>'position','栏目名字'=>'column_name'] != '')): foreach(['位置'=>'position','栏目名字'=>'column_name'] as $k=>$v): ?>
		<div class="layui-inline layui-show-xs-block">
			<input type="text" name="search[likes][<?php echo htmlentities($v); ?>]"  placeholder="输入%<?php echo htmlentities($k); ?>%" autocomplete="off" class="layui-input" <?php if((!empty($search['likes'][$v]))): ?>value="<?php echo htmlentities($search['likes'][$v]); ?>"<?php endif; ?>>
		</div>
		<?php endforeach; ?>
		<?php endif; ?>
		<div class="layui-inline layui-show-xs-block">
			<button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
		</div>
	</form>
</div>
<script>
layui.use(['laydate'], function(){
	var laydate = layui.laydate;

	//日历
	laydate.render({
		elem: '#start' //指定id
	});

	//日历
	laydate.render({
		elem: '#end' //指定id
	});


});
</script>
<!-- 添加删除按钮 -->
<div class="layui-card-header">
	<?php if(('/column/del')): ?>
	<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
	<?php endif; if(('/column/edit')): ?>
	<button class="layui-btn" onclick="xadmin.open('添加','/column/edit')"><i class="layui-icon"></i>添加</button>
	<?php endif; ?>
</div>

<script>
layui.use(['form'], function(){
	var form = layui.form;

	// 监听全选
	form.on('checkbox(checkall)', function(data){
		if(data.elem.checked){
			$('tbody input').prop('checked',true);
		}else{
			$('tbody input').prop('checked',false);
		}
		form.render('checkbox');
	});
});
/*删除选中*/
function delAll (argument) {
	var ids = [];

	// 获取选中的id 
	$('tbody input').each(function(index, el) {
		if($(this).prop('checked')){
		   ids.push($(this).val())
		}
	});

	layer.confirm('确认要删除吗？'+ids.toString(),function(index){
		//捉到所有被选中的，发异步进行删除
		delajax('post','/column/del',ids);
	});
}
</script>
<div class="layui-card-body ">
	<table class="layui-table layui-form">
		<thead>
			<tr>
				<th><input type="checkbox" lay-filter="checkall" name="" lay-skin="primary"></th>
				<th>栏目名</th>
				<th>访问地址</th>
				<th>显示位置</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody class="x-cate">
		<?php if((!empty($data))): foreach($data as $v): ?>
		<tr cate-id='<?php echo htmlentities($v["id"]); ?>' fid='<?php echo htmlentities($v["pid"]); ?>'>
			<td><input type="checkbox" class="checkbox" name="id" value="<?php echo htmlentities($v['id']); ?>" lay-skin="primary"></td>
			<td><?php if((isset($v['son']) && $v['son']==1)): ?><i class="layui-icon x-show" status='true'>&#xe623;</i><?php endif; ?><?php echo htmlentities($v["column_name"]); ?></td>
			<td><?php echo htmlentities($v["url"]); ?></td>
			<td><?php echo htmlentities($v["position"]['text']); ?></td>
			<td class="td-status">
				<span class="layui-btn layui-btn-mini <?php if(($v['status']['status'] == 0)): ?>layui-btn-warm<?php else: ?>layui-btn-normal<?php endif; ?>"><?php echo htmlentities($v['status']['text']); ?></span>
			</td>
			<td class="td-manage">
				<button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','/column/edit?id=<?php echo htmlentities($v['id']); ?>')" ><i class="layui-icon">&#xe642;</i>编辑</button>
				<!-- <button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="xadmin.open('添加子栏目','/novel-category-edit/<?php echo htmlentities($v['id']); ?>')" ><i class="layui-icon">&#xe642;</i>添加子栏目</button> -->
				<button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="del(this,<?php echo htmlentities($v['id']); ?>)" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr fid='0'>
			<td colspan="20" align="center">暂无数据</td>
		</tr>
		<?php endif; ?>
		</tbody>
	</table>
</div>
<?php if((!empty($search))): ?>
<?php echo $data; ?>
<?php endif; ?>
<script>
	/*删除*/
	function del(obj,id){
		layer.confirm('确认要删除吗？',function(index){
			delajax('post','/column/del',id);
		});
	}
	
	// 分类展开收起的分类的逻辑
	$("tbody.x-cate tr[fid!='0']").hide();
	// 栏目多级显示效果
	$('.x-show').click(function () {
		if($(this).attr('status')=='true'){
			$(this).html('&#xe625;'); 
			$(this).attr('status','false');
			cateId = $(this).parents('tr').attr('cate-id');
			$("tbody tr[fid="+cateId+"]").show();
		}else{
			cateIds = [];
			$(this).html('&#xe623;');
			$(this).attr('status','true');
			cateId = $(this).parents('tr').attr('cate-id');
			getCateId(cateId);
			for (var i in cateIds) {
				$("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
			}
	   }
	})
	var cateIds = [];
	function getCateId(cateId) {
		$("tbody tr[fid="+cateId+"]").each(function(index, el) {
			id = $(el).attr('cate-id');
			cateIds.push(id);
			getCateId(id);
		});
	}
</script>
<?php if(('list'=='list')): ?>
			</div>
		</div>
	</div>
</div>

<script>
function delajax(type,url,id){
	$.ajax({
		type:type,
		url:url,
		data:{id:id},
		success:function(data){
			var data = JSON.parse(data);
			if(data.code == 1){
				layer.msg(data.msg,{icon:1,time:1000});
				setTimeout(function () {
					location.reload();
				},1000);
			}else{
				layer.msg(data.msg, {icon: 2});
			}
		}
	});
}
</script>
<?php endif; if(('list'=='edit')): ?>
	</div>
</div>

<script>
function editajax(type,url,field){
	$.ajax({
		type:type,
		url:url,
		data:{data:field},
		success:function(data){
			var data = JSON.parse(data);
			if(data.code == 1){
				layer.msg(data.msg, {icon: 1});
				var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
				setTimeout(function () {
				  parent.layer.close(index);
				  parent.location.reload();
				},1000);
			}else{
				layer.msg(data.msg, {icon: 2});
			}
		}
	});
}
</script>
<?php endif; ?>


</body>

</html>