<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'edition',
        'name',
        'description',
        'event_day',
        'subscribe_begin',
        'subscribe_end',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @param $event_day
     * @return string
     */
    public function getEventDayAttribute($event_day)
    {
        $dt = Carbon::create($event_day);
        return $dt->format('d/m/Y');
    }


    /**
     * @param $subscribe_begin
     * @return string
     */
    public function getSubscribeBeginAttribute($subscribe_begin)
    {
        $dt = Carbon::create($subscribe_begin);
        return $dt->format('d/m/Y');
    }


    /**
     * @param $subscribe_end
     * @return string
     */
    public function getSubscribeEndAttribute($subscribe_end)
    {
        $dt = Carbon::create($subscribe_end);
        return $dt->format('d/m/Y');
    }
}
