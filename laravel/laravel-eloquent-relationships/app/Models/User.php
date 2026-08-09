<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'project_id'
    ];
    public function address(){
        // return $this->hasOne('App\Models\Address', 'user_id', 'id');
        return $this->hasOne(Address::class, 'user_id', 'id');
        /*  Second parameter user_id : foreign key of addresses table.
            Third parameter id       : primary key of users table.
        */
    }
    public function addresses(){
        return $this->hasMany(Address::class, 'user_id', 'id');
    }
    public function posts(){
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    /* Scenario 1
    -------------
    - project
        has many users
            - user
                has many tasks */
    /* public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
        //  Second parameter project_id : foreign key of users table.
        //     Third parameter id       : primary key of projects table.
    }
    public function tasks(){
        return $this->hasMany(Task::class, 'user_id', 'id');
    } */

    
    /* Scenario 2
    -------------
    - project
        has many users
    - user
        has many projects
    - user
        has many tasks */
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}