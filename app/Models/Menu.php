<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'status',
        'is_home',
    ];

    public function parent() {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
    
    public function childs() {
        return $this->hasMany(Menu::class, 'parent_id');
    }
    
    public function getProductHome() {
        return $this->belongsToMany('App\Models\Product', 'menu_product', 'menu_id', 'product_id')->limit(8);
      }
    public function getProduct( $sort ='') {
        $result = $this->belongsToMany('App\Models\Product', 'menu_product', 'menu_id', 'product_id');
        if (!empty($sort) && $sort != 'new') {
            $result->orderBy('sale_off',$sort);
        }
        if($sort == 'new'){
            $result->where('new',1);
        }
        return $result;
      }
}
