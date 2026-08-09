<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
class UsersController2 extends Controller
{
    public function __construct(){
    }
    public function createTag(Request $request){
        Tag::create([
            'name' => 'Laravel'
        ]);
        Tag::create([
            'name' => 'PHP'
        ]);
        Tag::create([
            'name' => 'JavaScript'
        ]);
        Tag::create([
            'name' => 'ReactJS'
        ]);
        exit;
    }
    public function attachTagToPost(Request $request){
        // $tag = Tag::first();
        // $post = Post::first();
        // $post->tags()->attach($tag);

        // $post = Post::with('tags')->first()->toArray();
        // echo "<pre>";
        // print_r($post);
        // exit;

        // Attach multiple tags
        // $post = Post::with('tags')->first();
        // $post->tags()->attach([2, 3, 4]);
        // $post->tags()->attach([1 => ['status' => 'active'], 2 => ['status' => 'inactive']]); // Adding Pivot Table Columns

        // $post = Post::with('tags')->first()->toArray();
        // echo "<pre>";
        // print_r($post);
        // exit;
    }
    public function displayPost(){
        $posts = Post::with(['user', 'tags'])->get();
        // echo "<pre>";
        // print_r($posts->toArray());
        // exit;
        foreach ($posts as $key => $value) {
            echo "<h1>".$value->title."</h1>";
            echo "<p>".$value->user->name."</p>";
            echo "<ul>";
            foreach ($value->tags as $key1 => $value1) {
                echo "<li>".$value1->name." (".$value1->pivot->created_at.")</li>";
            }
            echo "</ul>";
        }
        exit;
    }
    public function detachTagFromPost(){
        $post = Post::with('tags')->first();
        $post->tags()->detach([2]);

        // [1] For Update Tags
        // $post->tags()->detach(); // Removes all tags
        // $post->tags()->attach([2, 3, 4]); // Attach new tags

        // [2] For Update Tags
        // $post->tags()->sync([1, 4]); // Attach new tags
    }
    public function getTags(){
        // $tags = Tag::get();
        // echo "<pre>";
        // print_r($tags);
        // exit;

        $tags = Tag::with('posts')->get();
        // $tags = Tag::with('posts')->get()->toArray();
        // echo "<pre>";
        // print_r($tags);
        // exit;
        foreach ($tags as $key => $value) {
            echo "<h1>".$value->name."</h1>";
            echo "<ul>";
            foreach ($value->posts as $key1 => $value1) {
                echo "<li>".$value1->title."</li>";
            }
            echo "</ul>";
        }
        exit;
    }
}
?>