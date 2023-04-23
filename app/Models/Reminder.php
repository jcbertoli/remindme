<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'webhook_id',
        'title',
        'description',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function webhook() 
    {
        return $this->belongsTo(Webhook::class);
    }

    protected function date(): Attribute
    {
       return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d M Y H:i:s'),
        );
    }
    
    public function scopeExpiredReminders($query)
    {
        return $query->where('date', '<', Carbon::now()->toDateTimeString());
    }
        
}
