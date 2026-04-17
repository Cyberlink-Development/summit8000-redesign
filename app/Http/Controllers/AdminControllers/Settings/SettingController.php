<?php

namespace App\Http\Controllers\AdminControllers\Settings;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SettingModel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $data = SettingModel::where('id', 1)->first();
        return view('admin.settings.setting', compact('data'));
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function edit(Request $request)
    {
        $data = SettingModel::where('id', 1)->first();
        return view('admin.settings.setting');
    }

     public function update(Request $request, $id){
        $validate = $request->validate([
            'logo'=> 'mimes: jpg,jpeg,png,svg'
        ]);
      $medium_width = 168;
      $medium_height = 57;
      
      $original_width=1366;
      $original_height=216;
      
      $mobile_width=515;
      $mobile_height=297;

      $data = SettingModel::where('id',$id)->first();

      $file =  $request->file('logo');
      $logo_name = '';
    

      if($request->hasFile('logo')) {
        $data = SettingModel::find($id);
        if($data->logo){
          if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->logo)){
            unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->logo);
          }
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->logo)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->logo);
          }
        }
        $user_img_name = $request->file('logo');
        $user_name = time().'.'.$user_img_name->getClientOriginalExtension();
        $destinationPath = public_path('uploads/original');
        $user_img_name->move($destinationPath, $user_name);

        $data->logo = $user_name;
        }
         $file =  $request->file('TTA1');
         $logo_name = '';
         if($request->hasfile('TTA1')){
             $data = SettingModel::find($id);
             if($data->TTA1){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA1)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA1);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->TTA1)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->TTA1);
                 }
             }
             $logo = $request->file('TTA1')->getClientOriginalName();
             $extension = $request->file('TTA1')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

             /*Upload Original Image*/
             $logo_picture->resize($original_width, $original_height, function($constraint){
                 $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $logo_name );

             $data->TTA1 = $logo_name;
         }

         $file =  $request->file('TTA2');
         $logo_name = '';
         if($request->hasfile('TTA2')){
             $data = SettingModel::find($id);
             if($data->TTA2){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA2)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA2);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->TTA2)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->TTA2);
                 }
             }
             $logo = $request->file('TTA2')->getClientOriginalName();
             $extension = $request->file('TTA2')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

         
             /*Upload Original Image*/
             $logo_picture->resize($mobile_width, $mobile_height, function($constraint){
                 $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $logo_name );

             $data->TTA2 = $logo_name;
         }

         $file =  $request->file('Affiliated1');
         $logo_name = '';
         if($request->hasfile('Affiliated1')){
             $data = SettingModel::find($id);
             if($data->TTA2){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->Affiliated1)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->Affiliated1);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->Affiliated1)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->Affiliated1);
                 }
             }
             $logo = $request->file('Affiliated1')->getClientOriginalName();
             $extension = $request->file('Affiliated1')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

         
             /*Upload Original Image*/
             $logo_picture->resize($mobile_width, $mobile_height, function($constraint){
                 $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $logo_name );

             $data->Affiliated1 = $logo_name;
         }
         $file =  $request->file('Affiliated2');
         $logo_name = '';
         if($request->hasfile('Affiliated2')){
             $data = SettingModel::find($id);
             if($data->Affiliated2){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->Affiliated2)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->Affiliated2);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->Affiliated2)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->Affiliated2);
                 }
             }
             $logo = $request->file('Affiliated2')->getClientOriginalName();
             $extension = $request->file('Affiliated2')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

         
             /*Upload Original Image*/
             $logo_picture->resize($mobile_width, $mobile_height, function($constraint){
                 $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $logo_name );

             $data->Affiliated2 = $logo_name;
         }

         $file =  $request->file('flight_photo');
         $logo_name = '';
         if($request->hasfile('flight_photo')){
             $data = SettingModel::find($id);
             if($data->flight_photo){
                 if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->flight_photo)){
                     unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->flight_photo);
                 }
                 if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->flight_photo)){
                     unlink(env('PUBLIC_PATH').'uploads/original/' . $data->flight_photo);
                 }
             }
             $logo = $request->file('flight_photo')->getClientOriginalName();
             $extension = $request->file('flight_photo')->getClientOriginalExtension();
             $logo = explode('.', $logo);
             $logo_name = Str::slug($logo[0]) . '-' . time() . '.' . $extension;

             $destinationPath_medium = public_path('uploads/medium');
             $destinationOriginal = public_path('uploads/original');

             $logo_picture = Image::make($file->getRealPath());
             $width = Image::make($file->getRealPath())->width();
             $height = Image::make($file->getRealPath())->height();

             /*Upload Original Image*/
             $logo_picture->resize($original_width, $original_height, function($constraint){
                 $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $logo_name );

             $data->flight_photo = $logo_name;
         }

        $data->site_name = $request->site_name;
        $data->phone = $request->phone;
        $data->fax = $request->fax;
        $data->usa_phone = $request->usa_phone;
        $data->link1 = $request->link1;
        $data->link2 = $request->link2;
        $data->email_primary = $request->email_primary;
        $data->email_secondary = $request->email_secondary;
        $data->address = $request->address;
        $data->facebook_link = $request->facebook_link;
        $data->linkedin_link = $request->linkedin_link;
        $data->youtube_link = $request->youtube_link;
        $data->twitter_link = $request->twitter_link;
        $data->instagram_link = $request->instagram_link;
        $data->tiktok_link = $request->tiktok_link;
        $data->meta_key = $request->meta_key;
        $data->meta_description = $request->meta_description;
        $data->google_map = $request->google_map;
        $data->google_map2 = $request->google_map2;
        $data->copyright_text = $request->copyright_text;
        $data->flight_link = $request->flight_link;
        $data->flight_brief = $request->flight_brief;
        $data->skype = $request->skype;

        if ($request->hasFile('usa_phone')) {
            if(file_exists('uploads/'.$data->usa_phone)){
                File::delete('uploads/'.$data->usa_phone);
            }
            $image1 = $request->file('usa_phone');
            $imageName1 = time() . '_phone.' . $image1->extension();
            $image1->move(public_path('uploads'), $imageName1);
            $data->usa_phone = $imageName1;
        }
    
        if ($request->hasFile('usa_address')) {
            if(file_exists('uploads/'.$data->usa_address)){
                File::delete('uploads/'.$data->usa_address);
            }
            $image2 = $request->file('usa_address');
            $imageName2 = time() . '_address.' . $image2->extension();
            $image2->move(public_path('uploads'), $imageName2);
            $data->usa_address = $imageName2; 
        }
        // $data->usa_phone = $request->usa_phone;
        // $data->usa_address = $request->usa_address;

        $data->usa_email_primary = $request->usa_email_primary;
        $data->usa_email_secondary = $request->usa_email_secondary;
        $data->text1_title = $request->text1_title;
        $data->text1_sub_title = $request->text1_sub_title;
        $data->text2_title = $request->text2_title;
        $data->text2_sub_title = $request->text2_sub_title;
        $data->text3_title = $request->text3_title;
        $data->text3_sub_title = $request->text3_sub_title;
        $data->fp_activity = $request->fp_activity;
        $data->fp_training = $request->fp_training;
        $data->fp_about = $request->fp_about;
        $data->fp_about_content = $request->fp_about_content;
        // $data->flight_price = $request->flight_price;
        // $data->logo = $user_name;
        if($data->save()){
            return redirect()->back()->with('success','Update Sucessfully.');
        }

    }

      // Delete Logo
      function destroy($id){
        $data = SettingModel::find($id);
        if($data->logo){
         if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->logo)){
           unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->logo);
         }
         if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->logo)){
           unlink(env('PUBLIC_PATH').'uploads/original/' . $data->logo);
         }
       }
       $data->logo = NULL;
       $data->save();
       return response('Delete Successful.');
     }

    public function banner_destroy($id){
        $data = SettingModel::find($id);
        if($data->TTA1){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA1)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA1);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->TTA1)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->TTA1);
            }
        }
        $data->TTA1 = NULL;
        $data->save();
        return response('Delete Successful.');
    }

    public function mobile_banner_destroy($id){
        $data = SettingModel::find($id);
        if($data->TTA2){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA2)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->TTA2);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->TTA2)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->TTA2);
            }
        }
        $data->TTA2 = NULL;
        $data->save();
        return response('Delete Successful.');
    }
    public function flight_photo_delete($id){
        $data = SettingModel::find($id);
        if($data->flight_photo){
            if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->flight_photo)){
                unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->flight_photo);
            }
            if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->flight_photo)){
                unlink(env('PUBLIC_PATH').'uploads/original/' . $data->flight_photo);
            }
        } 
        $data->flight_photo = NULL;
        $data->save();
        return response('Delete Successfully.');
    }
}
