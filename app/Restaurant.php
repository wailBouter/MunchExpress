<?php

namespace App;

use App\User;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = [];

    protected $appends = ['slug', 'ordersSlug'];

    public function getSlugAttribute()
    {
        return route('restos.menu', $this->id);
    }

    public function getOrdersSlugAttribute()
    {
        return route('restos.orders', $this->id);
    }

    public function orders ()
    {
        return $this->hasMany(Order::class, 'resto_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
