<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Society;
use App\Models\Spot;

class SpotController extends Controller
{
public function index(Request $request){
    $society = Society::where('login_tokens', $request->token)->first();
   $spot = Spot::where('regional_id', $society->regional_id)->get();

   return response()->json(compact('spot'), 200);
}
}
