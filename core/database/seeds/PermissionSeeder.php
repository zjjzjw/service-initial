<?php

use Illuminate\Database\Seeder;
use App\Src\Role\Infra\Eloquent\PermissionModel;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = $this->getData();
        foreach ($items as $item) {
            $permission_model = PermissionModel::find($item['id']);
            if (!isset($permission_model)) {
                $permission_model = new PermissionModel();
                $permission_model->id = $item['id'];
            }
            $permission_model->name = $item['name'];
            $permission_model->code = $item['code'];
            $permission_model->save();
        }
    }

    private function getData()
    {
        return [
            [
                'id'   => 1,
                'name' => '用户管理',
                'code' => '1001',
            ],
            [
                'id'   => 2,
                'name' => '角色管理',
                'code' => '1002',
            ],
        ];
    }
}
