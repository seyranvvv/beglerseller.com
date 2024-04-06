<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

        /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'favorites','client_id','product_id');
    }

    public function cartProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'carts','client_id','product_id')->withPivot('quantity');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function favoriteCount():int
    {
        return $this->favorites->count();
    }
}
