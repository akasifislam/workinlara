<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $table =  "employees";

    public static function getEmployee()
    {
        $records = DB::table('employees')->select('id', 'name', 'address')->get()->toArray();
        return $records;
    }
}
