<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'age',
        'date',
        'time',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
