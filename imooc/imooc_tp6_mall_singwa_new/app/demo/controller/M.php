<?php


namespace app\demo\controller;

use app\BaseController;
use app\common\business\Demo;

class M extends BaseController {
    public function index() {
        $categoryId = $this->request->param("category_id", 0, "intval");
        if (empty($categoryId)) {
            return show(config("status.error"), "参数错误");
        }
//        halt($results); // dump();exit;
//        if (empty($results->toArray())) { // $result是对象，对象里面的数据是空的。
//            return show(config("status.success"), "数据为空");
//        }
        $demo = new Demo();
        $results = $demo -> getDemoDataByCategoryId($categoryId);
        return show(config("status.success"), "ok", $results);
    }
}