<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];

    function category() {
        return $this->belongsTo(Category::class);
    }
}
