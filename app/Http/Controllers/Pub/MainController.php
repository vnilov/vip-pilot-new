<?php
/**
 * Created by PhpStorm.
 * User: vnilov
 * Date: 3/15/17
 * Time: 12:39 PM
 */

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use App\Models\MenuItem as Menu;
use App\Models\Page;

class MainController extends Controller
{
    public function index($path) 
    {
        // получаем данные по дереву из пунктов меню
        $menu = Menu::getTree();
        $path = strpos($path, '/') === 0 ? substr($path,1) : $path;
        $current_page = Page::where('slug', '/' . $path)->first();
        
        // получаем данные по странице, если есть
        return view('public.index', [
            'menu' => $menu,
            'page' => $current_page
        ]);
    }
}