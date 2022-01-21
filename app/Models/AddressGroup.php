<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'name',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
