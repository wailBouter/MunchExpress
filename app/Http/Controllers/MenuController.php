<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Rules\RestoCategoryValidate;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request) 
    {
        $postData = $this->validate($request, [
            'restoId' => 'required|numeric',
            'item' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => ['required', new RestoCategoryValidate(request('restoId'))],
        ]);
        
        $categorie = Category::where('resto_id', $postData['restoId'])->where('name', $postData['category'])->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'resto_id' => $postData['restoId'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'category_id' => $categorie->id,
        ]);

        return response()->json($menu, 201);
    }
}
