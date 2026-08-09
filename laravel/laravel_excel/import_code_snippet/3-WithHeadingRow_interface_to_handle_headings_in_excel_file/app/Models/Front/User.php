<?php
namespace App\Models\Front;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $fillable = ['name','email','password'];
}