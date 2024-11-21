<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListStudent extends Model {
    protected $fillable = [
        "name",
        "class",
        "major",
        "birth_date",
        "profile_picture",
    ];
}
