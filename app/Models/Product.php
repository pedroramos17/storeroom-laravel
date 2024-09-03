<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\User;
use App\Models\Tag;
use Laravel\Scout\Searchable;

class Product extends Model
{
  use HasFactory, HasUuids, Searchable;

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

  public function relUsers()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function relTags()
  {
    return $this->belongsToMany(Tag::class);
  }

  public function toSearchableArray()
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'description' => $this->description,
      'location' => $this->location,
      'stored' => (boolean) $this->stored,
      'hold_reason' => $this->hold_reason,
      'code' => $this->code,
      'image' => $this->image,
      'storage_time' => $this->storage_time,
      'priority' => (int) $this->priority,
      'acquired_from' => $this->acquired_from,
      'acquire_date' => $this->acquire_date,
      'warranty_term' => $this->warranty_term,
      'receipt_link' => $this->receipt_link,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'user_id' => $this->user_id,
    ];
  }
}