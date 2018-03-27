<?php

namespace Home\Controller;

use Think\Controller;

// 公共类
class PublicController extends Controller {

    public $partner = "XH_SJ"; //合作人编号
    public $partner_key = "d9d40e76dfcb24fbb0415c6c0c5a71e4"; //合作人秘钥


    protected function _initialize() {
        
    }

    //POST json提交
    public function curlPostjson($url, $method = 'post', $data = '', $header) {
        $ch = curl_init();
        $header = "Accept-Charset:application/json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($data)));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        return $temp;
    }

    //上传图片
    public function uploadAttach() {
        $site = M('Site');
        $size = $site->where('siteid = 1')->getField('file_size');
        $size = intval($size) * 1048576;
        $exts = I('get.type');
        switch ($exts) {
            case 1: //图片
                $exts_arr = array('jpg', 'gif', 'png', 'jpeg');
                $path = './Images/';
                break;
            case 2: //音频
                $exts_arr = array('mp3', 'wam', 'wma', 'aac', 'mod', 'cd');
                $path = './Music/';
                break;
            case 3: //附件
                $exts_arr = array('rar', 'zip', 'doc', 'pdf');
                $path = './File/';
                break;
            case 4: //视频
                $exts_arr = array('mp4', 'avi', 'wmv', 'mov', 'flv', '3gp', 'navi', 'mkv');
                $path = './Video/';
                break;
        }
        $upload = new \Think\Upload();
        $upload->maxSize = $size;
        $upload->exts = $exts_arr;
        $upload->savePath = $path;
        $upload->autoSub = true;
        $info = $upload->upload();
        if (!$info) {
            // 上传错误提示错误信息
            $this->ajaxReturn(array('status' => 0));
        } else {
            // 上传成功 获取上传文件信息
            foreach ($info as $v) {
                $file = $v['savepath'] . $v['savename'];
                $name = $v['name'];
                $size = $v['size'];
            }
            $file = str_replace('./', __ROOT__ . '/Uploads/', $file);
            $this->ajaxReturn(array('status' => 1, 'file' => $file, 'name' => $name, 'size' => $size));
        }
        return $picture_url;
    }

}
