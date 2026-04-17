<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\AdminControllers\Inquiry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry\CustomizeModel;
use App\Models\Inquiry\SuggestionModel;

class TripCustomizeController extends Controller
{
    //
    public function index()
    {
        $customize = CustomizeModel::orderby('id', 'desc')->where('type','customize')->get();
        return view('admin.trip-customize.index', compact('customize'));
    }
    public function showplan()
    {
        $customize = CustomizeModel::orderby('id', 'desc')->where('type','plan')->get();
        return view('admin.trip-customize.index', compact('customize'));
    }
    public function showprivate()
    {
        $customize = CustomizeModel::orderby('id', 'desc')->where('type','private')->get();
        return view('admin.trip-customize.index', compact('customize'));
    }
    public function showsuggestion()
    {
        $customize = SuggestionModel::orderby('id', 'desc')->get();
        return view('admin.trip-suggestion.index', compact('customize'));
    }
    public function destroy($id)
    {
        $del = CustomizeModel::findorfail($id);
        if ($del->delete()) {
            return redirect()->back()->with('success', 'Deleted  successfully');
        }
    }
    public function destroySuggestion($id)
    {
        $del = SuggestionModel::findorfail($id);
        if ($del->delete()) {
            return redirect()->back()->with('success', 'Deleted  successfully');
        }
    }
}
