<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $fillable = ['user_id', 'title'];
    public function user(){
        // return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault([
            'name' => 'Guest User'
        ]);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')
            ->withTimestamps() // Retrieving Pivot Table Columns
            ->withPivot('status'); // Retrieving Pivot Table Columns
        /*  Second parameter: Name of intermediate table / Name of pivot table
            Third parameter:  Relation column name - foreign key of parent model
            Fourth parameter: Relation column name - 
        */
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function comment(){
        return $this->morphOne(Comment::class, 'commentable')->latest();
    }
}