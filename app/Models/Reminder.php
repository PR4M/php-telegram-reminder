<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/11/2018
 * Time: 7:50 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\Date;

class Reminder extends Model
{
    protected $fillable = [
      'body', 'frequency', 'day', 'date', 'time', 'expression', 'run_once'
    ];

    public function getFrequencyAttribute($value)
    {
        return array_get(Date::frequencies(), $value);
    }

    public function getDayAttribute($value)
    {
        if($value === null) {
            return;
        }
        return array_get(Date::days(), $value);
    }

    public static function getDateAttribute($value)
    {
        if($value === null) {
            return;
        }
        return Date::ordinal($value);
    }
}