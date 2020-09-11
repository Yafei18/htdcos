<?php

use think\facade\Route;

// http://127.0.0.1:8082/demo/test

Route::rule("test", "index/hello", "GET");

Route::rule("detail", "detail/index", "GET")->middleware(\app\demo\middleware\Detail::class);