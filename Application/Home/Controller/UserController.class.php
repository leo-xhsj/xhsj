<?php
namespace Home\Controller;
use Think\Controller;

// 用户类 add by leo  2018.03.19

class UserController extends PublicController
{
    
    
    public $registerUrl = "http://lc.sendinfo.com.cn/member/port/member"; //根据手机号验证码注册
    public $sendCodeUrl = "http://lingshan.sendinfo.com.cn/central_server/wz/port/sendCode.htm";  // 发送手机验证码接口URL
    public $sendCheckCodeUrl ="http://lingshan.sendinfo.com.cn/central_server/port/common/info.htm?checkCode"; // 可按类型发送手机验证码接口URL
    
    
    // 根据手机号 验证码注册
    public function register() {
        if (IS_POST) {
            $data = I('post.');
            $mobile = I('post.mobile'); // 手机号
            $checkCode = I('post.checkCode'); //验证码
            $transTime = date("Y-m-d H:i:s", time());
            if (!$mobile) {
                $this->error('手机号不能为空');
            }
            if (!$checkCode) {
                $this->error('手机验证码不能为空');
            }
            if(I('post.pwd')){
               $data['pwd'] = strtoupper(md5(I('post.pwd')));
            }
            $data['method'] ="regConsumerInfoCheckCode";
            $data['partner'] =$this->partner;
            $data['transTime'] =$transTime;
            $data['sign'] ="abcdefg1234567";
            $code = I('post.code'); //验证码
            $verify = new \Think\Verify();
            if (!$verify->check($code)) {
                $this->error('验证码错误');
            }
            $new_data['data'] = $data;
            $post_data = json_encode($new_data);
            
            $result = $this->curlPostjson($this->registerUrl, 'post', $post_data);
            header("Content-type: text/html; charset=utf-8");
            print_r($result);
            exit;
            $this->ajaxReturn($result);
        } else {
            $this->display();
        }
    }

    
    // 根据类型发送手机验证码
    public function sendMsgByType(){
        $type = I('get.id');
        $transTime = date("Y-m-d H:i:s", time());
        $bizContent = array("mobile" => "15942357097", "codeType" => $type);
        $sign = MD5($this->partner . "mobileCheckCode" . $transTime . $this->partner_key); //签名
        $data = json_encode(array("partner" => $this->partner, "method" => "mobileCheckCode","transTime" => $transTime, "sign" => $sign, "bizContent" => $bizContent));
        $result = $this->curlPostjson($this->sendCheckCodeUrl, 'post', $data); 
        header("Content-type: text/html; charset=utf-8");
        print_r($data);
        exit;
        //返回值处理
        $this->display();
    }
    
    
    // 发送手机验证码
    public function sendMsg(){
        $transTime = date("Y-m-d H:i:s", time());
        $bizContent = array("mobile" => "15942357097","codeType"=>"5");
        $sign = MD5($this->partner . "sendCode" . $transTime); //签名
        $data = json_encode(array("partner" => $this->partner, "method" => "sendCode","transTime" => $transTime, "sign" => $sign, "bizContent" => $bizContent));
        $result = $this->curlPostjson($this->sendCodeUrl, 'post', $data); 
        $this->ajaxReturn($result);
    }
    
    //页面验证码
    public function verify()
    {
        ob_clean();
        $Verify = new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length = 4;
        $Verify->useNoise = true;
        $Verify->entry();
    }
    
    public function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    return array($httpCode, $response);
}
}