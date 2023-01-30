<?php

namespace App\Models;

use App\Observers\HotelObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stars',
        'country',
        'city',
        'open_year',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static function boot(): void
    {
        parent::boot();

        self::observe(HotelObserver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'hotel_services');
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'hotel_reviews');
    }
}
