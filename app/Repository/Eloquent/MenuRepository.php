<?php

namespace App\Repository\Eloquent;

 
use App\Models\Menu;
use App\Repository\MenuRepositoryInterface;
use DB;

class MenuRepository   implements MenuRepositoryInterface
{
 
    public function createMenu($data)
    {
        return Menu::create($data);
    }

    public function updateMenu($id , $data) {
    
    }
}
