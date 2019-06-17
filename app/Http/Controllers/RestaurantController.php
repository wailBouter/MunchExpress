<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function store (Request $request){

        $postData = $this->validate($request, [
            'name' => 'required|min:3',
            'location' => 'required|min:3',
            'tables' => 'required|integer',

        ]);

        $restos = Auth::user()->restaurants()->create($postData);
        
        return response()->json($restos, 201);

    }
}
