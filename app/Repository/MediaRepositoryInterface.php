<?php

namespace App\Repository;

interface MediaRepositoryInterface {
    public function addStandardImages($idCategory, $files, $name_file , $id_name);  
}

