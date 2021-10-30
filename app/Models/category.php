<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded =[];

    /**
     * Get all of the posts for the category
     *
    */
    public function posts()
    {
        return $this->hasMany(post::class);
    }

}
