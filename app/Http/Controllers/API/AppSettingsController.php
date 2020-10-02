<?php

namespace App\Http\Controllers\API;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Validator;

class AppSettingsController extends ApiController
{
    public $appSettings;
    public function __construct(AppSettings $appSettings)
    {
        $this->appSettings = $appSettings;
        $this->middleware('auth:api');
    }


    public function getAppSettings(Request $request)
    {
        $user = Auth::user();
        $settings =  $user->app_settings;
        return \response()->json($settings);
    }

    public function saveAppSettings(Request $request)
    {
        $user = Auth::user();

        $request['user_id'] = $user->id;

        $check4User = $this->appSettings::where('user_id', $user->id)->first();

        if ($check4User->user_id) {
            $update = $this->updateAppSettings($request, $check4User->id);
            return \response()->json($update);
        }

        $validator = Validator::make($request->all(),[
            'user_id' => 'required|exists:users,id|unique:app_settings,user_id,except,id'
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $settings =  \json_encode($request->settings);

        $appSettings = $this->appSettings::create([
            'user_id' => $user->id,
            'settings' => $settings
        ]);

        return $appSettings;
    }


    public function updateAppSettings(Request $request, $id = null)
    {

        $settings =  \json_encode($request->settings);
        $updated = $this->appSettings::find($id)->update(['settings' => $settings]);
        return $updated;

    }
}
