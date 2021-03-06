<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use SoftDeletes, LogsActivity;
    
    protected static $logName = 'category';
    protected static $logAttributes  = ['name'];

    public function items()
    {
        // Get items related to category
        return $this->hasMany('App\Item', 'category_id', 'id');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }
}
