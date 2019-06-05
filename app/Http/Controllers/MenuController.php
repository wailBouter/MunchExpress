<?php

namespace App\Http\Controllers;

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
        

        return $request->all();
    }
}
