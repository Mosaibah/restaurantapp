<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class MenuController extends Controller
{
     // list food
     public function menu(){

        // $foods = Food::latest()->paginate(12);
        // return view('food.list_food', compact('foods'));

        $categories = Category::with('food')->get();
        return view('menu.index', compact('categories'));

    }

    public function menu_show($id){

        $food = Food::find($id);
        $category = Category::find($food->category_id);

        return view('menu.menu_show', compact('food','category'));
    }

    public function about(){
        return view('menu.about');
    }

    public function contact(){
        return view('menu.contact');
    }

    public function privacy(){
        return view('menu.privacy');
    }

    public function terms(){
        return view('menu.terms');
    }
}
