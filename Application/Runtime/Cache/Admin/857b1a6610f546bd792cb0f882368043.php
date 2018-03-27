<?php if (!defined('THINK_PATH')) exit(); $sel = 2; ?>
<!DOCTYPE HTML>
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
            <li>基本设置</li>
		</ol>
        <div class="content">
        	<div class="Config_nav">
                <ul>
                    <li><a class="on" href="<?php echo U('Site/index');?>">网站基本设置</a></li>
                </ul>
            </div>
            <form action="<?php echo U('Site/update');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <div class="SiteContent">
                    <ul>
                        <li class="Name">公司名称</li>
                        <li class="input">
                        	<input type="text" value="<?php echo ($info["companyname"]); ?>" size="40" name="companyname" class="common-text input-text">
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">公司电话</li>
                        <li class="input"><input type="text" value="<?php echo ($info["site_phone"]); ?>" size="40" name="site_phone" class="common-text input-text"></li>
                    </ul>
                    <ul>
                        <li class="Name">网站Logo</li>
                        <li class="input">
                        	<input id="upload_file" type="file">
                            <div class="cl" style="margin-top: 5px;"></div>
                             <?php if($info[site_logo]): ?><div class="Pic"><span><a href="<?php echo ($info["site_logo"]); ?>" target="_blank"><img src="<?php echo ($info["site_logo"]); ?>" /></a></span></div><?php endif; ?>
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">网站网址</li>
                        <li class="input">
                        	<input type="text" value="<?php echo ($info["url"]); ?>" size="40" name="url" class="common-text input-text">
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">SEO标题</li>
                        <li class="input">
                            <input type="text" value="<?php echo ($info["ptitle"]); ?>" size="40" name="ptitle" class="common-text input-text">
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">SEO关键字</li>
                        <li class="input">
                            <input type="text" value="<?php echo ($info["pkeywords"]); ?>" size="40" name="pkeywords" class="common-text input-text">
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">SEO描述</li>
                        <li class="input">
                            <input type="text" value="<?php echo ($info["pdescription"]); ?>" size="60" name="pdescription" class="common-text input-text">
                        </li>
                    </ul>
					<ul>
						<li class="Name">网站模板</li>
						<li class="input">
							<select name="template_pc">
								<?php if(is_array($pc)): foreach($pc as $k=>$vo): ?><option value="<?php echo ($vo["dirname"]); ?>" <?php if($vo['dirname'] == $detail['template']): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?> ( <?php echo ($vo["dirname"]); ?> )</option><?php endforeach; endif; ?>
							</select>
						</li>
					</ul>
					<ul>
						<li class="Name">WAP网站模板</li>
						<li class="input">
							<select name="template_wap">
								<?php if(is_array($wap)): foreach($wap as $k=>$vo): ?><option value="<?php echo ($vo["dirname"]); ?>" <?php if($vo['dirname'] == $detail['template']): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?> ( <?php echo ($vo["dirname"]); ?> )</option><?php endforeach; endif; ?>
							</select>
						</li>
					</ul>
                    <ul>
                        <li class="Name">公司地址</li>
                        <li class="input">
                            <input type="text" value="<?php echo ($info["site_address"]); ?>" size="60" name="site_address" class="common-text input-text">
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">Email</li>
                        <li class="input">
                            <input type="text" value="<?php echo ($info["site_email"]); ?>" size="60" name="site_email" class="common-text input-text">
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">备案号</li>
                        <li class="input">
                            <input type="text" value="<?php echo ($info["site_filing"]); ?>" size="60" name="site_filing" class="common-text input-text">
                        </li>
                    </ul>
                    <ul>
                    	<li class="Name">上传大小</li>
                        <li class="input">
                            <input type="text" value="<?php echo ($info["file_size"]); ?>" size="60" name="file_size" class="common-text input-text"><span>单位：MB, 0为不限制大小</span>
                        </li>
                    </ul>
                    <ul>
                        <li class="Name">Js代码调用</li>
                        <li class="input"><textarea name="site_jstransfer" class="common-textarea textarea" cols="30" style="width: 50%;" rows="5"><?php echo ($info["site_jstransfer"]); ?></textarea></li>
                    </ul>
                    <ul>
                        <li class="Name">底部版权</li>
                        <li class="input"><textarea name="site_copyright" class="common-textarea textarea" cols="30" style="width: 50%;" rows="5"><?php echo ($info["site_copyright"]); ?></textarea></li>
                    </ul>
                    <ul>
						<li class="Name">后台风格</li>
						<li class="input">
							<select name="pattern">
								<option value="1" <?php if($info['pattern'] == 1): ?>selected="selected"<?php endif; ?>>界面一</option>
                                <option value="2" <?php if($info['pattern'] == 2): ?>selected="selected"<?php endif; ?>>界面二</option>
							</select>
						</li>
					</ul>
                    <div class="cl" style="height: 10px;"></div>
                    <div class="btn">
                        <input class="btn btn-primary btn6 mr10" value="提交" style="margin-right: 10px;" type="submit">
                        <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                    </div>
				</div>
            </form>           
            <!-- Footer Start -->
<footer>
    技术支持：<a href="http://www.chufengkj.cn" title="某某信息有限公司" target="_blank">辽宁楚丰科技有限公司</a> 1.0版本 &copy; 2016 - 2018
</footer>
<!-- Footer End -->	

        </div>

<script type="text/javascript">
$(function(){
	$('#upload_file').uploadify({
		'queueSizeLimit'  : 1,
		'swf'             : '/thinkphpH/Public/User/uploadify.swf',
		'uploader'        : "<?php echo U('Public/uploadAttach',array('session_id'=>session_id(),'type'=>'1'));?>",
		'fileObjName'     : $('#upload_file').attr('name'),
		'buttonClass'     : 'upload-case',
		'width'           : 150,
		'height'          : 25,
		'removeTimeout'   : 1,
		'buttonText'      : '上传图片',
		'fileTypeExts'    : '*.gif; *.jpg; *.png;',
		'onUploadSuccess' : function(file, data, response) {
			//var data = $.parseJSON(data);
			var data = eval("("+data+")");
			if(data.status ==0){
				alert('上传出错，请稍后再试');
				return false;
			}
			if(data.status==1){           	
				var html = '<div class="cl" style="margin-top: 5px;"></div>'
				html += '<div id="attachment">'+'<span><img src="'+data.file+'"></span>' ;
				html += '<a href="javascript:void(0)" onclick="delete_attachment(this);">删除</a>';
				html += '<input type="hidden" name="site_logo" value="'+data.file+'" /></div>';
				$('#upload_file').after(html);
			} else {
				alert('上传出错，请稍后再试');
				return false;
			}
		},
		'onSelect' : function(file) {
			var length = $('#attachment').length;
			if(length > 0){
				$('#upload_file').uploadify('cancel')
				$('#upload_file').uploadify('stop');
				alert('附件只允许上传一个');
				return false;
			}
		}
	});
	 });
	function delete_attachment(e){
		var $this = $(e);
		$this.parent('div').remove();
	}
</script>