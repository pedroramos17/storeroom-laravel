<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductTag extends Pivot
{
  protected $table = 'product_tag';
  protected $fillable = [
    "id",
    "product_id",
    "tag_id",
    "created_at",
    "updated_at",
  ];

  public function relProducts()
  {
    return $this->belongsTo(Product::class);
  }
  public function relTags()
  {
    return $this->belongsToMany(Tag::class);
  }
}
