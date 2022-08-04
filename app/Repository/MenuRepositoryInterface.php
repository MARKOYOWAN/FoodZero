<?php
namespace App\Repository;


interface MenuRepositoryInterface
{
   public function createMenu($data);
   public function updateMenu($id , $data);
   public function allMenu();  
}