<?php

namespace App\Http\Controllers\Web;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;

class UserDetailsController extends Controller
{

    public function __construct(UserDetails $userDetails)
    {
        $this->userDetails = $userDetails;
    }
    public function updateUserDetails(Request $request, $user = null)
    {
        $request['users_id'] = $user;

        $data = $request->except('_token');

        if ($request->has('profile_image')) {
            $img = $this->uploadImage($request);
            $request['image_url'] =  $img['image_url'];
        }
        // $userDetails = $this->userDetails::updateOrCreate($data);
        $userDetails = $this->userDetails::where('users_id', $user)->first();

        if(!is_null($userDetails))
        {
            $userDetails->update($request->all());
        }else{
            $this->userDetails::create($request->all());
        }
    
        return back();
    }

    public function uploadProductImages(Request $request)
    {

            $image = $request->file('profile_image');
            $name = time()."_".$request->file('profile_image')->getClientOriginalName();
            $image_name = $request->file('profile_image')->getRealPath();

            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

            // $product_gal = new AutoGallery();
            // $product_gal->image_name = $name;
            // $product_gal->image_url = $image_url;
            // $product_gal->save();

            $uploaded = $image->move(\public_path("categories"), $name);
            // $this->saveImages($request, $image_url);
            return [
                        'status' => 200,
                        'response' => 'Image Uploaded Successfully',
                        'image_url' => $image_url,
                        'image_path' => "public\uploads",
                        'name' => $name
                    ];

    }

    public function uploadImage(Request $request)
    {
            $image = $request->file('profile_image');
            $name = time()."_".$request->file('profile_image')->getClientOriginalName();
            $image_name = $request->file('profile_image')->getRealPath();

            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

            $uploaded = $image->move(\public_path("uploads"), $name);

            return [
                'status' => 200,
                'response' => 'Image Uploaded Successfully',
                'image_url' => $image_url,
                'image_path' => "public\uploads",
                'name' => $name
            ];
    }


}
