<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function relationWithTags()
    {
        return $this->belongsToMany(Tag::class, "post_tags", "post_id", "tag_id")->withTimestamps();
    }
    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'post_parent_category', 'id');
    }
    public function subcategoryRelation()
    {
        return $this->belongsTo(SubCategory::class, 'post_sub_category', 'id');
    }
    public function writerRelation()
    {
        return $this->belongsTo(User::class, 'writer', 'id');
    }
}
