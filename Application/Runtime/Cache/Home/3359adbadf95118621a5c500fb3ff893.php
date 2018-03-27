<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>后台管理系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/thinkphpH/Public/assets/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/thinkphpH/Public/assets/js/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/thinkphpH/Public/assets/js/animate-css/animate.min.css" rel="stylesheet" />
    <link href="/thinkphpH/Public/assets/js/pace/pace.css" rel="stylesheet" />
    <link href="/thinkphpH/Public/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="fixed-left login-page">	
<div class="container">		
	<div class="full-content-center">
		<p class="text-center">
			<h3 class="ComName">注册页面测试</h3>
		</p>
		<div class="login-wrap animated flipInX">				
			<div class="login-block">
			<form action="<?php echo U('register');?>" method="post">			
				<div class="form-group login-input">							
					<i class="fa fa-user overlay"></i>							
					<input type="text" class="form-control text-input" name='mobile' placeholder="手机号" id='mobile'>						
				</div>
				<div class="form-group login-input">							
					<i class="fa fa-key overlay"></i>							
					<input type="password" class="form-control text-input" name='pwd' placeholder="密码" id='pwd'>						
				</div>
                                <div class="form-group login-input" style="overflow: hidden;">							
					<i class="fa fa-user overlay"></i>							
					<input type="text" class="form-control text-input" style="width: 50%;float: left;" name='checkCode' placeholder="手机验证码" id='checkCode'><div class="col-sm-6 yzm">	<input tabindex="3" value="获取验证码" style="width: 80%;float: right;" class="btn btn-success btn-block">	</div>					
				</div>
                                <div class="form-group login-input" style="overflow: hidden;">							
                                                        <i class="fa fa-lock overlay"></i>
                                    <input type="text" name="code" class="form-control text-input" style="width: 50%;float: left;" placeholder="验证码" /><img class="verify" style="display:block;float: right;cursor:pointer;width: 40%;height: 34px;" src="<?php echo U('Admin/Login/verify');?>" title="点击切换" />
                                </div>
				<div class="row">							
					<div class="col-sm-12">							
                        <input type="submit" tabindex="3" value="注册" class="btn btn-success btn-block" />						
					</div>
				</div>
			</form>
			</div>
		</div>		
	</div>	
</div>	
<script src="/thinkphpH/Public/assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="/thinkphpH/Public/assets/js/pace/pace.min.js"></script>
<script type="text/javascript">
    var mobile = document.getElementById('mobile').value;
    $(".yzm").click(function(){
        $.ajax({
                        type: "post",
                        url: "http://localhost/thinkphpH/index.php/Home/User/sendMsg",
                        data: {mobile:mobile},
                        dataType: "json",
                        success: function (data) {
                            //成功
                            
                            if (data.success == 1) {
                                alert('验证码发送成功');
                                alert(data);
                            }
                            else {
                                alert(data);
                            }
                        }
                    }); 
    });
    
    $(function(){
        $('.verify').click(function(){
            $('.verify').attr('src', "<?php echo U('Admin/Login/verify');?>?" + Math.random());
        });
    })
</script>
</body>
</html>