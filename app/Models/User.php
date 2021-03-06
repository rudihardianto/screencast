<?php

namespace App\Models;

use App\Models\order\Cart;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Screencast\Playlist;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable, HasRoles, HasApiTokens;

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
   ];

   public function playlists()
   {
      return $this->hasMany(Playlist::class);
   }

   public function gravatar()
   {
      return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=200&d=mm';
   }

   public function purchases()
   {
      return $this->belongsToMany(Playlist::class, 'purchased_playlist', 'user_id', 'playlist_id')->withTimestamps();
   }

   public function buy(Playlist $playlist)
   {
      $this->purchases()->save($playlist);
   }

   public function hasBought(Playlist $playlist)
   {
      return (bool) $this->purchases()->find($playlist->id);
   }

   public function carts()
   {
      return $this->hasMany(Cart::class);
   }

   public function addToCart(Playlist $playlist)
   {
      $this->carts()->create([
         'playlist_id' => $playlist->id,
         'price'       => $playlist->price,
      ]);
   }

   public function alreadyInCart(Playlist $playlist)
   {
      return (bool) $this->carts()->where('playlist_id', $playlist->id)->count();
   }

}