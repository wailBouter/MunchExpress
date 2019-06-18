<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = [];

    protected $appends = ['slug'];

    public function getSlugAttribute()
    {
        return route('restos.menu', $this->id);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
