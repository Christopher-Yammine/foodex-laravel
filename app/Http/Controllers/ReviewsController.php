<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
   public function addReview(Request $request){
    
        $review = new Review;
        $review->user_id = $request->user_id;
        $review->id_restaurant = $request->id_restaurant;
        $review->rev_status = 0;
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;
        $review->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
    public function getUnaccepted(){
        $review =Review::join('users','users.id_user','=','reviews.user_id')
        ->join('restaurants','restaurants.id_restaurant','=','reviews.id_restaurant')
        ->where('reviews.rev_status',0)
        ->get(['reviews.*','users.name','restaurants.restaurant_name','restaurants.restaurant_number']);
        return response()->json([
            "status"=>"Success",
            "reviews"=>$review
        ],200);
        

    }
    public function acceptReview(Request $request){
        $review=Review::where('id_review',$request->id_review)->update(['rev_status'=>1]);
        return response()->json([
            "status"=>"Success"
        ],200);

    }
    public function getAccepted(){
        $review =Review::join('users','users.id_user','=','reviews.user_id')
        ->join('restaurants','restaurants.id_restaurant','=','reviews.id_restaurant')
        ->where('reviews.rev_status',1)
        ->get(['reviews.*','users.name','restaurants.restaurant_name','restaurants.restaurant_number']);
        return response()->json([
            "status"=>"Success",
            "reviews"=>$review
        ],200);
    
   
    }
}
