<?php
namespace app\admin\controller;

use app\BaseController;
use think\facade\View;
use app\common\model\mysql\AdminUser;
class Login extends BaseController {


    // Login控制器index方法，默认找到\view\login\index.html
    public function index() {
        return View::fetch();
    }

    public function md5() {
        // admin admin
        halt(session(config("admin.session_admin")));
        // echo md5("admin_singwa_abc");

    }

    public function check() {

        if (!$this->request->isPost()) {
            return show(config("status.error"), "请求方式错误");
        }
        // 参数检验 1、原生方式 2、TP6 验证机制
        $username = $this->request->param("username", "", "trim");
        $password = $this->request->param("password", "", "trim");
        $captcha = $this->request->param("captcha", "", "trim");

        if (empty($username) || empty($password) || empty($captcha)) {
            return show(config("status.error"), "参数不能为空");
        }
        // 需要校验验证码
        if (!captcha_check($captcha)) {
            // 验证码校验失败
            return show(config("status.error"), "验证码不正确");
        }

        try {
            $adminUserObj = new AdminUser();
            $adminUser = $adminUserObj->getAdminUserByUsername($username);
            if (empty($adminUser) || $adminUser->status != config("status.mysql.table_normal")) {
                return show(config("status.error"), "不存在该用户");
            }
            $adminUser = $adminUser->toArray();

            // 判断密码是否正确
            if ($adminUser['password'] != md5($password . "_singwa_abc")) {
                return show(config("status.error"), "密码错误");
            }

            // 需要记录到mysql表中
            $updateData = [
                "last_login_time" => time(),
                "last_login_ip" => request()->ip(),
                "update_time" => time(),
            ];
            $adminUserObj->updateById($adminUser['id'], $updateData);
            if (empty($res)) return show(config("status.success", "登陆失败"));
        } catch(\Exception $e) {
            // todo 记录日志 $e->getMessage();
            return show(config("status.success"), "内部异常，登陆失败");
        }
        // 记录到session
        session(config("admin.session_admin"), $adminUser);

        return show(config("status.success"), "登陆成功");
    }
}