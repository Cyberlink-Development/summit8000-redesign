<?php

namespace App\Http\Controllers\AdminControllers\Review;

use App\Http\Controllers\Controller;
use App\Model\TripReview;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TripReviewController extends Controller
{
    public function trip_review(Request $request)
    {
        $review = TripReview::orderby('id', 'desc')->get();
        $trip = TripModel::all();
        return view('admin.trip-reviews.index', compact('review', 'trip'));
    }

    public function post_trip_review(Request $request)
    {
        //   dd($request->all());
        if ($request->isMethod('get')) {
            $trip = TripModel::all();
            return view('admin.trip-reviews.create', compact('trip'));
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required',
                'country' => 'required',
                //   'email' => 'required',
                //    'contact' => 'required',
                'message' => 'required',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

            $data = $request->except('photo');
            $data['trip_id'] = $request->trip_id ?? NULL;

            $trip = TripModel::where('id', $request->trip_id)->first();
            If($trip){
                $data['trip_title'] = $trip->trip_title;
            }

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/reviews/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            TripReview::create($data);

            return redirect()->back()->with('success', 'Review posted successfully');
        }
    }

    public function delete_file($id)
    {
        $findData = TripReview::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('uploads/reviews/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function edit_trip_review(Request $request, $id)
    {
        if ($request->isMethod('get')) {

            $trip = TripModel::all();
            $data = TripReview::findorfail($id);
            return view('admin.trip-reviews.edit', compact('trip', 'data'));
        }

        if ($request->isMethod('post')) {
            $id = $request->id;
            // $request->validate([
            //     'full_name'=>'required',
            //     'brief'=>'required',
            // ]);
            $data['trip_id'] = $request->trip_id;
            $data['full_name'] = $request->full_name;
            $data['title'] = $request->title;
            $data['country'] = $request->country;
            $data['email'] = $request->email;
            $data['contact'] = $request->contact;
            $data['message'] = $request->message;
            $trip = TripModel::where('id', $request->trip_id)->first();
            $data['trip_title'] = $trip->trip_title;


            if ($request->hasFile('photo')) {
                if ($request->image) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/reviews/' . $request->image)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/reviews/' . $request->image);
                    }
                }
                $this->delete_file($id);
                $image = $request->file('photo');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/reviews/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $edit = TripReview::findorfail($id);
            if ($edit->update($data)) {
                return redirect()->back()->with('success', 'Trip review updated successfully');
            }
        }
    }

    public function delete_trip_review(Request $request)
    {
        $id = $request->id;
        $del = TripReview::findorfail($id);
        if ($this->delete_file($id) && $del->delete()) {
            return redirect()->back()->with('success', 'Review deleted  successfully');
        }
    }

    public function review_status(Request $request)
    {
        $id = $request->status;

        $deal = TripReview::findorfail($id);

        if (isset($_POST['active'])) {
            $deal->status = 0;
        }
        if (isset($_POST['inactive'])) {
            $deal->status = 1;
        }
        $save = $deal->update();
        if ($save) {
            Session::flash('success', 'Status updated');
            return redirect()->back();
        }
    }

}
