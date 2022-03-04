<?php


namespace App\Helper;

use Illuminate\Support\Str;

class Helper
{
    // public static function menu($menus, $parent_id = 0, $char = '', $urlUnactive, $urlActive)
    // {
    //     $html = '';

    //     foreach ($menus as $key => $menu) {
    //         if ($menu->parent_id == $parent_id) {
    //             $html .= '
    //                 <tr>
    //                     <td>' . $menu->id . '</td>
    //                     <td>' . $char . $menu->name . '</td>
    //                     <td>' . $menu->slug . '</td>
    //                     <td>' . $menu->description . '</td>
    //                     <td>' . self::active($menu->status, $urlUnactive, $urlActive ,$menu->id) . '</td>
    //                     <td>' . $menu->updated_at . '</td>
    //                     <td>
    //                         <a class="btn btn-primary btn-sm" href="/backend/edit-menu/' . $menu->id . '">
    //                             <i class="fas fa-edit"></i>
    //                         </a>
    //                         <a href="#" class="btn btn-danger btn-sm"
    //                             onclick="removeRow(' . $menu->id . ', \'/backend/destroy-menu\')">
    //                             <i class="fas fa-trash"></i>
    //                         </a>
    //                     </td>
    //                 </tr>
    //             ';

    //             unset($menus[$key]);

    //             $html .= self::menu($menus, $menu->id, $char . '|--', $urlUnactive, $urlActive);
    //         }
    //     }

    //     return $html;
    // }

    public static function active($status = 0, $urlUnactive, $urlActive ,$id): string
    {
        return $status == 0 ? '<a href="'.$urlUnactive.'/'.$id.'"  class="btn btn-danger btn-xs btn-status"><i class="fas fa-minus"></i></a>'
            : '<a href="'.$urlActive.'/'.$id.'"   class="btn btn-success btn-xs btn-status"><i class="fas fa-check"></i></a>';
    }

    public static function menus($menus, $parent_id = 0, $child = '') :string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li class = "'.$child.'">
                        <a href="/danh-muc/' .Str::slug($menu->name, '-') . '">
                            ' . $menu->name . '
                        </a>';

                unset($menus[$key]);

                if (self::isChild($menus, $menu->id )) {
                    $html .= '<ul class= "nav-dropdown js-nav-dropdown">';
                    $html .= self::menus($menus, $menu->id ,'nav-dropdown-grid');
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }

    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
        return '<a href="/lien-he.html">Liên Hệ</a>';
    }

    public function product (){
        
    }
}