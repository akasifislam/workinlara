<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    // public function scopeStatus($q)
    // {
    //     return $q->where('status', 1);
    // }


    // public function scopeAdmins($q)
    // {
    //     return $q->where('role', 'admin');
    // }
    // public function scopeStatusAdmins($q)
    // {
    //     return $q->where('status', 1)->where('role', 'admin');
    // }
    // public function scopeStatusUsers($q)
    // {
    //     return $q->where('status', 1)->where('role', 'user');
    // }
    // public function scopeStatusUsers($q)
    // {
    //     return $q->where('status', 0)->where('role', 'user');
    // }





    protected static function booted()
    {
        static::addGlobalScope('status', function (Builder $builder) {
            $builder->where('status', 1);
        });
        // static::addGlobalScope('role', function (Builder $builder) {
        //     $builder->where('role', 'user');
        // });
    }
}
