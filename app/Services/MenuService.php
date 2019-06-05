<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getMenuWithCategory($resto_id)
    { 
        $categories = Menu::where('resto_id', $resto_id)
        ->get()
        ->groupBy('category.name');
        return $categories;

    }
}