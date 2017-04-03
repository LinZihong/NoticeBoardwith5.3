<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\Participation;


class ActivityController extends Controller
{
    //
    public function createActivity(Request $request)
    {
        //Validator to add
        if($errors = Validator::make($request, [
            'title' => 'required|max:255',
            'creator_type' => 'required',
            'club_id' => 'required_if:creator_type,club',
            'reg_start' => 'required|date',
            'reg_end' => 'required|date|after:reg_start',
            'duration' => 'required|integer|min:1'
        ])->validate())
        {
            return redirect()->back()->withErrors($errors)->withInput();
        };
        $activity = new Activity($request->all());
        $activity->creator_id = Auth::user()->id;
        if($activity->save())
        {

        }
        abort(500);
    }

    public function showIndividualActivity()
    {

    }

    public function signUp(Request $request)
    {
        //Validator to add
        if($errors = Validator::make($request, [
            'activity_id' => 'required|exists:activities,id',
            'duration' => 'required|integer|min:1'
        ])->validate())
        {
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $participation = new Participation($request->all());
        $participation->user_id = Auth::user()->id;
        $participation->status = 'pending';
        if($participation->save())
        {
            //Success
        }
    }

    public function approve(Request $request)//participation_id
    {
        if($errors = Validator::make($request, [
            'participation_id' => 'required|exists:participations,id'
        ])->validate())
        {
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $participation = Participation::Id($request->participation->id);
        $participation->checker_id = Auth::user()->id;
        $participation->status = 'approved';
        if($participation->save())
        {
            //Success
        }
    }
}
