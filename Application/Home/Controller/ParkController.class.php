<?php

namespace Home\Controller;

use Think\Controller;

// 景区类 add by leo 2018.03.19

class ParkController extends PublicController {

    protected $parkListUrl = "http://lingshan.sendinfo.com.cn/ticket_server/port/ticket/queryList.htm"; //景区列表接口URL
    protected $parkInfoUrl = "http://lingshan.sendinfo.com.cn/ticket_server/port/ticket/queryInfo.htm"; //景区详情接口URL
    public $areaId = "5321"; // 片区id
    // 景区列表

    public function index() {
        $transTime = date("Y-m-d H:i:s", time());
        $bizContent = array("areaId" => $this->areaId);
        $sign = MD5($this->partner . "queryParkList" . $transTime . $bizContent . $this->partner_key); //签名
        $data = json_encode(array("transTime" => $transTime, "partner" => $this->partner, "method" => "queryParkList", "sign" => $sign, "bizContent" => $bizContent));
        $result = $this->curlPostjson($this->parkListUrl, 'post', $data);
        print_r($result);
        exit;
        //返回值处理
        $this->display();
    }

    // 景区详情
    public function info() {
        $id = I('get.id'); // 获取酒店id
        $transTime = date("Y-m-d H:i:s", time());
        $bizContent = array("parkId" => $id);
        $sign = MD5($this->partner . "queryParkDetailList" . $transTime . $bizContent . $this->partner_key); //签名
        $data = json_encode(array("transTime" => $transTime, "partner" => $this->partner, "method" => "queryParkDetailList", "sign" => $sign, "bizContent" => $bizContent));
        $result = $this->curlPostjson($this->parkInfoUrl, 'post', $data);
        //返回值处理
        $this->display();
    }
    
    
    // 景区下单
    public function saveOrder() {
        $id = I('get.id'); // 获取景区产品id
        $data = I('post.'); //页面参数
        $transTime = date("Y-m-d H:i:s", time());
        $data['productCode'] = $id;
        //从session中获取用户id
        $userid = session('loginId');
        $data['loginId'] = $userid;
        $bizContent = array($data);
        $sign = MD5($this->partner . "saveTicketOrder" . $transTime . $this->partner_key); //签名
        $post_data = json_encode(array("transTime" => $transTime, "partner" => $this->partner, "method" => "saveTicketOrder", "sign" => $sign, "bizContent" => $bizContent));
        $result = $this->curlPostjson($this->saveOrderUrl, 'post', $post_data);
    }

}
