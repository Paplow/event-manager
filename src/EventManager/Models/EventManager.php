<?php

namespace Paplow\EventManager\Models;

use Illuminate\Database\Eloquent\Model;

class EventManager extends Model
{
    protected $guarded = ['id'];
    protected $table = 'event_manager';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at', 'updated_at', 'type',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'date';
    }
}
