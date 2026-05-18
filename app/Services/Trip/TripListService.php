<?php

namespace App\Services\Trip;

use App\DTO\Trip\TripListDTO;
use App\Models\Travels\ActivityModel;

class TripListService
{
    public function get($parent)
    {
        $activities = ActivityModel::where('activity_parent', $parent)
            ->with(['trips' => function ($query) {
                $query->select(
                    'cl_trip_details.id',
                    'cl_trip_details.trip_title',
                    'cl_trip_details.sub_title',
                    'cl_trip_details.uri',
                    'cl_trip_details.thumbnail',
                    'cl_trip_details.thumbnail_alt',
                    'cl_trip_details.duration',
                    'cl_trip_details.max_altitude',
                    'cl_trip_details.group_size',
                    'cl_trip_details.trip_grade',
                    'cl_trip_details.price',
                    'cl_trip_details.discount',
                    'cl_trip_details.route',
                    'cl_trip_details.best_season',
                    'cl_trip_details.ordering'
                )
                ->where('cl_trip_details.status', '1')
                ->orderBy('cl_trip_details.ordering', 'asc');
            }])
            ->orderBy('ordering', 'asc')->get();

        // dd($activities);
        return new TripListDTO(
            hero: [],
            items: $activities->toArray(),
            seo: [],
        );
    }
    public function category($slug)
    {
        $activity = ActivityModel::where('uri', $slug)
            ->with(['trips' => function ($query) {
                $query->select(
                    'cl_trip_details.id',
                    'cl_trip_details.trip_title',
                    'cl_trip_details.sub_title',
                    'cl_trip_details.uri',
                    'cl_trip_details.thumbnail',
                    'cl_trip_details.thumbnail_alt',
                    'cl_trip_details.duration',
                    'cl_trip_details.max_altitude',
                    'cl_trip_details.group_size',
                    'cl_trip_details.trip_grade',
                    'cl_trip_details.price',
                    'cl_trip_details.discount',
                    'cl_trip_details.route',
                    'cl_trip_details.best_season',
                    'cl_trip_details.ordering'
                )
                ->where('cl_trip_details.status', '1')
                ->orderBy('cl_trip_details.ordering', 'asc');
            }])
            ->first();

        return new TripListDTO(

            hero: [
                'id' => $activity->id,
                'activity_parent' => $activity->activity_parent,
                'title' => $activity->title,
                'sub_title' => $activity->sub_title,
                'template' => $activity->template,
                'uri' => $activity->uri,

                'thumbnail' => $activity->thumbnail,
                'thumbnail_alt' => $activity->thumbnail_alt,

                'banner' => $activity->banner,
                'banner_alt' => $activity->banner_alt,

                'excerpt' => $activity->excerpt,
                'content' => $activity->content,

                'external_link' => $activity->external_link,
                'category_video' => $activity->category_video,

                'meta_keyword' => $activity->meta_keyword,
                'meta_description' => $activity->meta_description,

                'ordering' => $activity->ordering,
                'status' => $activity->status,
            ],

            items: $activity->trips->toArray(),

            seo: [
                'meta_title' => $activity->title,
                'meta_keyword' => $activity->meta_keyword,
                'meta_description' => $activity->meta_description,
            ],
        );
    }
}
