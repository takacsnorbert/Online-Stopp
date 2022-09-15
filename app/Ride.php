<?php
 
namespace App;
 
use Illuminate\Notifications\Notifiable;
use Orchid\Platform\Traits\GlobalSearchTrait;
use Illuminate\Foundation\Auth\Ride as Authenticatable;
 
class Ride extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'start_date','places','price','start_city', 'finish_city','comment'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}