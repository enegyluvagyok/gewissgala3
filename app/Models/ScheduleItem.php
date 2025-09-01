<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class ScheduleItem extends Model
{
    use CrudTrait;
    protected $fillable = ['day','start_time','end_time','title','subtitle','sort'];
    protected $casts = [
        'day' => 'integer',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    public static function dayLabels(): array {
        return [1=>'Hétfő',2=>'Kedd',3=>'Szerda',4=>'Csütörtök',5=>'Péntek'];
    }
}