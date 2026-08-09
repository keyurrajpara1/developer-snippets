<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{User, Post, Tag, Project, Task, Video, Comment};
use Illuminate\Support\Facades\Hash;
class UsersController4 extends Controller
{
    public function __construct(){
    }
    public function function_1(){
        /* $user = User::create([
            'name' => 'Felipa Beahan',
            // 'name' => 'Halie Dietrich',
            // 'name' => 'Lynne Quigley',
            'email' => 'felipa_beahan@yopmail.com',
            'password' => Hash::make('password'),
        ]);
        $post = Post::create([
            'user_id' => $user->id,
            'title' => 'Example post title',
        ]);
        $post->comments()->create([
            'user_id' => $user->id,
            'body' => 'Comment for post',
        ]);
        $post->comments()->create([
            'user_id' => $user->id,
            'body' => '2nd comment for post',
        ]); */

        $video = Video::create([
            'title' => 'example video title',
        ]);
        $video->comments()->create([
            'user_id' => 35,
            'body' => 'Comment for video',
        ]);

        echo "Inserted";
        exit;
    }
    public function function_2(){
        /* $post = Post::find(6);
        echo "<pre>";
        print_r($post->comments);
        echo "</pre>";
        exit; */

        /* $video = Video::find(1);
        echo "<pre>";
        print_r($video->comments);
        echo "</pre>";
        exit; */

        /* $comment = Comment::find(1);
        echo "<pre>";
        // print_r($comment->commentable);
        print_r($comment->subject);
        echo "</pre>";
        exit; */

        /* $comment = Comment::find(2);
        echo "<pre>";
        // print_r($comment->commentable);
        print_r($comment->subject);
        echo "</pre>";
        exit; */



        $post = Post::find(6);
        echo "<pre>";
        print_r($post->comment);
        echo "</pre>";
        exit;
    }
}
?>
