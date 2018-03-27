<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
//	protected function _model(){
//        return new \Think\Model();
//    }
	
    public function index()
    {
        $title ="测试首页";
       $this->assign('title',$title);
        $this->display();
    }
	
 
	//当前管理员修改资料,2017-05-15
	 public function updPasswd()
	 {
        if(IS_POST) {
			$data = I('post.');
			$email = I('post.email');
            if (is_email($email) == false) {
                $this->error('邮箱格式不正确');
            }
			$id = session('admin_auth.adminid');
			if($_POST['password_o'] != ''){
				$password_n = I('post.password_n');
				if (is_password($password_n) == false) {
					$this->error('密码必须在6-18个字符之间');
				}
				$r = M('admin')->where(array('id' => $id))->find();
				if($r['password'] != md5(md5(trim($data['password_o'])).$r['encrypt'])){
					$this->error('原密码错误');
				}
				if($data['password_n'] == $data['password_o']){
					$this->error('新密码与旧密码一致');
				}
				if($data['password_n'] != $data['password_r']){
					$this->error('新密码与重复密码不一致');
				}
				$encrypt = create_randomstr();
				$password=md5(md5(trim($data['password_n'])).$encrypt);
				M('admin')->where(array('id' => $id))->save(array('password' => $password ,'encrypt' => $encrypt,'email' => $email));
				session('admin_auth', null);
				$this->success('密码修改成功','Login/index');
			}else{
				M('admin')->where(array('id' => $id))->save(array('email' => $email));
				$this->success('资料修改成功');
			}	
 		}
    }
	
}