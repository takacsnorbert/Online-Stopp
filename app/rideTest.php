<?php
 
namespace App;
 
use Illuminate\Notifications\Notifiable;
use Orchid\Platform\Traits\GlobalSearchTrait;
use Illuminate\Foundation\Auth\Ride as Authenticatable;
 
class rideTest extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'rideID','reservePlaces',
    ];
}