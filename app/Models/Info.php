<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Info extends Model
{
    use HasFactory;


    protected $guarded = ['id'];



    // define accessors
    public function getTitleAttribute($value)
    {
        return Str::title($value);
    }

    //dedine mutators
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 85;
    }
}
