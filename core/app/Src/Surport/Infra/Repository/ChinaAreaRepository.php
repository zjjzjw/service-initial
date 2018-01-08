<?php namespace App\Src\Surport\Infra\Repository;

use App\Foundation\Domain\Repository;
use App\Src\Surport\Domain\Interfaces\ChinaAreaInterface;
use App\Src\Surport\Domain\Model\ChinaAreaEntity;
use App\Src\Surport\Infra\Eloquent\ChinaAreaModel;


class ChinaAreaRepository extends Repository implements ChinaAreaInterface
{
    /**
     * Store an entity into persistence.
     *
     * @param ChinaAreaEntity $area_entity
     */
    protected function store($city_entity)
    {
        if ($city_entity->stored()) {
            $model = ChinaAreaModel::find($city_entity->id);
        } else {
            $model = new ChinaAreaModel();
        }
        $model->fill(
            [
                'name' => $city_entity->name,
            ]
        );
        $model->save();
        $city_entity->setIdentity($model->id);
    }

    /**
     * Reconstitute an entity from persistence.
     *
     * @param mixed $id
     * @param array $params Additional params.
     *
     * @return ChinaAreaEntity
     */
    protected function reconstitute($id, $params = [])
    {
        $model = ChinaAreaModel::find($id);
        if (!isset($model)) {
            return null;
        }
        return $this->reconstituteFromModel($model);
    }

    /**
     * @param ChinaAreaModel $model
     *
     * @return ChinaAreaEntity
     */
    private function reconstituteFromModel($model)
    {
        $entity = new ChinaAreaEntity();
        $entity->id = $model->id;
        $entity->name = $model->name;

        $entity->setIdentity($model->id);
        $entity->stored();
        return $entity;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        $collection = collect();
        $builder = ChinaAreaModel::query();
        $models = $builder->get();
        /** @var ChinaAreaModel $model */
        foreach ($models as $model) {
            $collection[] = $this->reconstituteFromModel($model);
        }
        return $collection;
    }

}