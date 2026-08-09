<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function __construct(){
    }
    public function index(Request $request){
        // $users = User::all();
            /*In laravel debugbar, we can see runs many queries when run $value->address->country this statement.*/
        // OR
        $users = User::with('address')->get();
            /*For optimization we can run this statement. This will get data at once.*/
        // echo "<pre>";
        // print_r($users);
        // exit;
        echo "<table border='1'>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Address</th>";
        echo "</tr>";
        foreach ($users as $key => $value) {
            echo "<tr>";
                echo "<td>".$value->name."</td>";
                echo "<td>".$value->address->country."</td>";
            echo "</tr>";
        }
        echo "</table>";
        // exit;
        return view('test');//This return view is used to show laravel debugbar.
    }
    public function createAddressEntry(Request $request){
        $user = User::find(8);
        $user->address()->create([
            'country' => 'India'
        ]);
        exit;
    }
    public function createAddressEntrySecondWay(Request $request){
        $user = User::find(8);
        $address = new \App\Models\Address([
            'country' => 'United States'
        ]);
        $address->user()->associate($user);
        $address->save();
    }
    public function userRelationshipInAddressModel(Request $request){
        // $addresses = \App\Models\Address::all();
            /*In laravel debugbar, we can see runs many queries when run $value->user->name this statement.*/
        // OR
        $addresses = \App\Models\Address::with('user')->get();
            /*For optimization we can run this statement. This will get data at once.*/
        // echo "<pre>";
        // print_r($addresses);
        // exit;
        echo "<table border='1'>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Address</th>";
        echo "</tr>";
        foreach ($addresses as $key => $value) {
            echo "<tr>";
                echo "<td>".$value->user->name."</td>";
                echo "<td>".$value->country."</td>";
            echo "</tr>";
        }
        echo "</table>";
        // exit;
        return view('test');//This return view is used to show laravel debugbar.
    }
}
?>