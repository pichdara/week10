<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'title', 'posted_by', 'category_id', 'author', 'content'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo("App\Models\Category", "category_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "posted_by", "id");
    }
}
