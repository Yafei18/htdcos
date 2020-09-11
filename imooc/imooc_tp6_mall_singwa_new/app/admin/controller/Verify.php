<?php
 namespace app\admin\controller;

 use think\captcha\facade\Captcha;

 class Verify {
     // 127.0.0.1:8082/admin/verify/index
     public function index() {
         return Captcha::create("abc");
     }
 }