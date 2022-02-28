<?php


namespace App\Repo\Store;


use App\Model\StoreMenu;

class StoreMenuRepo
{
    public function list()
    {
        return StoreMenu::all();
    }
}