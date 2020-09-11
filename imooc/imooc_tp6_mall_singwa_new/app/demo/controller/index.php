<?php

namespace app\demo\controller;

use app\BaseController;

class Index extends BaseController {
    public function abc() {
        return 123456;
    }

    public function hello() {
        return time();
    }

}