<?php
namespace Home\Controller;
use Think\Controller;

// 酒店类 add by leo 2018.03.19

class HotelController extends PublicController
{
    public $areaId = "5321"; // 片区id
    protected $HotelListUrl = "http://lingshan.sendinfo.com.cn/hotel_server/port/hotel/ls/wap/listHotel.htm";  // 酒店 列表接口URL
    protected $HotelInfoUrl = "http://lingshan.sendinfo.com.cn/hotel_server/port/hotel/ls/wap/infoHotel.htm";  // 酒店 详情接口URL
    protected $saveOrderUrl = "http://lingshan.sendinfo.com.cn/hotel_server/port/hotel/ls/wap/saveOrder.htm";  // 酒店 下单接口URL
    
    // 酒店列表
    public function index() {
        $transTime = date("Y-m-d H:i:s", time());
        $bizContent = array("areaId" => $this->areaId);
        $ll = $this->partner . "listHotel" . $transTime . json_encode($bizContent) . $this->partner_key;
        $sign = MD5($this->partner . "listHotel" . $transTime . json_encode($bizContent) . $this->partner_key); //签名
        $data = json_encode(array("partner" => $this->partner,"transTime" => $transTime,  "method" => "listHotel", "bizContent" => $bizContent,"sign" => $sign));
        $result = $this->curlPostjson($this->HotelListUrl, 'post', $data);
        header("Content-type: text/html; charset=utf-8");
        print_r($result);
        exit;
        //展示逻辑
        $this->display();
    }
    
    
    
    // 酒店详情
    public function info() {
        $id = I('get.id'); // 酒店id
        $transTime = date("Y-m-d H:i:s", time());
        $bizContent = array("id" => $id);
        $sign = MD5($this->partner . "infoHotel" . $transTime . $bizContent . $this->partner_key); //签名
        $data = json_encode(array("transTime" => $transTime, "partner" => $this->partner, "method" => "infoHotel", "sign" => $sign, "bizContent" => $bizContent));
        $result = $this->curlPostjson($this->HotelInfoUrl, 'post', $data);
        header("Content-type: text/html; charset=utf-8");
        print_r($result);
        exit;
        //展示逻辑
        $this->display();
    }
    
    
    // 创建订单   
    public function saveOrder() {
        $id = I('get.id'); // 产品id
        $data = I('post.');
        $transTime = date("Y-m-d H:i:s", time());
        $data['modelCode'] = $id;
        //从session中获取用户id
        $userid = session('loginId');
        $data['loginId'] = $userid;
        $bizContent = array($data);
        $sign = MD5($this->partner . "saveOrder" . $transTime . $this->partner_key); //签名
        $post_data = json_encode(array("transTime" => $transTime, "partner" => $this->partner, "method" => "saveOrder", "sign" => $sign, "bizContent" => $bizContent));
        $result = $this->curlPostjson($this->saveOrderUrl, 'post', $post_data);
    }

}