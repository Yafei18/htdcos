<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;
use app\model\Demo;
class Data extends BaseController {
    public function index() {

        //通过容器的方式来获取
//        $result = app("db") -> table("mall_demo") -> where("id", 2) -> find();
        $result = Db::table("mall_demo")
            // ->order("id", "desc")
            // ->limit(2, 2) //分页的逻辑
            // -> page(2, 1)
            // ->where("id", ">", 2)
            // where(["id" => 2])
            // ->where("category_id", 3)
            ->where([
                ["id", ">", 2],
                ["category_id", "=", 3]
            ])
            ->select();
        dump($result);
    }

    public function abc() {
        // 第一种输出sql的方式
//        $result = Db::table("mall_demo")->where("id", 10)->fetchSql() -> find();
        // 第二种输出sql的方式
        $result = Db::table("mall_demo")->where("id", 10) -> find();
        echo Db::getLastSql();exit;
        dump($result);
    }

    public function demo() {
        $data = [
            "title" => "yafei08",
            "content" => "yafeiyafei08",
            "category_id" => 2,
            "status" => 1,
        ];
        // 新增逻辑
//        $result = Db::table("mall_demo")->insert($data);

        // 删除操作
//        $result = Db::table("mall_demo")->where("id", 1)->delete();
        // 更新操作
        $result = Db::table("mall_demo")->where("id", 2)->update(["title" => "0000000"]);
        echo Db::getLastSql();
        dump($result);
    }

    public function model1() {
        $result = Demo::find(2);
        dump($result->toArray());
    }

    public function model2() {
        $modelObj = new Demo();
        $results = $modelObj->where("category_id", 3)
            ->limit(2)
            ->order("id", "desc")
            ->select();
        foreach ($results as $result) {
//            dump($result->content);
            dump($result['content']);
            dump($result->status_text);
        }
    }














}