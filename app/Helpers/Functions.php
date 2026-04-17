<?php

use Carbon\Carbon;
use App\Models\Team\TeamModel;
use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use Illuminate\Support\Facades\DB;
use App\Models\Posts\PostTypeModel;
use App\Models\Travels\RegionModel;
use App\Models\Travels\SeasonModel;
use App\Models\Settings\CountryModel;
use App\Models\Settings\SettingModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripTypeModel;
use App\Models\Travels\TripGradeModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\AssociatedPostModel;
use App\Models\Travels\ActivityGroupModel;
use App\Models\Destinations\DestinationModel;
use App\Models\Destinations\DestinationActivityrelModel;
use App\Models\Expeditions\ExpeditionModel;
use App\Models\Posts\PostImageModel;


// Check whether this post type has post or not.
function is_empty_posttype($id)
{
    $data = PostModel::where(['post_type' => $id])->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

// Check whether this category has post or not.
function is_empty_category($id)
{
    $data = PostModel::where(['post_category' => $id])->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

function show_category($category_id)
{
    $post = PostCategoryModel::where('id', $category_id)->first();
    return $post['category'];
}

function loop_category($id)
{
    $category = PostCategoryModel::where('pid', $id)->first();
    return $category;
}

function check_posttype_uri($uri)
{
    $data = PostTypeModel::where(['uri' => $uri])->first();
    if ($data) {
        return true;
    }
    return false;
}

function has_posts($post_type)
{
    $data = PostModel::where(['post_type' => $post_type, 'post_parent' => '0', 'status' => 1])->orderBy('post_order', 'asc')->get();
    if ($data->count() > 0) {
        return $data;
    }
    return false;
}
function has_associatedpost($id)
{
    $data = AssociatedPostModel::where('post_id', $id)->count();
    return $data;
}
function has_single_post($post_type)
{
    $data = PostModel::where(['post_type' => $post_type, 'post_parent' => '0', 'status' => 1])->orderBy('post_order', 'asc')->first();
    if ($data) {
        return $data;
    }
    return false;
}

function check_uri($uri)
{
    $data = PostModel::where(['uri' => $uri])->first();
    if ($data) {
        return true;
    }
    return false;
}

function geturl($uri = NULL, $page_key = NULL)
{
    $count = PostModel::where(['uri' => $uri])->count();
    $data = PostModel::where(['uri' => $uri])->firstOrFail();
    if ($count > 1 || $uri === NULL || $uri === "") {
        $count = PostModel::where(['page_key' => $page_key])->count();
        $data = PostModel::where(['page_key' => $page_key])->firstOrFail();
        return $data->page_key . '.html';
    }
    return $data->uri . '.html';
}

function posttype_geturl($uri)
{
    $data = PostTypeModel::where('uri', $uri)->first();
    if ($data) {
        return $data['uri'] . '.html';
    }
    return false;
}

// Check and List Child Post
function has_child_post($id)
{
    $check_child = PostModel::where('post_parent', $id)->count();
    if ($check_child) {
        $data = PostModel::where(['post_parent' => $id])->orderBy('post_order', 'asc')->get();
        return $data;
    }
    return false;
}
function has_child_post_with_paginate($id)
{
    $check_child = PostModel::where('post_parent', $id)->count();
    if ($check_child) {
        $data = PostModel::where(['post_parent' => $id])->orderBy('post_order', 'asc')->paginate(8);
        return $data;
    }
    return false;
}

function check_child_post($id)
{
    $data = PostModel::where('post_parent', $id)->count();
    if ($data) {
        return $data;
    }
    return false;
}

function check_child($id)
{
    $data = PostModel::where('post_parent', $id)->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

// Get parent post
function post_parent_fun($uri)
{
    $post = PostModel::where(['uri' => $uri])->first();
    if ($post) {
        $parent = PostModel::where(['post_parent' => $post->post_parent, 'status' => 1])->first();
        return $parent;
    }
    return false;
}

// Get parent post
function post_parent_byId($id)
{
    $parent = PostModel::where(['id' => intval($id)])->first();
    if ($parent) {
        return $parent;
    }
    return false;
}

// for sidebar inner left
function child_list($uri)
{
    $post_parent = PostModel::where(['uri' => $uri, 'status' => 1])->first();
    if ($post_parent->post_parent) {
        $_list = PostModel::where(['post_parent' => $post_parent->post_parent, 'status' => 1])->get();
        return $_list;
    }
    return false;
}

function settings()
{
    $data = SettingModel::where(['id' => '1'])->first();
    if ($data) {
        return $data;
    }
    return false;
}


/**********Trip List by regions************/
function tripbyregions($region_id)
{
    $data = RegionModel::find($region_id)->trips()->orderBy('ordering', 'asc')->get();
    return $data;
}

// Expedition
function trip_byDestinations($id)
{
    $data = DestinationModel::find($id)->trips()->where('status', '1')->orderBy('ordering', 'asc')->get();
    if ($data) {
        return $data;
    }
    return false;
}

function populartrip_byDestinations($id)
{
    $data = DestinationModel::find($id)->trips()->where(['status' => '1', 'video_status' => '1'])->orderBy('ordering', 'asc')->get();
    if ($data) {
        return $data;
    }
    return false;
}

function is_empty_destination($id)
{
    $data = DestinationModel::find($id)->trips()->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

function activity_byregions($region_id)
{
    $data = RegionModel::find($region_id)->activities()->get();
    return $data;
}

function tripurl($uri)
{
    $count = TripModel::where(['uri' => $uri])->count();
    $data = TripModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return $data->uri . '.html';
    }
    return $data->uri . '.html';
}
function trip_destination_title($tripId)
{
    if (!$tripId) {
        return null;
    }

    return TripModel::where('id', $tripId)
        ->with('destinations')
        ->first()?->destinations()
        ->value('title');
}

function trip_byactivities($activity_id)
{
    $data = ActivityModel::find($activity_id);
    $trips = $data->trips()->get();
    return $trips;
}


function activityurl($uri)
{
    $count = ActivityModel::where(['uri' => $uri])->count();
    $data = ActivityModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return false;
    }
    return 'activity/' . $data->uri . '.html';
}

function regionurl($uri)
{
    $count = RegionModel::where(['uri' => $uri])->count();
    $data = RegionModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return false;
    }
    return 'region/' . $data->uri . '.html';
}

function expeditionurl($uri)
{
    $count = DestinationModel::where(['uri' => $uri])->count();
    $data = DestinationModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return false;
    }
    return 'expedition/' . $data->uri . '.html';
}

function categoryurl($uri)
{
    $data = PostCategoryModel::where(['uri' => $uri])->first();
    if ($data) {
        return 'category/' . $data->uri . '.html';
    }
    return false;
}

function tripcount($activity_id)
{
    $data = ActivityModel::find($activity_id)->trips()->count();
    return $data;
}

function season($id)
{
    $data = SeasonModel::where('id', $id)->first();
    if ($data) {
        return $data->season;
    }
    return false;
}


function dateformat($date)
{
    $data = Carbon::parse($date)->format('F j, Y');
    return $data;
}


function trip_type($id)
{
    $data = TripTypeModel::where('id', $id)->first();
    if ($data) {
        return $data->trip_type;
    }
    return false;
}

function grade_message_trek($id)
{
    $data = TripGradeModel::where('id', $id)->first();
    if ($data) {
        return $data->trip_grade;
    }
    return false;
}


function posttype_url($uri)
{
    $count = PostTypeModel::where(['uri' => $uri])->count();
    $data = PostTypeModel::where(['uri' => $uri])->first();
    if ($count > 1) {
        return $data->page_key . '.html';
    }
    return $data->uri . '.html';
}


function getposts($id)
{
    $data = PostModel::where(['post_type' => $id, 'post_parent' => '0', 'status' => '1'])->orderBy('post_order', 'asc')->get();
    if ($data) {
        return $data;
    }
    return false;
}

function tripdetail($id)
{
    $data = TripModel::where('id', $id)->first();
    if ($data) {
        return $data;
    }
    return false;
}
function tripname($id)
{
    $data = TripModel::where('id', $id)->first();
    if ($data) {
        return $data->trip_title;
    }
    return false;
}

function getactivityname($id)
{
    $data = TripModel::find($id)->activities()->first();
    if ($data) {
        return $data;
    }
    return false;
}

function team_url($uri = NULL, $team_key = NULL)
{
    $count = TeamModel::where(['uri' => $uri])->count();
    $data = TeamModel::where(['uri' => $uri])->firstOrFail();
    if ($count > 1 || $uri === NULL || $uri === "") {
        $count = TeamModel::where(['team_key' => $team_key])->count();
        $data = TeamModel::where(['team_key' => $team_key])->firstOrFail();
        return $data->team_key;
    }
    return $data->uri;
}
function selected($activity_id, $destination_id)
{
    $data = DestinationActivityrelModel::where(['activity_id' => $activity_id, 'destination_id' => $destination_id])->first();
    if ($data) {
        return $data;
    }
    return false;
}

function has_postimage($id)
{
    $data = PostImageModel::where('post_id', $id)->count();
    return $data;
}

function posttypeById($id)
{
    $data = PostTypeModel::where('id', $id)->first();
    return $data;
}

function posttype_bypostid($id)
{
    $data = PostModel::where('id', $id)->first();
    $value = $data->post_type;
    $posttype = PostTypeModel::where('id', $value)->first();
    return $posttype->uri;
}


function get_postimage($id)
{
    $data = PostImageModel::where('post_id', $id)->get();
    return $data;
}
function get_associatedpost($id)
{
    $data = AssociatedPostModel::where('post_id', $id)->get();
    return $data;
}
function get_triplist($id)
{
    $data=ActivityModel::find($id)->trips()->where('status','1')->orderBy('ordering','asc')->get();
    return $data;
}

// Sangam helper function
function calculate_days($start, $end){
    $days = Carbon::parse($start)->diffInDays(Carbon::parse($end), false);
    return $days;
}

function generate_unique_uri($model, $data)
{
    $originalData = $data;
    $counter = 1;

    while ($model::where('uri', $data)->exists()) {
        $data = $originalData . '-' . $counter;
        $counter++;
    }

    return $data;
}

function get_trip_type($id){
    $data = DB::table('cl_trip_type')->where('id',$id)->first();
    $trip_type = null;
    if($data)
    {
        $trip_type = $data->trip_type;
    }
    // dd($data, $trip_type);
    return $trip_type;
}

//By Sangam Starts

function get_experience_type($trip)
{
    $data = $trip->activities->first();
    $experience = null;
    if($data){
        $experience = $data->title;
    }
    return $experience;
}

function post_parent_by_postId($id)
{
    $child = PostModel::where(['id' => $id])->first();
    if ($child && $child->post_parent) {
        $parent = PostModel::where(['id' => $child->post_parent])->first();
        return $parent;
    }
    return false;
}
function is_empty_teamcategory($id){
    $data = TeamModel::where(['category'=>$id])->count();
    if( $data > 0){
      return true;
    }
    return false;
  }

//By Sangam Ends