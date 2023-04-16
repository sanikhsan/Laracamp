<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'price',
    ];

    public function getIsRegisteredAttribute () {
        return Checkout::where('camp_id', $this->id)->where('user_id', Auth::id())->exists();
    }
}
