<?php


namespace app\demo\exception;

use think\exception\Handle;
use think\Response;
use Throwable;

class  Http extends handle {
    public $httpStatus = 500;

    public function render($request, Throwable $e) : Response {
//        dump($e->getStatusCode());
        if (method_exists($e, "getStatusCode")) {
            $httpStatus = $e->getStatusCode();
        } else {
            $httpStatus = $this ->httpStatus;
        }
        return show(config("status.error"), $e->getMessage(), [], $httpStatus);
    }
}