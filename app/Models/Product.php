<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = [ 'user' ];

    public function scopeFilter($query, array $filters)
    {

        

         $query->when($filters['user'] ?? false, fn($query, $user) => 
         $query->whereHas('user', fn($query) => 
         $query->where('username', $user)
        )
    );

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
