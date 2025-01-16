<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Article extends Model {
  /** @use HasFactory<\Database\Factories\ArticleFactory> */

  // Traits
  use HasApiTokens, HasFactory, Notifiable;

  // Constants (if any)
  // protected const string SOME_CONSTANT = 'value';

  // Private or Protected Instance Variables/Properties
  private $id;
  private $title;
  private $content;

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
  public function user() {
    return $this->belongsTo(User::class);
  }

  /**
   * @var list<string>
   */
  protected $fillable = ['title', 'content'];
}
