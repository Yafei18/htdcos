<?php
namespace app\controller;

use app\Request;
use think\facade\Request as Abc;

class Learn {
    public function index(Request $request) {
        dump($request->param("abc")); // 2

        dump(input("abc")); // 3

        dump(request()->param("abc")); // 4

        // dump(Request::param("abc"));
        dump(Abc::param("abc")); // 5

        $request->isPost();
        $request->isAjax();
        $request->isGet();
    }
}