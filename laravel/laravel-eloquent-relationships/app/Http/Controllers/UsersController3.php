<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User, App\Models\Post, App\Models\Tag, App\Models\Project, App\Models\Task;
use Illuminate\Support\Facades\Hash;
class UsersController3 extends Controller
{
    public function __construct(){
    }
    /* Scenario 1
    -------------
    - project
        has many users
            - user
                has many tasks */
    public function createProject1(Request $request){
        $project1 = Project::create([ 'title' => 'Project A' ]);

                $user1 = User::create([ 'name' => 'User 1', 'email' => 'user1@example.com', 'password' => Hash::make('password'), 'project_id' => $project1->id ]);

                        $task1 = Task::create([ 'title' => 'Task 1 for project 1 by user 1', 'user_id' => $user1->id ]);
                        $task2 = Task::create([ 'title' => 'Task 2 for project 1 by user 1', 'user_id' => $user1->id ]);

                $user2 = User::create([ 'name' => 'User 2', 'email' => 'user2@example.com', 'password' => Hash::make('password'), 'project_id' => $project1->id ]);
                
                        $task3 = Task::create([ 'title' => 'Task 3 for project 1 by user 2', 'user_id' => $user2->id ]);
        exit;
    }
    public function projects(Request $request){
        // echo "Hi there";
        // exit;
        $project = Project::find(1);
        echo "<pre>";
        // print_r($project);
        // print_r($project->users);
        // print_r($project->users[0]->tasks);
        // print_r($project->users[1]->tasks);
        print_r($project->tasks);
        // print_r($project->task);
        echo "</pre>";
        exit;
    }
    public function createProject2(Request $request){
        $project2 = Project::create([ 'title' => 'Project B' ]);
                $user3 = User::create([ 'name' => 'User 3', 'email' => 'user3@example.com', 'password' => Hash::make('password'), 'project_id' => $project2->id ]);
                        $task4 = Task::create([ 'title' => 'Task 4 for project 2 by user 3', 'user_id' => $user3->id ]);
                        $task5 = Task::create([ 'title' => 'Task 5 for project 2 by user 3', 'user_id' => $user3->id ]);

                $user4 = User::create([ 'name' => 'User 4', 'email' => 'user4@example.com', 'password' => Hash::make('password'), 'project_id' => $project2->id ]);
                        $task6 = Task::create([ 'title' => 'Task 6 for project 2 by user 4', 'user_id' => $user4->id ]);

                $user5 = User::create([ 'name' => 'User 5', 'email' => 'user5@example.com', 'password' => Hash::make('password'), 'project_id' => $project2->id ]);
        exit;
    }

    /* Scenario 2
    -------------
    - project
        has many users
    - user
        has many projects
    - user
        has many tasks */
    public function createProject1_scenario_2(Request $request){
        /* $project1 = Project::create([ 'title' => 'Project A1' ]);
        
            $user1 = User::create([ 'name' => 'User 11', 'email' => 'user_11@example.com', 'password' => Hash::make('password') ]);
            $user2 = User::create([ 'name' => 'User 22', 'email' => 'user_22@example.com', 'password' => Hash::make('password') ]);
            $user3 = User::create([ 'name' => 'User 33', 'email' => 'user_33@example.com', 'password' => Hash::make('password') ]);

                $project1->users()->attach($user1);
                $project1->users()->attach($user2);
                $project1->users()->attach($user3);

        $project2 = Project::create([ 'title' => 'Project B1' ]);

            $project2->users()->attach($user1);
            $project2->users()->attach($user3); */

        /* Task::create(['title' => 'Task A', 'user_id' => 32]);
        Task::create(['title' => 'Task B', 'user_id' => 32]);
        Task::create(['title' => 'Task C', 'user_id' => 33]);
        Task::create(['title' => 'Task D', 'user_id' => 34]); */

        echo "Inserted";
        exit;
    }
    public function projects_scenario_2(Request $request){
        // echo "Hi there";
        // exit;
        /* $project1 = Project::find(4);
        echo "<pre>";
        // print_r($project1);
        print_r($project1->users);
        echo "</pre>";
        exit; */

        /* $user1 = User::find(32);
        echo "<pre>";
        // print_r($user1);
        print_r($user1->projects);
        echo "</pre>";
        exit; */

        $project1 = Project::find(5);
        echo "<pre>";
        // print_r($project1);
        // print_r($project1->tasks);
        print_r($project1->task);
        echo "</pre>";
        exit;
        /* [wasRecentlyCreated] => 
        [escapeWhenCastingToString:protected] => 
        [attributes:protected] => Array
            (
                [id] => 4
                [user_id] => 32
                [title] => Task A
                [created_at] => 2026-05-15 11:45:20
                [updated_at] => 2026-05-15 11:45:20
                [laravel_through_key] => 5
            )

        [original:protected] => Array
            (
                [id] => 4
                [user_id] => 32
                [title] => Task A
                [created_at] => 2026-05-15 11:45:20
                [updated_at] => 2026-05-15 11:45:20
                [laravel_through_key] => 5
            )

        [changes:protected] => Array
            (
            ) */
        // laravel_through_key is project_id
    }
}
?>