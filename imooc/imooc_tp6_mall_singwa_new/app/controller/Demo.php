<?php
namespace app\controller;

use app\BaseController;

class Demo extends BaseController{

    public function show() {

        $result = [
            "status" => 1,
            "message" => "OK",
            "result" => [
                'id' => 1,
            ],
        ];

        $header = [
            "Token" => "e23gdt55",
        ];

        return json($result, 201, $header);


    }
    public function request() {
        dump($this->request->param("abc", 1, "intval"));

    }
}