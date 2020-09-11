<?php
namespace app\common\business;

use app\common\model\mysql\Demo as DemoModel;
class Demo {
    /**
     * business层通过getDemoDataByCategoryId来获取数据（business <-> model）
     * @param $categoryId
     * @param int $limit
     * @return array
     */
    public function getDemoDataByCategoryId($categoryId, $limit = 10) {
        $model = new DemoModel();
        $results = $model->getDemoDataByCategoryId($categoryId, $limit);
        if (empty($results)) return [];
        $categories = config("category");
        foreach ($results as $key => $result) {
            $results[$key]["categoryName"] = $categories[$result["category_id"]] ?? "其他";
        }
        return $results;
    }

}