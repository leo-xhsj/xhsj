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
            <li>操作记录</li>
		</ol>
        <div class="content">
			<div class="Config_nav">
                <ul>
                    <li><a class="on" href="<?php echo U('Action/index');?>">操作记录</a></li>
                </ul>
            </div>
            <div class="SiteContent">
                <ul>
                    <li class="Name">操作用户</li>
                    <li class="input"><?php echo get_nickname($detail['user_id']);?></li>
                </ul>
                <ul>
                    <li class="Name">执行Ip</li>
                    <li class="input"><?php echo long2ip($detail['action_ip']);?></li>
                </ul>
                 <ul>
                    <li class="Name">执行表</li>
                    <li class="input"><?php echo ($detail["model"]); ?></li>
                </ul>
                <ul>
                    <li class="Name">执行时间</li>
                    <li class="input"><?php echo (date("Y-m-d H:i:s",$detail["create_time"])); ?></li>
                </ul>
                <ul>
                    <li class="Name">备注</li>
                    <li class="input"><?php echo ($detail["remark"]); ?></li>
                </ul>

                <div class="cl" style="height: 10px;"></div>
                <div class="btn">
                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                </div>
            </div>
            <!-- Footer Start -->
<footer>
    技术支持：<a href="http://www.chufengkj.cn" title="某某信息有限公司" target="_blank">辽宁楚丰科技有限公司</a> 1.0版本 &copy; 2016 - 2018
</footer>
<!-- Footer End -->	

        </div>