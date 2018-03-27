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
        <li><a href="<?php echo U('Index/index');?>">首页</a></li>
        <li><a href="<?php echo U('Admin/auth_list');?>">用户组列表</a></li>
        <li>管理员编辑</li>
    </ol>
    <div class="content">
        <div class="Config_nav">
            <ul>
                <li><a class="on" href="<?php echo U('Admin/auth_list');?>">用户组列表</a></li>
                <li><a href="<?php echo U('Admin/auth_add');?>">用户组添加</a></li>
            </ul>
        </div>
        <form action="<?php echo U('admin/auth_insert');?>" method="post" id="form"  enctype="multipart/form-data">  
            <div class="SiteContent">
                <ul>
                    <li class="Name">用户组名称</li>
                    <li class="input"><input type="text" name="title" class="common-text input-text" size="30" value="" /></li>
                </ul>
                <ul>
                    <li class="Name">描述</li>
                    <li class="input"><textarea name="info" class="common-textarea textarea" cols="30" style="width: 30%;" rows="5"></textarea></li>
                </ul>
                <ul>
                    <li class="Name">权限</li>
                    <li class="input">
                    	<div><b>内容管理</b></div>
                    	<div class="cl"></div>
                        <div style="overflow: hidden;">
                            <div class="radio"><span><input type="checkbox" name="category" value="1"></span><label for="hotpro1">栏目管理</label></div>
                            <div class="radio"><span><input type="checkbox" name="article" value="1"></span><label for="compro2">文章管理</label></div>
                            <div class="radio"><span><input type="checkbox" name="download" value="1"></span><label for="compro2">下载管理</label></div>
                            <div class="radio"><span><input type="checkbox" name="jobs" value="1"></span><label for="compro2">招聘管理</label></div>
                        </div>
                        <div><b>留言管理</b></div>
                    	<div class="cl"></div>
                        <div style="overflow: hidden;">
                            <div class="radio"><span><input type="checkbox" name="guest" value="1"></span><label for="hotpro1">全部留言</label></div>
                            <div class="radio"><span><input type="checkbox" name="newguest" value="1"></span><label for="compro2">新消息</label></div>
                            <div class="radio"><span><input type="checkbox" name="guestback" value="1"></span><label for="compro2">已回复</label></div>
                        </div>
                        <div><b>会员管理</b></div>
                    	<div class="cl"></div>
                        <div style="overflow: hidden;">
                        	<div class="radio"><span><input type="checkbox" name="member" value="1"></span><label for="hotpro1">会员列表</label></div>
                        </div>
                        <div><b>基本设置</b></div>
                    	<div class="cl"></div>
                        <div style="overflow: hidden;">
                            <div class="radio"><span><input type="checkbox" name="site" value="1"></span><label for="hotpro1">基本设置</label></div>
                            <div class="radio"><span><input type="checkbox" name="flink" value="1"></span><label for="compro2">友情链接</label></div>
                            <div class="radio"><span><input type="checkbox" name="banner" value="1"></span><label for="compro2">幻灯片管理</label></div>
                            <div class="radio"><span><input type="checkbox" name="cache" value="1"></span><label for="compro2">清理缓存</label></div>
                        </div>
                        <div><b>数据库管理</b></div>
                    	<div class="cl"></div>
                        <div style="overflow: hidden;">
                            <div class="radio"><span><input type="checkbox" name="dbak" value="1"></span><label for="hotpro1">数据备份</label></div>
                            <div class="radio"><span><input type="checkbox" name="import" value="1"></span><label for="compro2">数据还原</label></div>
                        </div>
                    </li>
                </ul>
                <div class="cl" style="height: 10px;"></div>
                <div class="btn">
                    <input class="btn btn-primary btn6 mr10" name="submit" value="保存" style="margin-right: 10px;" type="submit"><input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                </div>
            </div>
        </form>           
        <!-- Footer Start -->
<footer>
    技术支持：<a href="http://www.chufengkj.cn" title="某某信息有限公司" target="_blank">辽宁楚丰科技有限公司</a> 1.0版本 &copy; 2016 - 2018
</footer>
<!-- Footer End -->	

    </div>