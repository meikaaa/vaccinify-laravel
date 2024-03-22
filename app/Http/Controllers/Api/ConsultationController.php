<?php

namespace App\Http\Controllers\Api;

use App\Models\Consultation;
use App\Models\Society;
use App\Models\Spot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request){
        $society = Society::where('login_tokens', $request->token)->first();
        $consultation = Consultation::where('societies_id', $society->id)->first();

        return response()->json(compact('consultation'), 200);
    }
    public function store(Request $request){
        $society = Society::where('login_tokens', $request->token)->first();

        if(!$society){
            return response()->json([
                'message' => 'SOCIETY NOT FOUND'
            ]);
        }
        Consultation::create([
            'societies_id' => $society->id,
            'regional_id' => $society->regional_id,
            'current_symptoms' => $request->current_symptoms,
            'disease_history' => $request->disease_history,
            'notes' => $request->notes,
        ]);
        return response()->json([
            'message' => 'REQUEST CONSULTATIONS SUCCESS'
        ]);
        
    }
}
