<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $guarded =[];


    /**
         * Get all of the comments for the post
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        /**
         * Get the auther that owns the post
         *
         */
        public function auther()
        {
            return $this->belongsTo(User::class);
        }
        /**
         * Get the category that owns the post
         *

         */
        public function category()
        {
            return $this->belongsTo(category::class);
        }
}
