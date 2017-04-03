<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    //
    protected $fillable = ['activity_id', 'duration'];

    public function activity()
    {
        return this->$this->belongsTo('App\Activity');
    }

    public function scopeId($query, $Id)
    {
        return $query->where('id', $Id)->firstOrFail();
    }
}
