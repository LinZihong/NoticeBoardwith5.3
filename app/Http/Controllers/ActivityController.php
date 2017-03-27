<?php

namespace App\Http\Controllers;

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

        $activity = new Activity($request->all());
        $activity->creator_id = Auth::user()->id;
        //Club id to add
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
        //Middleware to add
        $participation = new Participation($request->all());
        $participation->user_id = Auth::user()->id;
        if($participation->save())
        {

        }
        abort(500);
    }

    public function approve(Request $request)//participation_id
    {
        //Validator to add
        //Middleware to add
        if($participation = Participation::find($request->id))
        {

        }

    }
}
