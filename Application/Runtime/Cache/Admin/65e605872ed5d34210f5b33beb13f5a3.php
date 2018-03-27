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
        <li>用户信息</li>
    </ol>
    <div class="content">
        <div class="Config_nav">
            <ul>
                <li><a class="on" href="<?php echo U('User/index');?>">用户信息</a></li>
                <li><a href="<?php echo U('User/group_list');?>">会员组管理</a></li>
                <li><a href="<?php echo U('User/group_add');?>">会员组添加</a></li>
            </ul>
        </div>
        <div class="Search">
            <form action="" method="get">
                <div class="keyword"><input class="common-text input-text" size="25" placeholder="用户名" name="q" value=""  type="text"></div>
                <div class="btn1"><input class="btn btn-primary btn6 mr10" value="查询" type="submit" /></div>
            </form>
        </div>
        <div class="List">
            <div class="table-list">
                <ul>
                    <li class="ID">ID</li>
                    <li class="Name">用户名</li>
                    <li class="Property">所属会员组</li>
                    <li class="S_Order">积分</li>
                    <li class="Status">状态</li>
                    <li class="Oper">管理操作</li>
                </ul>
            </div>
            <?php if(is_array($user_list)): foreach($user_list as $k=>$vo): ?><div class="ProList">
                    <ul>
                        <li class="ID"><?php echo ($vo["userid"]); ?></li>
                        <li class="Name"><a href="<?php echo U('User/edit',array('userid'=>$vo['userid']));?>"><?php echo ($vo["username"]); ?></a></li>
                        <li class="Property"><?php echo get_groupname($vo['groupid']);?></li>
                        <li class="S_Order"><?php echo ($vo["point"]); ?></li>
                        <li class="Status"><a href="<?php echo U('User/status',array('userid'=>$vo['userid'],'islock'=>$vo['islock']));?>"><?php echo ($vo[islock] == 1?'正常':'<font color=red>锁定</font>'); ?></a></li>
                        <li class="Oper">
                            <div>
                                <a href="<?php echo U('User/edit',array('userid'=>$vo['userid']));?>">编辑</a>
                                <span>|</span>
                                <a href="<?php echo U('User/delete',array('userid'=>$vo['userid']));?>">删除</a>
                            </div>
                        </li>
                    </ul>
                </div><?php endforeach; endif; ?>
            <div class="cl" style="margin-top: 15px;"></div>
            <div class="Order_submit">
                <div class="tp_pages"><?php echo ($page); ?></div>
            </div>
        </div>
        <!-- Footer Start -->
<footer>
    技术支持：<a href="http://www.chufengkj.cn" title="某某信息有限公司" target="_blank">辽宁楚丰科技有限公司</a> 1.0版本 &copy; 2016 - 2018
</footer>
<!-- Footer End -->	

    </div>