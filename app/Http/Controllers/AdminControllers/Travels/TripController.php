<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Travels\TripModel;
use App\Models\Travels\TripBanner;
use Illuminate\Support\Facades\DB;
use App\Models\Travels\RegionModel;
use App\Http\Controllers\Controller;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripGearModel;
use App\Models\Travels\TripTypeModel;
use Intervention\Image\Facades\Image;
use App\Models\Cost\CostExcludesModel;
use App\Models\Cost\CostIncludesModel;
use App\Models\Travels\TripGradeModel;
use App\Models\Travels\TripGroupModel;
use App\Models\Travels\TripItineraryModel;
use App\Models\Destinations\DestinationModel;
use Illuminate\Support\Facades\Validator;
use App\Models\Travels\TripScheduleModel;
use App\Models\Faqs\FaqModel;


class TripController extends Controller
{

    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($training = null)
    {

        $category = ActivityModel::where('activity_parent', '!=', 'package')->get();

        $data = $category->flatMap(function ($cat) {
            return $cat->trips; // Ensure that 'trips' is being returned
        })->sortByDesc('ordering')->values();
        // dd($data);
        return view('admin.trips.index', compact('data'));

    }
    public function alltrips()
    {
        $data = TripModel::orderBy('ordering', 'desc')->get();
        // dd($data);
        return view('admin.trips.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($training = null)
    {
        // dd('test-',$training);
        $destinations = DestinationModel::all();
        $regions = RegionModel::all();
        $activities = ActivityModel::all();
        $trip_groups = TripGroupModel::all();
        $ordering = TripModel::max('ordering');
        $availability = array('AVAILABLE' => 'AVAILABLE', 'CLOSED' => 'CLOSED');
        $ordering += 1;
        $all_trips = TripModel::get();
        $grades = TripGradeModel::all();
        $trip_type = TripTypeModel::get();
        $trek = TripGradeModel::get();
        $trekking = ActivityModel::where('activity_parent', 'trekking')->get();
        $expeditions = ActivityModel::where('activity_parent', 'expedition')->get();
        $activity = ActivityModel::where('activity_parent', 'activity')->get();
        $packages = ActivityModel::where('activity_parent', 'package')->get();
        if ($training) {
            return view('admin.training-package.create', compact('trek', 'all_trips', 'trip_type', 'grades', 'ordering', 'destinations', 'regions', 'activities', 'trip_groups', 'expeditions', 'trekking', 'availability', 'activity', 'packages'));
        }
        // dd($expeditions);
        return view('admin.trips.create', compact(
            'trek',
            'all_trips',
            'trip_type',
            'grades',
            'ordering',
            'destinations',
            'regions',
            'activities',
            'trip_groups',
            'expeditions',
            'trekking',
            'availability',
            'activity',
            'packages'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'trip_title' => 'required|unique:cl_trip_details,trip_title',
                'uri' => 'required|unique:cl_trip_details,uri',
                'trip_type' => 'required',
                'destination' => 'required|array|min:1',
                'activity' => 'required|array|min:1',

                // Thumbnail
                'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1500,max_height=1500',
                // Trip Map
                'trip_map' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1500,max_height=1500',
                // Banner
                'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1600,max_height=1500',
                // gear images (array)
                'gear_thumbnail' => 'nullable|array',
                // validate each image
                'gear_thumbnail.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1600,max_height=1200',
            ],
            [
                // Thumbnail messages
                'thumbnail.image' => 'Thumbnail must be an image.',
                'thumbnail.mimes' => 'Thumbnail must be JPG, JPEG, PNG or WEBP.',
                'thumbnail.max' => 'Thumbnail size must not exceed 2MB.',
                'thumbnail.dimensions' => 'Thumbnail must be less than 1500x1500 pixels.',

                // Trip Map messages
                'trip_map.image' => 'Trip map must be an image.',
                'trip_map.mimes' => 'Trip map must be JPG, JPEG, PNG or WEBP.',
                'trip_map.max' => 'Trip map size must not exceed 2MB.',
                'trip_map.dimensions' => 'Trip map must be less than  1500x1500 pixels.',

                // Banner messages
                'banner.image' => 'Banner must be an image.',
                'banner.mimes' => 'Banner must be JPG, JPEG, PNG or WEBP.',
                'banner.max' => 'Banner size must not exceed 2MB.',
                'banner.dimensions' => 'Banner must be less than 1600x1500 pixels.',

                // custom messages
                'gear_thumbnail.*.dimensions' => 'Each Photos must be less than 1600x1200 pixels.',
                'gear_thumbnail.*.image' => 'Photos must be valid images.',
                'gear_thumbnail.*.mimes' => 'Photos must be JPG, JPEG, PNG, or WEBP.',
                'gear_thumbnail.*.max' => 'Each Photos must be less than 2MB.',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()->all()
                ]);
            }
            // dd( $request->all() ,Str::slug($request->uri));

            $data = $request->all();

            /*************Banner Upload************/
            $file = $request->file('banner');
            $banner_name = '';
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $banner_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                $destinationPath = public_path('uploads/banners');
                Image::make($file->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $banner_name);
            }

            /******Upload Thumbnail******/
            $thumbnail_name = '';
            if ($request->hasFile('thumbnail')) {
                $thumb_file = $request->file('thumbnail');
                $originalName = pathinfo($thumb_file->getClientOriginalName(), PATHINFO_FILENAME);
                $thumbnail_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                $destinationPath = public_path('uploads/thumbnails');
                Image::make($thumb_file->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $thumbnail_name);
            }

            /*************PDF****************/
            $pdf_name = '';
            if ($request->hasFile('upload_pdf')) {
                $pdf_file = $request->file('upload_pdf');
                $originalName = pathinfo($pdf_file->getClientOriginalName(), PATHINFO_FILENAME);
                $pdf_name = Str::slug($originalName) . '-' . Str::random(5) . '.pdf';
                $destinationPath = public_path('uploads/pdf');
                $pdf_file->move($destinationPath, $pdf_name);
            }

            $data['trip_pdf'] = $pdf_name;

            /******Upload Trip Map******/
            $map_file_name = '';
            if ($request->hasFile('trip_map')) {
                $map_file = $request->file('trip_map');
                $originalName = pathinfo($map_file->getClientOriginalName(), PATHINFO_FILENAME);
                $map_file_name = time() . '_' . Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                $map_destinationPath = public_path('uploads/original');
                Image::make($map_file->getRealPath())->encode('webp', 90)->save($map_destinationPath . '/' . $map_file_name);
            }
            /*****************************/

            /******Upload Trip Altitude Chart******/
            $chart_file = $request->file('trip_chart');
            $chart_file_name = '';
            if ($request->hasfile('trip_chart')) {
                $chart_thumbnail = $request->file('trip_chart')->getClientOriginalName();
                $chart_extension = $request->file('trip_chart')->getClientOriginalExtension();
                $chart_thumbnail = explode('.', $chart_thumbnail);
                $chart_file_name = time() . '_' . Str::slug($chart_thumbnail[0]) . '-' . Str::random(5) . '.' . $chart_extension;

                $chart_destinationPath = public_path('uploads/original');

                $chart_thumbnail_picture = Image::make($chart_file->getRealPath());
                $chart_width = Image::make($chart_file->getRealPath())->width();
                $chart_height = Image::make($chart_file->getRealPath())->height();
                $chart_thumbnail_picture->save($chart_destinationPath . '/' . $chart_file_name);
            }
            /*****************************/

            if ($request->trip_code == NULL) {
                $data['trip_code'] = rand() . '-' . time();
            }

            $data['uri'] = Str::slug($request->uri);
            $data['banner'] = $banner_name;
            $data['thumbnail'] = $thumbnail_name;
            $data['trip_map'] = $map_file_name;
            $data['trip_chart'] = $chart_file_name;

            $is_draft = '0';
            if ($request->submit == 'publish') {
                $is_draft = '0';
            } else if ($request->submit == 'draft') {
                $is_draft = '1';
            }
            $data['is_draft'] = $is_draft;
            $result = TripModel::create($data);
            $last_id = $result->id;


            // Insert into schedule
            if (isset($request->schedule_ordering)) {
                $schedule_keys = array_keys($request->schedule_ordering);
                $sn_schedule = 1;
                $sn_schedule_count = count($request->schedule_ordering);
                foreach ($schedule_keys as $key) {
                    if ($key + 1 >= $sn_schedule_count) {
                        continue;
                    }
                    $tripSchedule = new TripScheduleModel();
                    $tripSchedule->trip_detail_id = $last_id;
                    $tripSchedule->start_date = $request->schedule_start_date[$key];
                    $tripSchedule->end_date = $request->schedule_end_date[$key];
                    // $tripSchedule->group_size = $request->schedule_group_size[$key];
                    $tripSchedule->availability = $request->schedule_availability[$key];
                    $tripSchedule->price = $request->schedule_price[$key];
                    // $tripSchedule->remarks = $request->schedule_remarks[$key];
                    $tripSchedule->ordering = $request->schedule_ordering[$key];
                    $tripSchedule->save();
                    $sn_schedule++;
                }
            }

            // Insert into faqs
            if (isset($request->faq_ordering)) {
                $faqs_keys = array_keys($request->faq_ordering);
                $sn_faqs = 1;
                $sn_faqs_count = count($request->faq_ordering);
                foreach ($faqs_keys as $key) {
                    if ($key + 1 >= $sn_faqs_count) {
                        continue;
                    }
                    $tripFaqs = new FaqModel();
                    $tripFaqs->trip_detail_id = $last_id;
                    $tripFaqs->ordering = $request->faq_ordering[$key];
                    $tripFaqs->title = $request->faq_title[$key];
                    $tripFaqs->content = $request->faq_content[$key];
                    $tripFaqs->save();
                    $sn_faqs++;
                }
            }

            // Insert into itinerary
            if (isset($request->itinerary_ordering)) {
                $keys = array_keys($request->itinerary_ordering);
                $sn_itinerary = 1;
                $sn_itinerary_count = count($request->itinerary_ordering);
                foreach ($keys as $key) {
                    if ($key + 1 >= $sn_itinerary_count) {
                        continue;
                    }
                    $tripItinerary = new TripItineraryModel();
                    $tripItinerary->trip_detail_id = $last_id;
                    $tripItinerary->ordering = $request->itinerary_ordering[$key];
                    $tripItinerary->days = $request->itinerary_days[$key];
                    $tripItinerary->title = $request->itinerary_title[$key];
                    $tripItinerary->max_altitude = $request->itinerary_max_altitude[$key];
                    $tripItinerary->distance = $request->itinerary_distance[$key];
                    $tripItinerary->duration = $request->itinerary_duration[$key];
                    $tripItinerary->content = $request->itinerary_content[$key];
                    $tripItinerary->save();
                    $sn_itinerary++;
                }
            }

            // Insert Photo Videos
            if (isset($request->gear_ordering)) {
                $gear_keys = array_keys($request->gear_ordering);
                $sn_gear = 1;
                $sn_gear_count = count($request->gear_ordering);
                foreach ($gear_keys as $key => $value) {
                    if ($key + 1 >= $sn_gear_count) {
                        continue;
                    }
                    $gearData = new TripGearModel();
                    $gearData->trip_detail_id = $last_id;
                    $thumb_file = $request->file('gear_thumbnail');
                    if (isset($thumb_file[$value])) {
                        $originalName = pathinfo($thumb_file[$value]->getClientOriginalName(), PATHINFO_FILENAME);
                        $thumb = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                        $destinationPath = public_path('uploads/original');
                        Image::make($thumb_file[$value]->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $thumb);
                        $gearData->thumbnail = $thumb;
                    }
                    $gearData->ordering = $request->gear_ordering[$key];
                    $gearData->title = $request->gear_title[$key];
                    $gearData->save();
                    $sn_gear++;
                }
            }
            //Insert Multiple Banner
            if (isset($request->banner_ordering)) {
                $banner_keys = array_keys($request->banner_ordering);
                $sn_banner = 1;
                $sn_banner_count = count($request->banner_ordering);

                foreach ($banner_keys as $key => $value) {
                    if ($key + 1 >= $sn_banner_count) {
                        continue;
                    }
                    $bannerData = new TripBanner();
                    $bannerData->trip_detail_id = $last_id;
                    $banner_file = $request->file('banner_banner');
                    // dd($banner_file);
                    if (isset($banner_file[$value])) {
                        $banner = time() . '-' . Str::random(5) . $banner_file[$value]->getClientOriginalName();
                        $destinationPath = public_path('uploads/original');
                        $banner_file[$value]->move($destinationPath, $banner);
                        $bannerData->banner = $banner;
                    }
                    $bannerData->ordering = $request->banner_ordering[$key];
                    $bannerData->title = $request->banner_title[$key];
                    $bannerData->save();
                    $sn_banner++;
                }
            }

            // Insert into testimonial
            if (isset($request->testimonial_ordering)) {
                $testimonial_keys = array_keys($request->testimonial_ordering);
                $sn_testimonial = 1;
                $sn_testimonial_count = count($request->testimonial_ordering);
                foreach ($testimonial_keys as $key) {
                    if ($key + 1 >= $sn_testimonial_count) {
                        continue;
                    }
                    $tripTestimonial = new CostIncludesModel();
                    $tripTestimonial->trip_detail_id = $last_id;
                    $tripTestimonial->ordering = $request->testimonial_ordering[$key];
                    $tripTestimonial->title = $request->testimonial_title[$key];
                    $tripTestimonial->save();
                    $sn_testimonial++;
                }
            }
            // Insert into Info
            if (isset($request->info_ordering)) {
                $info_keys = array_keys($request->info_ordering);
                $sn_info = 1;
                $sn_info_count = count($request->info_ordering);
                foreach ($info_keys as $key) {
                    if ($key + 1 >= $sn_info_count) {
                        continue;
                    }
                    $tripInfo = new CostExcludesModel();
                    $tripInfo->trip_detail_id = $last_id;
                    $tripInfo->ordering = $request->info_ordering[$key];
                    $tripInfo->title = $request->info_title[$key];
                    $tripInfo->save();
                    $sn_info++;
                }
            }

            /************Attach******************/
            $_data = TripModel::find($last_id);
            $_data->destinations()->attach($request->destination);
            $_data->regions()->attach($request->region);
            $_data->activities()->attach($request->activity);
            $_data->tripgroups()->attach($request->tripgroup);

            /************************************/
            return response()->json(['status' => 'success', 'message' => 'Trip Added Successfully']);
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $training = null)
    {
        $data = TripModel::find($id);
        $checked_destinations = array();
        $checked_regions = array();
        $checked_activities = array();
        $checked_tripgroups = array();


        foreach ($data->destinations as $value) {
            $checked_destinations[] = $value->pivot->destination_id;
        }
        foreach ($data->regions as $value) {
            $checked_regions[] = $value->pivot->region_id;
        }
        foreach ($data->activities as $value) {
            $checked_activities[] = $value->pivot->activity_id;
        }
        foreach ($data->tripgroups as $value) {
            $checked_tripgroups[] = $value->pivot->group_id;
        }

        $availability = array(
            'AVAILABLE' => 'AVAILABLE',
            'CLOSED' => 'CLOSED'
        );
        $destinations = DestinationModel::all();
        $regions = RegionModel::all();
        $activities = ActivityModel::all();
        $trip_groups = TripGroupModel::all();
        $schedules = $data->schedules()->orderBy('ordering', 'asc')->get();
        $faqs = $data->faqs()->orderBy('ordering', 'asc')->get();
        $itineraries = $data->itineraries()->orderBy('ordering', 'asc')->get();
        $gears = $data->gears()->orderBy('ordering', 'asc')->get();
        $banner = $data->banners()->orderBy('ordering', 'asc')->get();
        $costincludes = $data->costincludes()->orderBy('ordering', 'asc')->get();
        $costexcludes = $data->costexcludes()->orderBy('ordering', 'asc')->get();
        $all_trips = TripModel::get();
        $grades = TripGradeModel::all();
        $trip_type = TripTypeModel::get();
        $trek = TripGradeModel::get();
        $trekking = ActivityModel::where('activity_parent', 'trekking')->get();
        $expeditions = ActivityModel::where('activity_parent', 'expedition')->get();
        $activity = ActivityModel::where('activity_parent', 'activity')->get();
        $packages = ActivityModel::where('activity_parent', 'package')->get();
        if ($training) {
            $trip_type = TripTypeModel::where('trip_type', 'Package')->get();
            return view('admin.training-package.edit', compact('trek', 'all_trips', 'data', 'trip_type', 'destinations', 'regions', 'activities', 'trip_groups', 'checked_destinations', 'checked_regions', 'checked_activities', 'checked_tripgroups', 'schedules', 'itineraries', 'gears', 'costincludes', 'costexcludes', 'grades', 'banner', 'expeditions', 'trekking', 'availability', 'faqs', 'activity', 'packages'));
        }
        return view('admin.trips.edit', compact(
            'trek',
            'all_trips',
            'data',
            'trip_type',
            'destinations',
            'regions',
            'activities',
            'trip_groups',
            'checked_destinations',
            'checked_regions',
            'checked_activities',
            'checked_tripgroups',
            'schedules',
            'itineraries',
            'gears',
            'costincludes',
            'costexcludes',
            'grades',
            'banner',
            'expeditions',
            'trekking',
            'availability',
            'faqs',
            'activity',
            'packages'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            // dd('test', $request->all());
            $validator = Validator::make($request->all(), [
                'trip_title' => 'required|unique:cl_trip_details,trip_title,' . $id,
                'uri' => 'required|unique:cl_trip_details,uri,' . $id,
                'trip_type' => 'required',
                'destination' => 'required|array|min:1',
                'activity' => 'required|array|min:1',

                // Thumbnail
                'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1500,max_height=1500',
                // Trip Map
                'trip_map' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1500,max_height=1500',
                // Banner
                'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1600,max_height=1500',
                // gear images (array)
                'gear_thumbnail' => 'nullable|array',
                // validate each image
                'gear_thumbnail.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048|dimensions::max_width=1600,max_height=1200',
            ],
            [
                // Thumbnail messages
                'thumbnail.image' => 'Thumbnail must be an image.',
                'thumbnail.mimes' => 'Thumbnail must be JPG, JPEG, PNG or WEBP.',
                'thumbnail.max' => 'Thumbnail size must not exceed 2MB.',
                'thumbnail.dimensions' => 'Thumbnail must be less than 1500x1500 pixels.',

                // Trip Map messages
                'trip_map.image' => 'Trip map must be an image.',
                'trip_map.mimes' => 'Trip map must be JPG, JPEG, PNG or WEBP.',
                'trip_map.max' => 'Trip map size must not exceed 2MB.',
                'trip_map.dimensions' => 'Trip map must be less than 1500x1500 pixels.',

                // Banner messages
                'banner.image' => 'Banner must be an image.',
                'banner.mimes' => 'Banner must be JPG, JPEG, PNG or WEBP.',
                'banner.max' => 'Banner size must not exceed 2MB.',
                'banner.dimensions' => 'Banner must be less than 1600x1500 pixels.',

                // custom messages
                'gear_thumbnail.*.dimensions' => 'Each Photos must be less than 1600x1200 pixels.',
                'gear_thumbnail.*.image' => 'Photos must be valid images.',
                'gear_thumbnail.*.mimes' => 'Photos must be JPG, JPEG, PNG, or WEBP.',
                'gear_thumbnail.*.max' => 'Each Photos must be less than 2MB.',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()->all()
                ]);
            }

            $is_draft = 0;
            if ($request->submit == 'publish') {
                $is_draft = 0;
            } else if ($request->submit == 'draft') {
                $is_draft = 1;
            }

            $data = TripModel::find($id);

            $file = $request->file('banner');
            $thumbnail_file = $request->file('thumbnail');
            $tripmap_file = $request->file('trip_map');
            $tripchart_file = $request->file('trip_chart');
            $banner_name = '';
            $thumbnail_name = '';
            $trip_map_name = '';

            if ($request->hasFile('banner')) {
                if ($data->banner) {
                    $oldPath = env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $banner_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                $destinationPath = public_path('uploads/banners');
                Image::make($file->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $banner_name);
                $data->banner = $banner_name;
                $data->save();
            }

            /******PDF*********/
            $pdf_file = $request->file('upload_pdf');
            $pdf_name = '';
            if ($request->hasFile('upload_pdf')) {
                $data = TripModel::find($id);
                if ($data->upload_pdf) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/pdf/' . $data->upload_pdf)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/pdf/' . $data->upload_pdf);
                    }
                }
                $pdf = $request->file('upload_pdf')->getClientOriginalName();
                $extension = $request->file('upload_pdf')->getClientOriginalExtension();
                $pdf = explode('.', $pdf);
                $pdf_name = time() . '_' . Str::slug($pdf[0]) . '-' . Str::random(5) . '.' . $extension;
                $destinationPath = public_path('uploads/pdf');
                $pdf_file->move($destinationPath, $pdf_name);
                $data->trip_pdf = $pdf_name;
                $data->save();
            }

            /*****Thumbnail*****/
            if ($request->hasFile('thumbnail')) {
                $data = TripModel::find($id);
                if ($data->thumbnail) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail);
                    }
                }
                $originalName = pathinfo($thumbnail_file->getClientOriginalName(), PATHINFO_FILENAME);
                $thumbnail_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                $destinationPath = public_path('uploads/thumbnails');
                Image::make($thumbnail_file->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $thumbnail_name);
                $data->thumbnail = $thumbnail_name;
                $data->save();
            }

            /************Trip Map*************/
            if ($request->hasFile('trip_map')) {
                $data = TripModel::find($id);
                if ($data->trip_map) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map);
                    }
                }
                $originalName = pathinfo($tripmap_file->getClientOriginalName(), PATHINFO_FILENAME);
                $trip_map_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                $destinationPath = public_path('uploads/original');
                Image::make($tripmap_file->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $trip_map_name);
                $data->trip_map = $trip_map_name;
                $data->save();
            }
            /************Trip Chart*************/
            if ($request->hasfile('trip_chart')) {
                $data = TripModel::find($id);
                if ($data->trip_chart) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_chart)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_chart);
                    }
                }
                $trip_chart = $request->file('trip_chart')->getClientOriginalName();
                $extension = $request->file('trip_chart')->getClientOriginalExtension();
                $trip_chart = explode('.', $trip_chart);
                $trip_chart_name = Str::slug($trip_chart[0]) . '-' . Str::random(5) . '.' . $extension;
                $destinationPath = public_path('uploads/original');
                $trip_chart_picture = Image::make($tripchart_file->getRealPath());
                $width = Image::make($tripchart_file->getRealPath())->width();
                $height = Image::make($tripchart_file->getRealPath())->height();

                $trip_chart_picture->save($destinationPath . '/' . $trip_chart_name);
                $data->trip_chart = $trip_chart_name;
                $data->save();
            }
            $data->trip_title = $request->trip_title;
            $data->sub_title = $request->sub_title;
            $data->duration = $request->duration;
            $data->max_altitude = $request->max_altitude;
            $data->best_season = $request->best_season;
            $data->walking_per_day = $request->walking_per_day;
            $data->group_size = $request->group_size;
            $data->accommodation = $request->accommodation;
            $data->meals = $request->meals;
            $data->route = $request->route;
            $data->trip_highlight = $request->trip_highlight;
            $data->peak_name = $request->peak_name;
            $data->trip_type = $request->trip_type;
            $data->starting_price = $request->starting_price;
            $data->trip_video = $request->trip_video;
            $data->trip_excerpt = $request->trip_excerpt;
            $data->trip_content = $request->trip_content;
            $data->trip_grade = $request->trip_grade ? $request->trip_grade : '';
            $data->status_text = $request->status_text;
            $data->uri = Str::slug($request->uri);
            $data->ordering = $request->ordering;
            $data->trip_code = $request->trip_code;
            $data->meta_key = $request->meta_key;
            $data->meta_description = $request->meta_description;
            $data->meta_title = $request->meta_title;
            $data->is_draft = $is_draft;
            $data->video_status = $request->video_status;
            $data->start_date = $request->start_date;
            $data->price = $request->price;
            $data->discount = $request->discount;
            $data->banner_alt = $request->banner_alt;
            $data->thumbnail_alt = $request->thumbnail_alt;
            $data->tripmap_alt = $request->tripmap_alt;

            $_data = TripModel::find($id);
            $_data->destinations()->detach();
            $_data->destinations()->attach($request->destination);
            $_data->regions()->detach();
            $_data->regions()->attach($request->region);
            $_data->activities()->detach();
            $_data->activities()->attach($request->activity);
            $_data->tripgroups()->detach();
            $_data->tripgroups()->attach($request->tripgroup);
            $_data->relatedtrips()->detach();
            $_data->relatedtrips()->attach($request->related_trips);

            // Update Schedule
            if (isset($request->schedule_ordering)) {
                $schedule_keys = array_keys($request->schedule_ordering);
                $sn_schedule = 1;
                $sn_schedule_count = count($request->schedule_ordering);
                foreach ($schedule_keys as $key => $value) {
                    if ($key + 1 >= $sn_schedule_count) {
                        continue;
                    }
                    if ($request->schedule_id[$value] == "") {
                        $scheduleData = new TripScheduleModel();
                        $scheduleData->trip_detail_id = $data->id;
                        $scheduleData->ordering = $request->schedule_ordering[$key];
                        $scheduleData->start_date = $request->schedule_start_date[$key];
                        $scheduleData->end_date = $request->schedule_end_date[$key];
                        // $scheduleData->group_size = $request->schedule_group_size[$key];
                        $scheduleData->availability = $request->schedule_availability[$key];
                        $scheduleData->price = $request->schedule_price[$key];
                        // $scheduleData->remarks = $request->schedule_remarks[$key];
                        $scheduleData->save();
                    } else if ($request->schedule_id[$value] !== null && $request->schedule_id[$value] !== "") {
                        $schedule_id = $request->schedule_id[$value];
                        $scheduleData = TripScheduleModel::find($schedule_id);
                        $scheduleData->trip_detail_id = $data->id;
                        $scheduleData->ordering = $request->schedule_ordering[$key];
                        $scheduleData->start_date = $request->schedule_start_date[$key];
                        $scheduleData->end_date = $request->schedule_end_date[$key];
                        // $scheduleData->group_size = $request->schedule_group_size[$key];
                        $scheduleData->availability = $request->schedule_availability[$key];
                        $scheduleData->price = $request->schedule_price[$key];
                        // $scheduleData->remarks = $request->schedule_remarks[$key];
                        $scheduleData->save();
                    }
                    $sn_schedule++;
                }
            }

            // Update FAQs
            if (isset($request->faq_ordering)) {
                $faqs_keys = array_keys($request->faq_ordering);
                $sn_faq = 1;
                $sn_faq_count = count($request->faq_ordering);
                foreach ($faqs_keys as $key => $value) {
                    if ($key + 1 >= $sn_faq_count) {
                        continue;
                    }
                    if ($request->faq_id[$value] == "") {
                        $faqData = new FaqModel();
                        $faqData->trip_detail_id = $data->id;
                        $faqData->ordering = $request->faq_ordering[$key];
                        $faqData->title = $request->faq_title[$key];
                        $faqData->content = $request->faq_content[$key];
                        $faqData->save();
                    } else if ($request->faq_id[$value] !== null && $request->faq_id[$value] !== "") {
                        $faq_id = $request->faq_id[$value];
                        $faqData = FaqModel::find($faq_id);
                        $faqData->trip_detail_id = $data->id;
                        $faqData->ordering = $request->faq_ordering[$key];
                        $faqData->title = $request->faq_title[$key];
                        $faqData->content = $request->faq_content[$key];
                        $faqData->save();
                    }
                    $sn_faq++;
                }
            }
            // Update itinerary
            if (isset($request->itinerary_ordering)) {
                $keys = array_keys($request->itinerary_ordering);
                $sn_itinerary = 1;
                $sn_itinerary_count = count($request->itinerary_days);
                foreach ($keys as $key => $value) {
                    if ($key + 1 >= $sn_itinerary_count) {
                        continue;
                    }
                    if ($request->itinerary_content[$value] == NULL && $request->itinerary_title[$value] == NULL) {
                        continue;
                    }
                    if ($request->itinerary_id[$value] == "") {
                        $itineraryData = new TripItineraryModel();
                        $itineraryData->trip_detail_id = $data->id;
                        $itineraryData->ordering = $request->itinerary_ordering[$key];
                        $itineraryData->days = $request->itinerary_days[$key];
                        $itineraryData->title = $request->itinerary_title[$key];
                        $itineraryData->max_altitude = $request->itinerary_max_altitude[$key];
                        $itineraryData->distance = $request->itinerary_distance[$key];
                        $itineraryData->duration = $request->itinerary_duration[$key];
                        $itineraryData->content = $request->itinerary_content[$key];
                        $itineraryData->save();
                    } else if ($request->itinerary_id[$value] !== null && $request->itinerary_id[$value] !== "") {
                        $itinerary_id = $request->itinerary_id[$value];
                        $itineraryData = TripItineraryModel::find($itinerary_id);
                        $itineraryData->trip_detail_id = $data->id;
                        $itineraryData->ordering = $request->itinerary_ordering[$key];
                        $itineraryData->days = $request->itinerary_days[$key];
                        $itineraryData->title = $request->itinerary_title[$key];
                        $itineraryData->max_altitude = $request->itinerary_max_altitude[$key];
                        $itineraryData->distance = $request->itinerary_distance[$key];
                        $itineraryData->duration = $request->itinerary_duration[$key];
                        $itineraryData->content = $request->itinerary_content[$key];
                        $itineraryData->save();
                    }
                    $sn_itinerary++;
                }
            }

            // Update Photos Videos
            if (isset($request->gear_id)) {
                $gear_keys = array_keys($request->gear_id);
                $sn_gear = 1;
                $sn_gear_count = count($request->gear_id);

                foreach ($gear_keys as $key => $value) {
                    if ($key + 1 >= $sn_gear_count) {
                        continue;
                    }
                    if ($request->gear_id[$value] == "") {
                        $gearData = new TripGearModel();
                        $gearData->trip_detail_id = $data->id;
                        $thumb_file = $request->file('gear_thumbnail');
                        if (isset($thumb_file[$value])) {
                            $originalName = pathinfo($thumb_file[$value]->getClientOriginalName(), PATHINFO_FILENAME);
                            $thumb = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                            $destinationPath = public_path('uploads/original');
                            Image::make($thumb_file[$value]->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $thumb);
                            $gearData->thumbnail = $thumb;
                        }
                        $gearData->ordering = $request->gear_ordering[$key];
                        $gearData->title = $request->gear_title[$key];
                        $gearData->save();
                    } else if ($request->gear_id[$value] !== null && $request->gear_id[$value] !== "") {
                        $gear_id = $request->gear_id[$value];
                        $gearData = TripGearModel::find($gear_id);

                        $thumb_file = $request->file('gear_thumbnail');
                        if (isset($thumb_file[$key])) {
                            if ($gearData->thumbnail) {
                                if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $gearData->thumbnail)) {
                                    unlink(env('PUBLIC_PATH') . 'uploads/original/' . $gearData->thumbnail);
                                }
                            }
                            $originalName = pathinfo($thumb_file[$key]->getClientOriginalName(), PATHINFO_FILENAME);
                            $thumb = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                            $destinationPath = public_path('uploads/original');
                            Image::make($thumb_file[$key]->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $thumb);
                            $gearData->thumbnail = $thumb;
                        }
                        $gearData->trip_detail_id = $data->id;
                        $gearData->ordering = $request->gear_ordering[$key];
                        $gearData->title = $request->gear_title[$key];
                        $gearData->save();
                    }

                    $sn_gear++;
                }
            }


            if (isset($request->banner_id)) {
                $banner_keys = array_keys($request->banner_id);
                $sn_banner = 1;
                $sn_banner_count = count($request->banner_id);

                foreach ($banner_keys as $key => $value) {
                    if ($key + 1 >= $sn_banner_count) {
                        continue;
                    }
                    if ($request->banner_id[$value] == "") {

                        $bannerData = new TripBanner();
                        $bannerData->trip_detail_id = $data->id;
                        $banner_file = $request->file('banner_banner');
                        if (isset($banner_file[$value])) {
                            $banner = time() . '-' . Str::random(5) . $banner_file[$value]->getClientOriginalName();
                            $destinationPath = public_path('uploads/original');
                            $banner_file[$value]->move($destinationPath, $banner);
                            $bannerData->banner = $banner;
                        }
                        // dd($banner);
                        $bannerData->ordering = $request->banner_ordering[$key];
                        $bannerData->title = $request->banner_title[$key];

                        $bannerData->save();
                    } else if ($request->banner_id[$value] !== null && $request->banner_id[$value] !== "") {
                        $banner_id = $request->banner_id[$value];
                        $bannerData = TripBanner::find($banner_id);

                        $banner_file = $request->file('banner_banner');
                        if (isset($banner_file[$key])) {

                            if ($bannerData->banner) {
                                if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $bannerData->banner)) {
                                    unlink(env('PUBLIC_PATH') . 'uploads/original/' . $bannerData->banner);
                                }
                            }
                            $banner = time() . '-' . Str::random(5) . $banner_file[$key]->getClientOriginalName();
                            $destinationPath = public_path('uploads/original');
                            $banner_file[$key]->move($destinationPath, $banner);
                            $bannerData->banner = $banner;
                        }
                        $bannerData->trip_detail_id = $data->id;
                        $bannerData->ordering = $request->banner_ordering[$key];
                        $bannerData->title = $request->banner_title[$key];

                        $bannerData->save();
                    }

                    $sn_banner++;
                }
            }
            // Update cost includes
            if (isset($request->testimonial_ordering)) {
                $costincludes_keys = array_keys($request->testimonial_ordering);
                $sn_testimonial = 1;
                $sn_testimonial_count = count($request->testimonial_ordering);
                foreach ($costincludes_keys as $key => $value) {
                    if ($key + 1 >= $sn_testimonial_count) {
                        continue;
                    }
                    if ($request->testimonial_id[$value] == "") {
                        $testimonialData = new CostIncludesModel();
                        $testimonialData->trip_detail_id = $data->id;
                        $testimonialData->ordering = $request->testimonial_ordering[$key];
                        $testimonialData->title = $request->testimonial_title[$key];
                        // $testimonialData->content = $request->testimonial_content[$key];
                        $testimonialData->save();
                    } else if ($request->testimonial_id[$value] !== null && $request->testimonial_id[$value] !== "") {
                        $testimonial_id = $request->testimonial_id[$value];
                        $testimonialData = CostIncludesModel::find($testimonial_id);
                        $testimonialData->trip_detail_id = $data->id;
                        $testimonialData->ordering = $request->testimonial_ordering[$key];
                        $testimonialData->title = $request->testimonial_title[$key];
                        // $testimonialData->content = $request->testimonial_content[$key];
                        $testimonialData->save();
                    }
                    $sn_testimonial++;
                }
            }
            // Update cost excludes
            if (isset($request->info_id)) {
                $info_keys = array_keys($request->info_id);
                $sn_info = 1;
                $sn_info_count = count($request->info_id);
                foreach ($info_keys as $key => $value) {
                    if ($key + 1 >= $sn_info_count) {
                        continue;
                    }
                    if ($request->info_id[$value] == "") {
                        $infoData = new CostExcludesModel();
                        $infoData->trip_detail_id = $data->id;
                        $infoData->ordering = $request->info_ordering[$key];
                        $infoData->title = $request->info_title[$key];
                        // $infoData->content = $request->info_content[$key];
                        $infoData->save();
                    } else if ($request->info_id[$value] !== null && $request->info_id[$value] !== "") {
                        $info_id = $request->info_id[$value];
                        $infoData = CostExcludesModel::find($info_id);
                        $infoData->trip_detail_id = $data->id;
                        $infoData->ordering = $request->info_ordering[$key];
                        $infoData->title = $request->info_title[$key];
                        // $infoData->content = $request->info_content[$key];
                        $infoData->save();
                    }
                    $sn_info++;
                }
            }


            $data->save();
            return response()->json(['status' => 'success', 'message' => 'Trip Update Successful!']);
        }
        return false;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TripModel::find($id);
        if ($data->banner != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        if ($data->thumbnail != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
            }
        }
        if ($data->trip_map != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map);
            }
        }
        if ($data->trip_chart != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_chart)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_chart);
            }
        }
        if ($data->trip_pdf != null) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/pdf/' . $data->trip_pdf)) {
                unlink(env('PUBLIC_PATH') . 'uploads/pdf/' . $data->trip_pdf);
            }
        }

        $data->destinations()->detach();
        $data->regions()->detach();
        $data->activities()->detach();
        $data->tripgroups()->detach();
        $data->itineraries()->delete();
        $data->costincludes()->delete();
        $data->costexcludes()->delete();
        $data->schedules()->delete();
        $data->gears()->delete();

        $data->delete();
        return 'Delete Successful';
    }

    // Delete Trip Thumbnail
    public function delete_trip_thumb(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
            }
        }
        $data->thumbnail = null;
        $data->save();
        return response('Delete Successful.');
    }

    // Delete Trip Banner
    public function delete_trip_banner(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        $data->banner = null;
        $data->save();
        return response('Delete Successful.');
    }

    // Delete Map
    public function delete_map(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->trip_map) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map);
            }
        }
        $data->trip_map = null;
        $data->save();
        return response('Delete Successful.');
    }

    public function delete_chart(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->trip_chart) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_chart)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_chart);
            }
        }
        $data->trip_chart = null;
        $data->save();
        return response('Delete Successful.');
    }

    public function delete_pdf(TripModel $tripModel, $id)
    {
        $data = TripModel::find($id);
        if ($data->trip_pdf) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/pdf/' . $data->trip_pdf)) {
                unlink(env('PUBLIC_PATH') . 'uploads/pdf/' . $data->trip_pdf);
            }
        }
        $data->trip_pdf = null;
        $data->save();
        return response('Delete Successful.');
    }

    public function tripstatus($id)
    {
        $data = TripModel::find($id);
        if ($data->status == '1') {
            $data->status = '0';
            $data->save();
            return 'Success';
        } else if ($data->status == '0') {
            $data->status = '1';
            $data->save();
            return 'Success';
        }
        return 'Not success';
    }

    public function trip_of_the_month(Request $request)
    {
        $data = TripModel::find($request->id);
        $data->update([
            'trip_of_the_month' => $data->trip_of_the_month === '1' ? '0' : '1'
        ]);

        return back()->with([
            'status' => 'success',
            'message' => 'Trip Updated Successfully!'
        ]);
    }

}
