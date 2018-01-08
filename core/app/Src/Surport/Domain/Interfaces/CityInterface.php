<?php namespace App\Src\Surport\Domain\Interfaces;

use App\Foundation\Domain\Interfaces\Repository;

interface CityInterface extends Repository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function all();

}