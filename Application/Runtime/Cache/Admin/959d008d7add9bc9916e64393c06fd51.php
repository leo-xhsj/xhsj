<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<title><?php echo ($config["companyname"]); ?>-后台管理系统</title>
<!--[if lt IE 8]>
<script>
	alert('H+已不支持IE6-8，请使用谷歌、火狐等浏览器\n或360、QQ等国产浏览器的极速模式浏览本页面！');
</script>
<![endif]-->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="/thinkphpH/Public/assets/css/Css.css" />
<link href="/thinkphpH/Public/assets/css/font-awesome.min.css" rel="stylesheet">
<?php if($sel == 1 || $sel == 3 || $sel == 4): ?><script type="text/javascript" charset="utf-8" src="/thinkphpH/Public/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="/thinkphpH/Public/Ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/thinkphpH/Public/Ueditor/ueditor.parse.js"></script>
    <script type="text/javascript" src="/thinkphpH/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" charset="utf-8" src="/thinkphpH/Public/Ueditor/ueditor.config.min.js"></script><?php endif; ?>
<?php if($sel == 2 || $sel == 3 || $sel == 4): ?><link rel="stylesheet" type="text/css" href="/thinkphpH/Public/User/css/uploadify.css" />
	<script src="/thinkphpH/Public/assets/js/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/thinkphpH/Public/User/js/jquery.uploadify-3.1.js"></script><?php endif; ?>
<?php if($sel == 4): ?><link href="/thinkphpH/Public/assets/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<link href="/thinkphpH/Public/assets/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/thinkphpH/Public/assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/thinkphpH/Public/assets/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script><?php endif; ?>
</head>
<body>
	
</body>
</html>

  
	<ol class="breadcrumb">
		<li><a class="J_menuItem" href="<?php echo U('Index/summarize');?>">首页</a></li>
		<li>数据备份</li>
	</ol>
	<div class="content">
		<div class="Config_nav">
			<ul>
				<li><a href="<?php echo U('Dbak/export');?>">备份数据库</a></li>
				<li><a onClick="myform.action='<?php echo U('Dbak/optimize');?>';myform.submit();" href="javascript:void(0)">优化表</a></li>
				<li><a onClick="myform.action='<?php echo U('Dbak/repair');?>';myform.submit();" href="javascript:void(0)">修复表</a></li>
			</ul>
		</div>
		<form name="myform" id="export-form" method="post" action="<?php echo U('export');?>">
			<div class="List">
				<div class="table-list">
					<ul>
						<li class="ID"><input id="check_box" onClick="selectall('tables[]');" checked="checked" type="checkbox" value=""></li>
						<li class="Name">表名</li>
						<li class="Property">数据量</li>
						<li class="S_Order">字符集</li>
						<li class="Status">数据大小</li>
						<li class="Oper">更新时间</li>
					</ul>
				</div>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="ProList">
						<ul>
							<li class="ID"><input  checked="chedked" type="checkbox" name="tables[]" value="<?php echo ($vo["name"]); ?>"></li>
							<li class="Name"><?php echo ($vo["name"]); ?></li>
							<li class="Property"><?php echo ($vo["rows"]); ?></li>
							 <li class="S_Order"><?php echo ($vo["collation"]); ?></li>
							<li class="Status"><?php echo (format_bytes($vo["data_length"])); ?></li>
							<li class="Oper"><?php echo ($vo["update_time"]); ?></li>
						</ul>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</form>
		<script type="text/javascript">
			function selectall(name) {
				if($("#check_box").prop('checked')== true) {
					$("input[name='"+name+"']").each(function() {
						$(this).prop('checked',true);
						
					});
				} else {
					$("input[name='"+name+"']").each(function() {
						$(this).removeAttr("checked");
					});
				}
			} 
		</script>
		<!-- Footer Start -->
<footer>
    技术支持：<a href="http://www.chufengkj.cn" title="某某信息有限公司" target="_blank">辽宁楚丰科技有限公司</a> 1.0版本 &copy; 2016 - 2018
</footer>
<!-- Footer End -->	

	</div>