<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'slug_product',
        'image',
        'description',
        'content',
        'status',
        'menu_id',
        'price',
        'sale_off',
        'is_home',
        'new',
    ];

    public function menus() {
        return $this->belongsToMany('App\Models\Menu', 'menu_product', 'product_id',  'menu_id');
      }
      public function gallery() {
        return $this->belongsToMany('App\Models\Gallery', 'gallery_product', 'product_id',  'gallery_id');
      }
}
