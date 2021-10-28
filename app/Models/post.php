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
        public function comments(): HasMany
        {
            return $this->hasMany(Comment::class);
        }

        /**
         * Get the auther that owns the post
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function auther(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
        /**
         * Get the category that owns the post
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function category(): BelongsTo
        {
            return $this->belongsTo(category::class);
        }
}
