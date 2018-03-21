<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Banner extends Model
{
    protected $fillable = ["nome","descricao","banner"];

    public function getCreatedAtAttribute($date){

        return Carbon::parse($date)->format('d-m-Y');

    }

}
