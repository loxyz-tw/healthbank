<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Clinic';
    protected $primaryKey = 'clinicNO';
    protected $guarded = ['clinicNO'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
