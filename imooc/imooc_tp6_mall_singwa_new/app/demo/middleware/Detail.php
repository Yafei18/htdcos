<?php

namespace app\demo\middleware;

class Detail {
    public function handle($request, \Closure $next) {
//        dump(1);
        $request->type = "detail";


        return $next($request);
    }

    /**
     * 中间件结束调度
     * @param \think\Response $response
     */
    public function end(\think\Response $response) {

    }
}