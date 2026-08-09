<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class UsersController1 extends Controller
{
    public function __construct(){
    }
    public function index(Request $request){
        $users = User::with('addresses')->get();
        /*echo "<pre>";
        print_r($users->toArray());
        exit;*/
        echo "<table border='1'>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Address</th>";
        echo "</tr>";
        foreach ($users as $key => $value) {
            echo "<tr>";
                echo "<td>".$value->name."</td>";
                foreach ($value->addresses as $key1 => $value1) {
                    echo "<td>".$value1->country."</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
        return view('test');//This return view is used to show laravel debugbar.
    }
    public function createAddressEntry(Request $request){
        $user = User::find(8);
        $user->addresses()->create([
            'country' => 'India'
        ]);
        exit;
    }

    public function createPost(){
        /*Post::create([
            'user_id' => 1,
            'title' => 'Post title 1'
        ]);
        Post::create([
            'user_id' => 2,
            'title' => 'Post title 2'
        ]);*/
        /*Post::create([
            'title' => 'Post title 3'
        ]);*/
        $users = User::get();
        $users[0]->posts()->create([
            'title' => 'Post 4',
        ]);
        $users[2]->posts()->create([
            'title' => 'Post 5',
        ]);
    }
    public function displayPost(){
        // $posts = Post::get()->toArray();
        // $posts = Post::get();
        $posts = Post::with('user')->get();
        // echo "<pre>";
        // print_r($posts);
        // exit;
        echo "<table border='1'>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Address</th>";
        echo "</tr>";
        foreach ($posts as $key => $value) {
            echo "<tr>";
                echo "<td>".$value->title."</td>";
                echo "<td>".$value->user->name."</td>";
                // echo "<td>".optional($value->user)->name."</td>";
            echo "</tr>";
        }
        echo "</table>";
        exit;
    }
    public function displayUserPost(){
        // $users = User::get();
        
        // $users = User::with('posts')->get();

        // Only those users who have not posts
        // $users = User::doesntHave('posts')->with('posts')->get();

        // Only those users who have posts
        // $users = User::has('posts')->with('posts')->get();

        // Only those users who have 2 or more than 2 posts
        // $users = User::has('posts', '>=', 2)->with('posts')->get();

        // Only those users who have posts with post title contain title keyword
        /*$users = User::whereHas('posts', function($query){
            $query->where('title', 'like', '%title%');
        })->with('posts')->get();*/

        echo "<table border='1'>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Address</th>";
        echo "</tr>";
        foreach ($users as $key => $value) {
            echo "<tr>";
                echo "<td>".$value->name."</td>";
                foreach ($value->posts as $key1 => $value1) {
                    echo "<td>".$value1->title."</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
        exit;
    }
}
?>