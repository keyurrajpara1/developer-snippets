<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    protected $fillable = ['name'];

    // Inverse relationship in tag model
    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}