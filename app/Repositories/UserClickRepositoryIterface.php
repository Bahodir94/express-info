<?php


namespace App\Repositories;


interface UserClickRepositoryIterface
{
    /**
     * Save a user click
     *
     * @param array $clickData
     * @return void
    */
    public function create($clickData);
}
