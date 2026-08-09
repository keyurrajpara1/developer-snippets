<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    protected $guarded = [];
    /* Scenario 1
    -------------
    - project
        has many users
            - user
                has many tasks */
    /* public function users(){
        return $this->hasMany(User::class, 'project_id', 'id');
    }
    public function tasks(){
        // return $this->hasManyThrough(Task::class, User::class, 'xyz');
        // return $this->hasManyThrough(Task::class, User::class, 'project_id', 'xyz');
        return $this->hasManyThrough(Task::class, User::class, 'project_id', 'user_id', 'id'); // returns collection of tasks
    }
    public function task(){
        return $this->hasOneThrough(Task::class, User::class, 'project_id', 'user_id', 'id'); // returns single task object
    } */

    /* Scenario 2
    -------------
    - project
        has many users
    - user
        has many projects
    - user
        has many tasks */
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function tasks(){
        // return $this->hasManyThrough(Task::class, ProjectUser::class, 'project_id', 'user_id', 'id', 'xyz'); // returns collection of tasks
        return $this->hasManyThrough(Task::class, ProjectUser::class, 'project_id', 'user_id', 'id', 'user_id'); // returns collection of tasks
    }
    public function task(){
        return $this->hasOneThrough(Task::class, ProjectUser::class, 'project_id', 'user_id', 'id', 'user_id'); // returns single task object
    }
}