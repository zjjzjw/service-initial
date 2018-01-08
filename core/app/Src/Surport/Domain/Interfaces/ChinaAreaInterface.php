<?php namespace App\Src\Surport\Domain\Interfaces;

use App\Foundation\Domain\Interfaces\Repository;

interface ChinaAreaInterface extends Repository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function all();

}