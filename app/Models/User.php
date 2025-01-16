<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
  /** @use HasFactory<\Database\Factories\UserFactory> */

  // Traits
  use HasApiTokens, HasFactory, Notifiable;

  // Constants (if any)
  // protected const string SOME_CONSTANT = 'value';

  // Private or Protected Instance Variables/Properties
  private $id;
  private $firstName;
  private $lastName;

  // TODO: Should we use Default Attribute Values ($attributes)?
  // Consideration: You can define default values for model attributes
  // in the $attributes property. These will be applied when a new model
  // instance is created but hasn't been saved to the database yet.
  // protected $attributes = [
  //   'is_active' => false,
  //   'settings' => 'default',
  // ];

  /**
   * Relations
   *
   */
  public function articles()
  {
    return $this->hasMany(Article::class);
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'firstname',
    'lastname',
    'email',
    'password',
    'email_verified',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'salt',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array {
    return [
      'password'          => 'hashed',
      'email_verified'    => 'boolean',
      'email_verified_at' => 'datetime',
      'is_admin'          => 'boolean',
    ];
  }
}
