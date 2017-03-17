<?php
/**
 * Created by PhpStorm.
 * User: vnilov
 * Date: 3/15/17
 * Time: 12:39 PM
 */

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\MenuItem as Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($path, Request $request) 
    {
        // получаем данные по дереву из пунктов меню
        $menu = Menu::getTree();
        $path = strpos($path, '/') === 0 ? substr($path,1) : $path;
        // получаем данные по странице, если есть
        $current_page = Page::where('slug', '/' . $path)->first();
        // получаем счетчики
        $counters = Counter::all();
        //$request->session()->flash('mail_status', '1');
        $show_popup = ($request->session()->get('mail_status') == 1) ? true : false;
        return view('public.index', [
            'menu' => $menu,
            'page' => $current_page,
            'counters' => $counters,
            'show_popup' => $show_popup
        ]);
    }
}