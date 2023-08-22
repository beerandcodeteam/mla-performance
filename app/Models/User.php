<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
        'password' => 'hashed',
    ];

    public function advisor(): BelongsTo
    {
        return $this->belongsTo(Advisor::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function lastOrder(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function scopeSearch($query, $search = null)
    {
        //Joaquin Bernier Schaefer
        //["Joaquin", "Bernier", "Schaefer"]
        collect(explode(' ', $search))->filter()->each(function($term) use ($query){
            $term = $term."%";
            $query->where(function($query) use ($term){
                $query->where('first_name', 'like', $term)
                    ->orWhere('last_name', 'like', $term)
                    ->orWhereIn('advisor_id', Advisor::query()
                        ->where('name', 'like', $term)
                        ->pluck('id')
                    );
            });
        });
    }
}
