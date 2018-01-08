<?php

use Illuminate\Database\Seeder;
use App\Src\Role\Infra\Eloquent\UserModel;

class UserSeeder extends Seeder
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
            $user_model = UserModel::find($item['id']);
            if (!isset($user_model)) {
                $user_model = new UserModel();
                $user_model->id = $item['id'];
            }
            $user_model->account = $item['account'];
            $user_model->company_id = $item['company_id'];
            $user_model->company_name = $item['company_name'];
            $user_model->employee_id = $item['employee_id'];
            $user_model->position = $item['position'];
            $user_model->name = $item['name'];
            $user_model->email = $item['email'];
            $user_model->phone = $item['phone'];
            $user_model->password = $item['password'];
            $user_model->status = $item['status'];
            $user_model->type = $item['type'];
            $user_model->created_user_id = $item['created_user_id'];
            $user_model->save();
        }
    }

    private function getData()
    {
        return [
            [
                'id'              => 1,
                'account'         => '孙红玉',
                'company_id'      => 1,
                'company_name'    => '上海绘房信息科技有限公司',
                'employee_id'     => '',
                'position'        => '高级工程师',
                'name'            => '孙红玉',
                'email'           => 'hongyu.sun@fq960.com',
                'phone'           => '13816958237',
                'password'        => '5f1d7a84db00d2fce00b31a7fc73224f',
                'status'          => 1,
                'type'            => 1,
                'created_user_id' => 1,
            ],
        ];
    }
}