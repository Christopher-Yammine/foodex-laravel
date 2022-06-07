<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Location;
use App\Models\RestaurantType;


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
    public function addResto(Request $request){
        $resto = new Restaurant;
        $resto->restaurant_name = $request->restaurant_name;
        $resto->restaurant_picture = $request->restaurant_picture;
        $resto->restaurant_description =$request->restaurant_description;
        $resto->restaurant_type = $request->restaurant_type;
        $resto->restaurant_number = $request->restaurant_number;
        $resto->location_id = $request->location_id;
        
        $resto->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
    public function getLocations(){
        $locations=Location::all();
        return response()->json([
            "Locations"=>$locations
        ],200);
        
    }
    public function getTypes(){
        $types=RestaurantType::all();
        return response()->json([
            "Types"=>$types
        ],200);
    }
    public function addLocation(Request $request){
        $locations = new Location;
        $locations->city_name = $request->city_name;
        $locations->street_name = $request->street_name;
     
        $locations->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
    public function addType(Request $request){
        $types = new RestaurantType;
        $types->type = $request->type;
     
        $types->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }

}

