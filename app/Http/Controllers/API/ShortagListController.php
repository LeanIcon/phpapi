<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use App\Models\ShortageList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class ShortagListController extends ApiController
{
    public $shortageList;
    public function __construct(ShortageList $shortageList)
    {
        $this->middleware('auth:api');
        parent::__construct($shortageList);
        $this->shortageList = $shortageList;
    }


    public function loadShortageList(Request $request)
    {
        $user = Auth::user();
        $shortageList = $user->shortage;
        return response()->json($shortageList, 200);
    }

    public function createShortageList(Request $request)
    {
        $user = Auth::user();
        $shortageList = $this->shortageList::create([
            'user_id' => $user->id,
            'reference' => Str::uuid(),
            'reference_code' => null,
            'instance' => 'shortage_list',
            'content' =>  json_encode($request->shortageList)
        ]);

        return response()->json($shortageList, 200);
    }
}
