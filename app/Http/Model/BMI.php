<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'BMI';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
