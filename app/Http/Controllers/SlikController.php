<?php

namespace App\Http\Controllers;

use App\Models\Slik;
use Illuminate\Http\Request;

class SlikController extends Controller
{
    public function index() {
        $sliks = Slik::all();
        return response()->json([
            "sliks" => $sliks
        ], 200);
    }

    public function store(Request $request)
    {
        $slik = Slik::create(
            $request->toArray()
        );
        if(!is_null($slik)) {
            $msg = 'slik is created';
        }else {
            $msg = 'could not create slik';
        }
        return response()->json(
            [
                "msg" => $msg,
                "slik" => $slik
            ], 200);
    }

    public function complete(Request $request)
    {
        $slik = Slik::whereId($request->id)->first();
        if(!is_null($slik)){
            $slik->completed = !$slik->completed;
            $slik->save();
        }
        $slik_changed = Slik::whereId($request->id)->first();
        return response()->json(
            $slik_changed, 200
        );
    }

    public function delete(Request $request)
    {
        $message = 'slik not found';
        $slik = Slik::whereId($request->id)->first();
        if(!is_null($slik)){
            $slik->delete();
            $message = 'slik deleted successfully';
        }
        return response()->json(
            $message, 200
        );
    }
}
