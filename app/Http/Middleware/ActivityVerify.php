<?php

namespace App\Http\Middleware;

use Closure;
use App\Participation;

class ActivityVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Verify permission
        //For Create,Approve,Check-in
        $user = Auth::user();
        if(empty($request->creator_type))//Approve or check-in
        {
            if(!($participation = Participation::Id($request->participation_id)))
            {
                abort(500);//participation not exist
            }
            $activity = $participation->activity();
            if($activity->creator_type == 'individual' && $activity->creator_id != $user->id)
            {
                abort(500);//Unauthorized
            }
            if($activity->creator_type == 'club' && !($user->hasPermissionInClub($activity->id)))//@TODO: hasPermissionInClub(club_id) function
            {
                abort(500);//Unauthorized
            }
        }
        else
        {
            if($request->creator_type == "club")
            {
                if(!($user->hasPermissionInClub($request->club_id)))
                {
                    abort(500);//Unauthorized
                }
            }
            else if($request->creator_type != "club" && $request != "individual")
            {
                abort(500);//Invalid arguments
            }
        }
        return $next($request);
    }
}
