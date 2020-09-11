<?php
namespace  app\common\model\mysql;

use think\Model;
class Demo extends Model {

    public function getStatusTextAttr($value, $data) {
        $status = [
            0 => '待审核',
            1 => '正常',
            99 => '删除',

        ];
        return $status[$data['status']];
    }

    public function getDemoDataByCategoryId($categoryId, $limit = 10) {
        if (empty($categoryId)) {
            return [];
        }
        return $this->where("category_id", $categoryId)
            ->limit($limit)
            ->order("id", "desc")
            ->select()
            ->toArray();
    }

}