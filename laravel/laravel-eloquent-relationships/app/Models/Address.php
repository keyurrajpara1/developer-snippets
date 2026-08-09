<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Address extends Model{
    protected $fillable = ['country'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
        /*  Second parameter user_id : foreign key of addresses table.
            Third parameter id       : primary key of users table.
        */
    }
}