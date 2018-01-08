<?php namespace Huifang\Src\Msg\Infra\Repository;

use Carbon\Carbon;
use App\Foundation\Domain\Repository;
use App\Src\Msg\Domain\Interfaces\UserMsgInterface;
use App\Src\Msg\Domain\Model\MsgStatus;
use App\Src\Msg\Domain\Model\UserMsgEntity;
use App\Src\Msg\Infra\Eloquent\BroadcastMsgModel;
use App\Src\Msg\Infra\Eloquent\MsgExtModel;
use App\Src\Msg\Infra\Eloquent\UserMsgModel;
use App\Src\Role\Infra\Eloquent\UserModel;


class UserMsgRepository extends Repository implements UserMsgInterface
{
    /**
     * Store an entity into persistence.
     *
     * @param UserMsgEntity $user_msg_entity
     */
    protected function store($user_msg_entity)
    {
        if ($user_msg_entity->isStored()) {
            $model = UserMsgModel::find($user_msg_entity->id);
        } else {
            $model = new UserMsgModel();
        }

        $model->fill(
            [
                'msg_id'   => $user_msg_entity->msg_id,
                'from_uid' => $user_msg_entity->from_uid,
                'to_uid'   => $user_msg_entity->to_uid,
                'msg_type' => $user_msg_entity->msg_type,
                'status'   => $user_msg_entity->status,
                'read_at'  => $user_msg_entity->read_at,
            ]
        );
        $model->save();
        $user_msg_entity->setIdentity($model->id);
    }

    /**
     * Reconstitute an entity from persistence.
     *
     * @param mixed $id
     * @param array $params Additional params.
     *
     * @return UserMsgModel
     */
    protected function reconstitute($id, $params = [])
    {
        $model = UserMsgModel::find($id);
        if (!isset($model)) {
            return null;
        }
        return $this->reconstituteFromModel($model);
    }

    /**
     * @param UserMsgModel $model
     *
     * @return UserMsgEntity
     */
    private function reconstituteFromModel($model)
    {
        $entity = new UserMsgEntity();
        $entity->id = $model->id;

        $entity->msg_id = $model->msg_id;
        $entity->from_uid = $model->from_uid;
        $entity->to_uid = $model->to_uid;
        $entity->msg_type = $model->msg_type;
        $entity->read_at = $model->read_at;
        $entity->status = $model->status;
        $msg_ext_model = $model->msg_ext;
        if (isset($msg_ext_model)) {
            $entity->content = $msg_ext_model->content;
        }
        $entity->created_at = $model->created_at;
        $entity->updated_at = $model->updated_at;
        $entity->setIdentity($model->id);
        $entity->stored();
        return $entity;
    }


    /**
     * 得到唯独消息数量
     * @param int       $user_id
     * @param int|array $msg_type
     * @param int|array $status
     * @return mixed
     */
    public function getMsgCount($user_id, $msg_type, $status)
    {
        $builder = UserMsgModel::query();
        $builder->where('to_uid', $user_id);
        if ($msg_type) {
            $builder->whereIn('msg_type', (array)$msg_type);
        }
        if ($status) {
            $builder->whereIn('status', (array)$status);
        }
        return $builder->count();
    }


    /**
     * @param  int $to_uid
     * @param  int $type
     * @return mixed
     */
    public function getMessagesByToUidAndType($to_uid, $type)
    {
        $collect = collect();
        $builder = UserMsgModel::query();
        if ($to_uid) {
            $builder->where('to_uid', $to_uid);
        }
        if ($type) {
            $builder->where('msg_type', $type);
        }
        $builder->orderBy('id', 'desc');
        $models = $builder->get();
        /** @var UserMsgModel $model */
        foreach ($models as $model) {
            $collect[] = $this->reconstituteFromModel($model);
        }
        return $collect;
    }

}