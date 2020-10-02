<?php

namespace App;

use App\Models\Post;
use App\Models\Product;
use App\Models\Location;
use App\Models\AppSettings;
use App\Models\CommonModel;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use App\Models\ShortageList;
use App\Models\PurchaseOrders;
use App\Models\CommonFunctions;
use App\Models\ProductCategory;
use App\Models\WholesalerProduct;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject, CommonModel
{
    use HasRoles,
        Notifiable,
        CommonFunctions {
            buildSearchParams as protected buildParams;
        }

    CONST IS_ADMIN = 'admin';
    CONST IS_WHOLESALER = 'wholesaler';
    CONST IS_RETAILER = 'retailer';
    CONST IS_APPROVE = 'approve';
    CONST IS_CANCEL = 'cancel';
    CONST SENDER_ID = 'NNURO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'lastname', 'phone', 'type', 'slug','username', 'otp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'roles'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $appends = [
        'product_category'
    ];

    protected $with = ['details'];

    /**
     * Undocumented function
     *
     * @return void
     */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = $this->firstname.' '.$this->lastname;
    // }

    public static function activeUserAccess($user): bool
    {
        if($user->type == self::IS_WHOLESALER)
        {
            $role = Role::findByName('Wholesaler');
            $user->assignRole([$role->id]);
            return true;
        }

        if($user->type == self::IS_RETAILER)
        {
            $role = Role::findByName('Retailer');
            $user->assignRole([$role->id]);
            return true;
        }
    }


    public function scopeIsWholeSaler($query, $wholesalerId = null)
    {
        return $query->where('type', 'wholesaler');
    }

    public function scopeIsRetailer($query)
    {
        return $query->where('type', 'retailer');
    }


    public function orderUsers($data)
    {
        $data = self::whereIn('id', $data)->get();
        return $data;
    }


    public function wholesaler_products()
    {
        return $this->hasMany(WholesalerProduct::class, 'wholesaler_id');
    }

    public function shortage()
    {
        return $this->hasMany(ShortageList::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(WholesalerProduct::class, 'wholesaler_id');
    }

    public function wholesaler_proforma()
    {
        return $this->hasMany(PurchaseOrders::class, 'wholesaler_id')->where('order_type', 'proforma');
    }

    public function wholesaler_orders()
    {
        return $this->hasMany(PurchaseOrders::class, 'wholesaler_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'wholesaler_products', 'wholesaler_id')->withPivot('price');
    }

    public function retailer_orders()
    {
        return $this->hasMany(PurchaseOrders::class, 'retailer_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, "author_id");
    }


    public function app_settings()
    {
        return $this->hasOne(AppSettings::class);
    }


    public function loginUserName($data)
    {
        $location = new Location();
        $name  = Str::slug($data->username);
        $uname = $name.'-'.$location->getLocationName($data->location);
        return $uname;
    }


    public function getRouteKeyName()
    {
        return "slug";
    }


    public function product_category()
    {
        $prod_ids = collect($this->wholesaler_products)->pluck('product_id');
        $productCatIds = Product::whereIn('id', $prod_ids)->pluck('product_category_id');
        $prod_ids = $this->returnProductCats($productCatIds);
        return $prod_ids;
    }

    public function returnProductCats($ids = [])
    {
        $cats = ProductCategory::whereIn('id', $ids)->get('name');
        return $cats->implode('name', ', ');
    }

    public function details()
    {
        return $this->hasOne(UserDetails::class,'user_id');
    }

    public function getProductCategoryAttribute()
    {
        return;
    }

    public static function generatePin()
    {
        // genrate based on time
        // substr(number_format(time() * rand(),0,'',''),0,6);
        // generate random
        $pin = random_int(10000, 99999);
        return $pin;
    }

     // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
