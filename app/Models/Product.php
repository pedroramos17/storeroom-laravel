<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Product extends Model
{
  use HasUuids;
  use HasFactory;
  use Searchable;

  protected $fillable = [
    'name',
    'description',
    'location',
    'stored',
    'hold_reason',
    'code',
    'image',
    'storage_time',
    'priority',
    'acquired_from',
    'acquire_date',
    'warranty_term',
    'receipt_link',
    'created_at',
    'updated_at',
    'user_id',
  ];
  
      /**
     * The attributes that should be cast.
     *
     * @var array
     */
  protected $casts = [
    'stored' => 'boolean',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  public function toSearchableArray()
  {
    $array = $this->toArray();

    $array['user_name'] = $this->user->name;

    return $array;
  }
}