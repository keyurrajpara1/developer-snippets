<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Task extends Model{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
        //  Second parameter user_id : foreign key of tasks table.
        //     Third parameter id       : primary key of users table.
    }
}