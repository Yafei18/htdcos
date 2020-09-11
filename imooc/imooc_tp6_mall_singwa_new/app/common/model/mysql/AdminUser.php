<?php

namespace app\common\model\mysql;

use think\Model;

class AdminUser extends Model {
    /**
     * 根据用户名获得后端表的数据
     * @param $username
     * @return array|bool|Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getAdminUserByUsername($username) {
        if (empty($username)) return false;
        return $this->where(["username" => trim($username)])->find();
    }

    /**
     * 根据主键ID更新数据表中的数据
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateById($id, $data) {
        $id = intval($id);
        if (empty($id) || empty($data) || !is_array($data)) return false;
        return $this->where(["id" => $id])->save($data);
    }


}