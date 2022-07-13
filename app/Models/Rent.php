<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use SoftDeletes;

    protected $dates = ['rent_date', 'forecast_devolution_date', 'deleted_at'];

    protected $guarded = ['id'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getRentDateFormateAttribute()
    {
        return Carbon::parse($this->rent_date)->format('Y-m-d');
    }

    public function getForecastDevolutionFormateAttribute()
    {
        return Carbon::parse($this->forecast_devolution_date)->format('Y-m-d');
    }
}
