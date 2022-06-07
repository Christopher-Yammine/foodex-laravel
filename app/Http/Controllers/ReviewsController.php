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
   
}
