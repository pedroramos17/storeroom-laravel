<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\User;
use App\Models\Tag;

class Product extends Model
{
  use HasFactory, HasUuids;

  protected $table = 'products';
  protected $fillable = [
    'name',
    'description',
    'location',
    'check',
    'created_at',
    'updated_at',
    'hold_reason',
    'code',
    'image',
    'storage_time',
    'priority',
    'acquired_from',
    'acquire_date',
    'warranty_term',
    'receipt_link',
    'user_id',
  ];
 
  public function relUsers()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function relTags()
  {
    return $this->belongsToMany(Tag::class);
  }
}