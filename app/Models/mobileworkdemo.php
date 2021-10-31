<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobileworkdemo extends Model
{
    use HasFactory;
    protected $gruarded = [];
    protected $fillable=[
        "title",
        "description",
        "content",
        "status",
    ];
}
