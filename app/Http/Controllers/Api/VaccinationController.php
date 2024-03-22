<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Society;
use App\Models\Spot;
use App\Models\Consultation;
use App\Models\Vaccination;

class VaccinationController extends Controller
{
    public function index(Request $request){
        $society = Society::where('login_tokens', $request->token)->first();
        $vaccination = Vaccination::where('societies_id', $society->id)->with('spot')->first();
      
        return response()->json(compact('vaccination'), 200);
    }
    public function store(Request $request){
        $society = Society::where('login_tokens', $request->token)->first();
        $consultation = Consultation::where('societies_id', $society->id)->first();
      
        if(!$society){
            return response()->json([
                'message' => 'SOCIETY NOT FOUND'
            ]);
        }
        if($consultation->status !='accepted'){
            return response()->json([
                'message' => 'YOUR CONSULTATION MUST BE ACCEPTED'
            ]);
        }

        Vaccination::create([
            'societies_id' => $society->id,
            'regional_id' => $society->regional_id,
            'spot_id' => $request->spot_id,
            'dose' => $request->dose,
            'place' => $request->place,
        ]);
        return response()->json([
            'message' => 'VACCINATION SUCCESS'
        ]);
        
    }
}
