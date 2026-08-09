<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Address extends Model{
    public $table = 'addresses';
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
