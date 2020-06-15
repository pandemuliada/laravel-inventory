<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Item extends Model
{
    use SoftDeletes, LogsActivity;
 
    protected $guarded = [];
    
    protected static $logName = 'item';
    protected static $logAttributes  = ['name', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }
    
}
