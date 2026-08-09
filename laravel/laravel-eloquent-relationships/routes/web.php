<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsersController, UsersController1, UsersController2, UsersController3, UsersController4, UsersController5};
Route::get("/", [UsersController::class, 'index']);
Route::get("create-address-entry", [UsersController::class, 'createAddressEntry']);
Route::get("user-relationship-in-address-model", [UsersController::class, 'userRelationshipInAddressModel']);
Route::get("create-address-entry-second-way", [UsersController::class, 'createAddressEntrySecondWay']);

Route::get("has-many", [UsersController1::class, 'index']);
Route::get("has-many/create-address-entry", [UsersController1::class, 'createAddressEntry']);
Route::get("has-many/create-post", [UsersController1::class, 'createPost']);
Route::get("has-many/display-post", [UsersController1::class, 'displayPost']);
Route::get("has-many/display-user-post", [UsersController1::class, 'displayUserPost']);

Route::get("many-to-many/create-tag", [UsersController2::class, 'createTag']);
Route::get("many-to-many/attach-tag-to-post", [UsersController2::class, 'attachTagToPost']);
Route::get("many-to-many/display-post", [UsersController2::class, 'displayPost']);
Route::get("many-to-many/detach-tag-from-post", [UsersController2::class, 'detachTagFromPost']);

Route::get("many-to-many/get-tags", [UsersController2::class, 'getTags']);

/* Scenario 1
    -------------
    - project
        has many users
            - user
                has many tasks */
Route::get("has-one-through/has-many-through/create-project1", [UsersController3::class, 'createProject1']);
Route::get("has-one-through/has-many-through/create-project2", [UsersController3::class, 'createProject2']);
Route::get("has-one-through/has-many-through/projects", [UsersController3::class, 'projects']);

/* Scenario 2
    -------------
    - project
        has many users
    - user
        has many projects
    - user
        has many tasks */
Route::get("has-one-through/has-many-through/create-project1-scenario2", [UsersController3::class, 'createProject1_scenario_2']);
Route::get("has-one-through/has-many-through/projects-scenario2", [UsersController3::class, 'projects_scenario_2']);

/* [1]
Post
    PostComment

Video
    VideoComment

Podcast
    PodcastComment

Event
    EventComment

[2]
Comment
    post_id
    video_id
    podcast_id
    event_id
    comment_text

[3]
Comment
    commentable_id   | 1
    commentable_type | Post, Video, Podcast, Event */
Route::get("polymorphic-relationships-1", [UsersController4::class, 'function_1']);
Route::get("polymorphic-relationships-2", [UsersController4::class, 'function_2']);

/*
[1]
Post
Tag
post_tag
    post_id
    tag_id

Video
Tag
video_tag
    video_id
    tag_id

[2]
Post
Video

Tag

Taggables
    tag_id
    taggable_id   | 1
    taggable_type | Post, Video
*/

Route::get("polymorphic-relationships-3", [UsersController5::class, 'function_3']);

/*Route::get('/', function () {
    return view('welcome');
});*/
