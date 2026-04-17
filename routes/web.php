<?php

use App\Http\Controllers\DirectPayController;
use App\Http\Controllers\FrontendControllers\FrontpageController;
use App\Http\Controllers\HBLController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', 'FrontendControllers\FrontpageController@sitemap');
/************************** Sangam Routes Starts *********************************/
Route::get('/himalayan/payment/verify/{data}',[HBLController::class,'payment_verify'])->name('himalayan.payment.verify');
Route::any('/himalayan/success',[HBLController::class,'success'])->name('himalayan.success');
Route::any('/himalayan/failed',[HBLController::class,'failure'])->name('himalayan.failure');
Route::get('/himalayan-bank/response/{id?}', [HBLController::class, 'response'])->name('himalayan.payment.response');
Route::get('/payment-direct', [DirectPayController::class,'payment_direct'])->name('payment.direct');
Route::post('/payment-store', [DirectPayController::class,'payment_store'])->name('payment.store');
Route::get('/payment-verify/{id}', [DirectPayController::class,'payment_verify'])->name('payment.verify');
Route::any('/payment/success', [DirectPayController::class,'success'])->name('payment.success');
Route::any('/payment/failed', [DirectPayController::class,'failure'])->name('payment.failure');
Route::get('/payment/response/{id?}', [DirectPayController::class, 'response'])->name('payment.response');
/************************** Sangam Routes Ends ***********************************/

Route::get('/', 'FrontendControllers\FrontpageController@index')->name('index.front');

/* Authentication Routes... */
Route::get('adminisclient', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('adminisclient', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');
Route::redirect('/dashboard', '/admin/dashboard', 301);
//for captcha refresh

//================== Frontend Routes=================//
Route::post('subscribe', 'FrontendControllers\FrontpageController@subscribe')->name('subscribe');
Route::get('/verify/{token}', 'FrontendControllers\FrontpageController@verifyUser')->name('verify-user');
Route::get('/contact-verify/{token}', 'FrontendControllers\FrontpageController@verifyContact')->name('verify-contact');

// Normal Pages
Route::get('blogs/{uri}', 'FrontendControllers\FrontpageController@pagedetail')->name('page.pagedetail');
Route::get('team/{uri}', 'FrontendControllers\FrontpageController@pagedetail')->name('page.teamdetail');
Route::get('company/{uri}', 'FrontendControllers\FrontpageController@posttype')->name('page.posttype_detail');

Route::get('expeditions/{uri}', 'FrontendControllers\FrontpageController@trip_lists')->name('expedition-list');
Route::get('treks/{uri}', 'FrontendControllers\FrontpageController@trip_lists')->name('trekking-list');
Route::get('tours/{uri}', 'FrontendControllers\FrontpageController@trip_lists')->name('tour-list');
Route::get('reviews', 'FrontendControllers\FrontpageController@all_reviews')->name('reviews');
Route::post('reviews', 'FrontendControllers\FrontpageController@review_post')->name('review.post');

// Route::get('page/expedition/{uri}.html', 'FrontendControllers\FrontpageController@expedition')->name('expedition-list');
// Route::get('page/tour.html', 'FrontendControllers\FrontpageController@tour')->name('tour');
// Route::get('page/trekking-region/{uri}.html', 'FrontendControllers\FrontpageController@trekking')->name('trekking-list');
// Route::get('page/package/{uri}.html', 'FrontendControllers\FrontpageController@package')->name('package-list');
// Route::get('package/{uri}', 'FrontendControllers\FrontpageController@packageDetail')->name('packageDetail');

// for captcha
Route::get('captcha', 'CaptchaController@refreshCaptcha');

// Trip Pages
Route::get('plan-trip', 'FrontendControllers\FrontpageController@plan_trip')->name('plan-trip');
Route::get('customize-trip/{uri}', 'FrontendControllers\FrontpageController@customize_post')->name('customize-trip');
Route::post('custom-trip-submit', 'FrontendControllers\FrontpageController@custom_trip_post')->name('custom-trip-post');
Route::post('tell-friend-submit', 'FrontendControllers\FrontpageController@tell_friend_post')->name('tell-friend-post');
Route::get('book-trip/{uri}', 'FrontendControllers\FrontpageController@book_trip')->name('book-trip');

Route::get('book-now', 'FrontendControllers\FrontpageController@book_now')->name('book-now');
Route::get('/get-trips', 'FrontendControllers\FrontpageController@getTrips')->name('getTripsActivity');
Route::any('book/{uri}.html', 'FrontendControllers\FrontpageController@showbooking')->name('page.booking');
Route::get('booking-success', 'FrontendControllers\FrontpageController@showbookingsuccess')->name('page.bookingsuccess');
// Route::get('page/{uri}.html', 'FrontendControllers\FrontpageController@tripdetail')->name('page.tripdetail');
Route::get('trip/{uri}', 'FrontendControllers\FrontpageController@tripdetail')->name('trip.tripdetail');
Route::get('/download-trip/{uri}','FrontendControllers\FrontpageController@downloadPdf')->name('trip.download');

Route::get('activity/{uri}.html', 'FrontendControllers\FrontpageController@travellist')->name('page.activitydetail');
Route::get('region/{uri}.html', 'FrontendControllers\FrontpageController@regionlist')->name('page.regionlist');
// Route::get('tours', 'FrontendControllers\FrontpageController@destinationlist')->name('page.destinationlist');
Route::get('/trips/search', 'FrontendControllers\FrontpageController@show_search_list')->name('trip.search');
Route::any('search-trip', 'FrontendControllers\FrontpageController@show_search_form')->name('search-trip');
Route::post('store/trip/tailormade', 'FrontendControllers\FrontpageController@store_tailormade')->name('tailormade');
Route::post('store/trip/filmmaking', 'FrontendControllers\FrontpageController@store_filmmaking')->name('filmmaking');
Route::post('booking-now', 'FrontendControllers\FrontpageController@booking_now')->name('post-booknow');
Route::post('enroll-now', 'FrontendControllers\FrontpageController@enroll_now')->name('post-enrollment');
Route::get('inquiry-now/{uri?}', 'FrontendControllers\FrontpageController@inquiry_now')->name('inquiry-now');
Route::post('inquiry', 'FrontendControllers\FrontpageController@post_inquiry')->name('post-inquiry');
Route::post('contact', 'FrontendControllers\FrontpageController@contact_us')->name('contact');
Route::get('page/activities/{uri}', 'FrontendControllers\FrontpageController@activities')->name('page.activities');
Route::post('page/customize-trip', 'FrontendControllers\FrontpageController@customize_trip')->name('customize-trip.post');
Route::any('search-page', 'FrontendControllers\FrontpageController@search_all')->name('search-all');
Route::get('activity-list', 'FrontendControllers\FrontpageController@activitylist')->name('page.activitylist');
Route::get('trekking-list', 'FrontendControllers\FrontpageController@trekkinglist')->name('page.trekkinglist');
Route::get('expedition-list', 'FrontendControllers\FrontpageController@expeditionlist')->name('page.expeditionlist');
Route::get('related-list/{tripId}', 'FrontendControllers\FrontpageController@relatedlist')->name('page.relatedlist');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
//================================= Backend Routes ============================//
Route::middleware(['auth'])->group(function () {

    Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('admin/userprofile', 'AdminControllers\Members\UserController@userprofile')->name('admin.userprofile');
    Route::put('admin/update_password', 'AdminControllers\Members\UserController@update_password')->name('admin.update_password');
    Route::get('admin/changepassword', 'AdminControllers\Members\UserController@changepassword')->name('admin.changepassword');

    Route::resources([
        'admin/user' => 'AdminControllers\Members\UserController',
        'admin/banner' => 'AdminControllers\Banners\BannerController',
        'admin/postcategory' => 'AdminControllers\Posts\PostCategoryController',
        'admin/settings' => 'AdminControllers\Settings\SettingController',
        'admin/trip' => 'AdminControllers\Travels\TripController',
        'admin/region' => 'AdminControllers\Travels\RegionController',
        'admin/activity' => 'AdminControllers\Travels\ActivityController',
        'admin/tripgroup' => 'AdminControllers\Travels\TripGroupController',
        'admin/destination' => 'AdminControllers\Destinations\DestinationController',
        'admin/teams' => 'AdminControllers\Teams\TeamController',
        'admin/teamcategory'=>'AdminControllers\Teams\TeamCategoryController',
        'admin.testimonials' => 'AdminControllers\Cost\CostIncludesController',
        'admin.trip-gear' => 'AdminControllers\Travels\TripGearController',
        'category-inquiry' => 'AdminControllers\Inquiry\TripFilmMakingController',
        'tailor-made' => 'AdminControllers\Inquiry\TripTailorMadeController',
        'trip-inquiry' => 'AdminControllers\Inquiry\TripInquiryController',
        'training-enrollment' => 'AdminControllers\Inquiry\EnrollmentController',
        'contact-us' => 'AdminControllers\Inquiry\TripBookingController',
        'admin.faq' => 'AdminControllers\Faqs\FaqController',

    ]);
    // For all trips Only for Developer 
    Route::get('admin/alltrips','AdminControllers\Travels\TripController@alltrips')->name('admin.trip.all');
    // Upto here
    
    Route::get('trip-customize','AdminControllers\Inquiry\TripCustomizeController@index')->name('admin.trip.customize');
    Route::get('trip-plan','AdminControllers\Inquiry\TripCustomizeController@showplan')->name('admin.trip.plan');
    Route::get('trip-private','AdminControllers\Inquiry\TripCustomizeController@showprivate')->name('admin.trip.private');
    Route::get('trip-suggestion','AdminControllers\Inquiry\TripCustomizeController@showsuggestion')->name('admin.trip.suggestion');
    Route::delete('trip-customize/{id}','AdminControllers\Inquiry\TripCustomizeController@destroy')->name('trip-customize.destroy');
    Route::delete('trip-suggestion/{id}','AdminControllers\Inquiry\TripCustomizeController@destroySuggestion')->name('trip-suggestion.destroy');



    Route::get('admin/training-list/{training}','AdminControllers\Travels\TripController@index')->name('training.list.index');
    Route::get('admin/training-list/create/{training}', 'AdminControllers\Travels\TripController@create')->name('training.list.create');
    Route::get('admin/training-list/edit/{uri}/{training}', 'AdminControllers\Travels\TripController@edit')->name('training.list.edit');
    Route::post('banner-isdefault/{id?}', 'AdminControllers\Banners\BannerController@isdefault')->name('banner.isdefault');
    Route::post('activity-isdefault/{id?}', 'AdminControllers\Travels\ActivityController@isdefault')->name('activity.isdefault');
    Route::get('admin/tour-trip/{id}', 'AdminControllers\Destinations\DestinationController@filter'); //Was trip-expedition
    Route::get('admin/trip-region/{id}', 'AdminControllers\Travels\RegionController@filter');
    Route::put('tripstatus/{id}', 'AdminControllers\Travels\TripController@tripstatus')->name('admin.tripstatus');

    //for home brief
    Route::get('admin/home/brief', 'AdminControllers\HomeBrief\HomeBriefController@index');
    Route::get('admin/home/brief/add', 'AdminControllers\HomeBrief\HomeBriefController@create')->name('home_brief.add');
    Route::post('admin/home/brief/store', 'AdminControllers\HomeBrief\HomeBriefController@store');
    Route::put('admin/home/brief/update/{id}', 'AdminControllers\HomeBrief\HomeBriefController@update')->name('home_brief.update');
    Route::delete('delete_pic1/{id}', 'AdminControllers\HomeBrief\HomeBriefController@pic1_destory')->name('pic1-destroy');
    Route::delete('delete_pic2/{id}', 'AdminControllers\HomeBrief\HomeBriefController@pic2_destory')->name('pic2-destroy');
    Route::delete('delete_pic3/{id}', 'AdminControllers\HomeBrief\HomeBriefController@pic3_destory')->name('pic3-destroy');
    Route::delete('video/{id}', 'AdminControllers\HomeBrief\HomeBriefController@video_delete')->name('video_delete');

    // For posttype
    Route::get('type/{posttype}', 'AdminControllers\Posts\PostTypeController@index')->name('type.posttype.index');
    Route::get('type/{posttype}/create', 'AdminControllers\Posts\PostTypeController@create')->name('type.posttype.create');
    Route::post('type/{posttype}/store', 'AdminControllers\Posts\PostTypeController@store')->name('type.posttype.store');
    Route::put('type/{posttype}/{id}', 'AdminControllers\Posts\PostTypeController@update')->name('type.posttype.update');
    Route::get('type/{posttype}/{id}/edit', 'AdminControllers\Posts\PostTypeController@edit')->name('type.posttype.edit');
    Route::delete('type/{posttype}/{id}', 'AdminControllers\Posts\PostTypeController@destroy')->name('type.posttype.destroy');
    Route::delete('delete_posttype_thumb/{id}', 'AdminControllers\Posts\PostTypeController@delete_posttype_thumb');


    // For post
    Route::get('admin/{post}', 'AdminControllers\Posts\PostController@index')->name('admin.post.index');
    Route::get('admin/{post}/create', 'AdminControllers\Posts\PostController@create')->name('admin.post.create');
    Route::post('admin/{post}/store', 'AdminControllers\Posts\PostController@store')->name('admin.post.store');
    Route::put('admin/{post}/{id}', 'AdminControllers\Posts\PostController@update')->name('admin.post.update');
    Route::get('admin/{post}/{id}/edit', 'AdminControllers\Posts\PostController@edit')->name('admin.post.edit');
    Route::delete('admin/{post}/{id}', 'AdminControllers\Posts\PostController@destroy')->name('admin.post.destroy');
    Route::get('admin/{post}/{id}', 'AdminControllers\Posts\PostController@childlist')->name('post.childlist');

    // Delete Thumbnails, Banners, PDF
    // Route::delete('delete/trip','AdminControllers\Travels\TripController\destory')->name('delete-trip');
    Route::delete('delete_post_banner/{id}', 'AdminControllers\Posts\PostController@delete_post_banner');
    Route::delete('delete_post_thumb/{id}', 'AdminControllers\Posts\PostController@delete_post_thumb');
    Route::delete('thumbdelete/{id}', 'AdminControllers\Teams\TeamController@thumbdelete');
    Route::delete('bannerdelete/{id}', 'AdminControllers\Teams\TeamController@bannerdelete');
    Route::delete('delete_activity_thumb/{id}', 'AdminControllers\Travels\ActivityController@delete_activity_thumb');
    Route::delete('delete_activity_icon/{id}', 'AdminControllers\Travels\ActivityController@delete_activity_icon');
    Route::delete('delete_tripgroup_thumb/{id}', 'AdminControllers\Travels\TripGroupController@delete_tripgroup_thumb');
    Route::delete('delete_destination_banner/{id}', 'AdminControllers\Destinations\DestinationController@delete_banner')->name('delete-destination-banner');
    Route::delete('delete_destination_thumb/{id}', 'AdminControllers\Destinations\DestinationController@delete_thumb')->name('delete-destination-thumb');
    Route::delete('delete_region_banner/{id}', 'AdminControllers\Travels\RegionController@delete_region_banner');
    Route::delete('delete_region_thumb/{id}', 'AdminControllers\Travels\RegionController@delete_region_thumb');
    Route::delete('delete_gear_thumb/{id}', 'AdminControllers\Travels\TripGearController@delete_gear_thumb')->name('delete_gear_thumb');
    Route::delete('delete_trip_thumb/{id}', 'AdminControllers\Travels\TripController@delete_trip_thumb');
    Route::delete('delete_trip_banner/{id}', 'AdminControllers\Travels\TripController@delete_trip_banner');
    Route::delete('delete_map/{id}', 'AdminControllers\Travels\TripController@delete_map');
    Route::delete('delete_chart/{id}', 'AdminControllers\Travels\TripController@delete_chart');
    Route::delete('delete_pdf/{id}', 'AdminControllers\Travels\TripController@delete_pdf');
    Route::delete('delete_trip_thumb/{id}', 'AdminControllers\Travels\TripController@delete_trip_thumb');
    Route::delete('delete_trip_banner_thumb/{id}', 'AdminControllers\Travels\TripController@delete_trip_banner_thumb');
    Route::delete('delete_map_thumb/{id}', 'AdminControllers\Travels\TripController@delete_map_thumb');
    // Route::delete('delete_activity_banner/{id}', 'AdminControllers\Travels\ActivityGroupController@delete_activity_banner');
    Route::get('delete_worked_with/{id}', 'AdminControllers\Settings\SettingController@banner_destroy')->name('banner-destroy');
    Route::get('delete_affililiated_with/{id}', 'AdminControllers\Settings\SettingController@mobile_banner_destroy')->name('mob-banner-destroy');
    Route::get('delete_flight_photo/{id}', 'AdminControllers\Settings\SettingController@flight_photo_delete')->name('flight_photo_delete');
    Route::get('delete-affiliated/{id}', 'AdminControllers\Settings\SettingController@affiliated_destory')->name('affiliated_destory');
    Route::get('delete-affiliated_photo/{id}', 'AdminControllers\Settings\SettingController@affiliated_destory')->name('affiliated_photo_destory');

    // Multiplephoto post

    Route::get('adminimg/multiplephoto/{post_id}', 'AdminControllers\Posts\PostImageController@upload_form')->name('admin.multiplephoto');
    Route::post('multiplephoto/store', 'AdminControllers\Posts\PostImageController@store')->name('multiplephoto.store');
    Route::get('adminimg/multiplephoto/{post_id}/{id}/edit', 'AdminControllers\Posts\PostImageController@edit')->name('edit.multiplephoto');
    Route::put('adminimg/multiplephoto/{id}', 'AdminControllers\Posts\PostImageController@update')->name('multiplephoto.update');
    Route::delete('adminimg/multiplephoto/{id}', 'AdminControllers\Posts\PostImageController@destroy');


    // Associated post
    Route::get('admin/associated/{type}/{id}', 'AdminControllers\Posts\AssociatedPostController@associated_post')->name('associated.post.index');
    Route::get('admin/associated/{type}/{id}/create', 'AdminControllers\Posts\AssociatedPostController@create')->name('admin.associated.create');
    Route::post('admin/associated/{type}/{id}/store', 'AdminControllers\Posts\AssociatedPostController@store')->name('admin.associated.store');
    Route::delete('admin/associated/{type}/{id}', 'AdminControllers\Posts\AssociatedPostController@destroy')->name('admin.associated.destroy');
    Route::get('admin/associated/{type}/{id}/edit', 'AdminControllers\Posts\AssociatedPostController@edit')->name('admin.associated.edit');
    Route::put('admin/associated/{type}/{id}', 'AdminControllers\Posts\AssociatedPostController@update')->name('admin.associated.update');
    //schedules
    Route::delete('admin/schedule/{id}/{info_id}', 'AdminControllers\Travels\TripScheduleController@destroy')->name('schedule.destroy');

    // cost excludes
    Route::delete('admin/trip/{id}/{info_id}', 'AdminControllers\Cost\CostExcludesController@destroy')->name('supporting-info.destroy');
    Route::delete('admin/itinerary/{id?}/{info_id?}', 'AdminControllers\Travels\TripItineraryController@destroy')->name('itinerary.destroy');
    //for trip banner
    Route::delete('admin/banner/{id}/{banner_id}', 'AdminControllers\Travels\TripBannerController@destory')->name('trip_banner_destory');
    Route::delete('delete_banner_thumb/{id}', 'AdminControllers\Travels\TripBannerController@delete_banner_thumb')->name('delete_banner_thumb');
    Route::post('admin/gear_thumb_update/{id}', 'AdminControllers\Travels\TripGearController@gear_thumb_update')->name('gear_thumb_update');
    //Trip Review (Bibek)
    Route::get('admin-trip-review', 'AdminControllers\Review\TripReviewController@trip_review')->name('trip-review');
    Route::any('admin-trip-review/create-review', 'AdminControllers\Review\TripReviewController@post_trip_review')->name('post-trip-review');
    Route::post('admin-review-status', 'AdminControllers\Review\TripReviewController@review_status')->name('review-status');
    Route::get('admin-trip-edit-review/{id?}/edit', 'AdminControllers\Review\TripReviewController@edit_trip_review');
    Route::post('admin-trip-edit-review/{id?}', 'AdminControllers\Review\TripReviewController@edit_trip_review')->name('edit-trip-review');
    Route::get('admin-trip-delete-review/{id?}', 'AdminControllers\Review\TripReviewController@delete_trip_review')->name('delete-trip-review');

    //Trip Booking (Bibek)
    Route::get('admin-trip-booking', 'AdminControllers\Inquiry\TripBookingController@trip_booking')->name('trip-booking');
    Route::get('admin-trip-booking/{id}', 'AdminControllers\Inquiry\TripBookingController@view_trip_booking')->name('view-trip-booking');
    Route::get('admin-trip-booking-delete/{id?}', 'AdminControllers\Inquiry\TripBookingController@trip_booking_delete')->name('delete-booking');
    Route::get('admin-trip-booking\update-status/{id?}', 'AdminControllers\Inquiry\TripBookingController@update_status')->name('booking.update.status');

    // newsletter routes
    Route::get('send-newsletter', 'SendMailController@index')->name('send.newsletter');
    Route::post('users-send-email', 'SendMailController@sendEmail')->name('ajax.send.email');
    Route::get('newsletter-create', 'SendMailController@newsletter')->name('newsletter.create');
    Route::post('newsletters', 'SendMailController@newsletter')->name('newsletter.submit');
    Route::get('newsletter-index', 'SendMailController@newsindex')->name('newsletter.index');
    Route::get('newsletter-edit/{id?}', 'SendMailController@newsedit')->name('newsletter.edit');
    Route::get('newsletter-delete/{id?}', 'SendMailController@newsdelete')->name('newsletter.delete');
    Route::get('subscriber-create', 'SendMailController@usercreate')->name('subscriber.create');
    Route::post('subscriber-create', 'SendMailController@usercreate')->name('subscriber.submit');
    Route::get('subscriber-index', 'SendMailController@userindex')->name('subscriber.index');
    Route::get('subscriber-edit/{id?}', 'SendMailController@useredit')->name('subscriber.update');
    Route::post('subscriber-edit/{id?}', 'SendMailController@useredit')->name('subscriber.edit');
    Route::get('subscriber-delete/{id?}', 'SendMailController@userdelete')->name('user.delete');

    // Delete image
    Route::delete('delete_video/{id}', 'AdminControllers\Banners\BannerController@delete_video')->name('delete_video');
    Route::delete('delete_pic/{id}', 'AdminControllers\Banners\BannerController@delete_pic')->name('delete_pic');

    Route::get('destination/banner/{id}', 'AdminControllers\Destinations\DestinationBannerController@index')->name('destination.page.index');
    Route::post('destination/create', 'AdminControllers\Destinations\DestinationBannerController@store')->name('destination.page.store');
    Route::delete('delete_banner_destination/{id}', 'AdminControllers\Destinations\DestinationBannerController@delete_banner_destination')->name('delete_banner_destination');


    Route::get('activity/banner/{id}', 'AdminControllers\Travels\ActivityBannerController@index')->name('activity.banner.index');
    Route::post('activity/create', 'AdminControllers\Travels\ActivityBannerController@store')->name('activity.banner.store');
    Route::delete('delete_banner_activity/{id}', 'AdminControllers\Travels\ActivityBannerController@delete_banner_activity')->name('delete_banner_activity');

    Route::post('trip_of_the_month/{id?}', 'AdminControllers\Travels\TripController@trip_of_the_month')->name('trip_of_the_month');

    View::composer(['*'], function ($view) {
        $posttype = App\Models\Posts\PostTypeModel::orderBy('ordering', 'asc')->get();
        $view->with('posttype', $posttype);
    });

    Route::delete('admin/certificates/{id}/{info_id}','AdminControllers\Teams\TeamController@certificatesdestroy')->name('certificates.destroy');


    /************** Sangam Starts ****************/
    Route::get('/payment/index',[DirectPayController::class,'index'])->name('payment.index');
    Route::get('/payment/show/{id}',[DirectPayController::class,'show'])->name('payment.show');
    Route::get('/payment/delete/{id}',[DirectPayController::class,'delete'])->name('payment.delete');
    /************** Sangam Ends ******************/
});
