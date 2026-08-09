<?php
namespace App\Http\Responses\Api;
class UserProfileResponse
{
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function toArray()
    {
        return [
            'name' => $this->user->name ?? '',
            'email' => $this->user->email ?? '',
        ];
    }
}
