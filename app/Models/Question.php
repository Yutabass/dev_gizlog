<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\SearchingScope;

class Question extends Model
{
    use SoftDeletes, SearchingScope;
    
    protected $fillable = [
        'user_id',
        'tag_category_id',
        'title',
        'content',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tagCategory()
    {
        return $this->belongsTo(TagCategory::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function searchFromFormAndCategoey($search_tag_id, $search_word)
    {
        return $this->filterLike('title', $search_word)
                    ->filterEqual('tag_category_id', $search_tag_id)
                    ->latest()
                    ->get();
    }

}

