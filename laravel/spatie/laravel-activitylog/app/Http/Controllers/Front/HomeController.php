<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Activitylog\Models\Activity;

use App\Models\User;

use Hash;

class HomeController extends Controller
{
    protected $objUser;
    public function __construct(){
        //parent::__construct();
        $this->objUser = new User();
    }

    public function firstLog(Request $request){
        activity()->log("First log..");
        exit;
    }

    public function allActivities(Request $request){
        // $allActivities = Activity::all()->last();
        $allActivities = Activity::all();
        echo "<pre>";
        print_r($allActivities);
        exit;
    }
    
    public function createNewUser(Request $request){
        $user = $this->objUser->create([
            'name' =>  "Liam",
            'email' => "liam@test.com",
            'password' => Hash::make("123456789"),
        ]);

        echo "<pre>";
        print_r($user);
        exit;
    }
    
    public function updateUser(Request $request){
        $user = $this->objUser->find(2);
        $updated = $user->update([
            'email' =>  "liam@test.com",
        ]);

        echo "<pre>";
        print_r($updated);
        exit;
    }
    
    public function deleteUser(Request $request){
        $user =$this->objUser->find(1);
        $deleted = $user->delete();

        echo "<pre>";
        print_r($deleted);
        exit;
    }
}
