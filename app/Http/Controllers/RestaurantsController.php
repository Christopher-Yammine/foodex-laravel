<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller{

    public function getAllRestos(){
        $restos=Restaurant::join('restaurant_types','restaurant_types.id_restaurant_type','=','restaurants.restaurant_type')
        ->join('locations','locations.id_location','=','restaurants.location_id')
        ->get('restaurants.*','restaurant_types.type','locations.city_name');
        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);
    }
    
}

