<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  use HasFactory;

  protected $table = 'tags';

  protected $fillable = [
    "id",
    "name",
  ];

  public $timestamps = false;

  public function relProducts()
  {
    return $this->belongsToMany(Product::class);
  }
}
