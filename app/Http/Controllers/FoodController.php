<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('food.index')->
            with('foods' , Food::latest()->paginate(12));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:12',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png',
        ]);

        //upload image
        $real_name_image = $request->file('image');
        $image_ext = time(). '.' . $real_name_image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $real_name_image->move($destinationPath, $image_ext);


        Food::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'image' => $image_ext,
        ]);

        return redirect('food')->
            with('message' , 'New food has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('food.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('food.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | max:12',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $food = Food::find($id);
        $image_ext = $food->image;

        //upload image
        if($request->hasFile('image')){
        $real_name_image = $request->file('image');
        $image_ext = time(). '.' . $real_name_image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $real_name_image->move($destinationPath, $image_ext);
        }

        $food->update([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            'category_id' => $request->input('category'),
            'image'       => $image_ext,
        ]);

        return redirect('food')->
            with('message' , 'New food has been added');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect('food')->
            with('message', 'Food has been deleted');
    }


    // list food
    public function list_food(){

        // $foods = Food::latest()->paginate(12);
        // return view('food.list_food', compact('foods'));

        $categories = Category::with('food')->get();
        return view('food.list_food', compact('categories'));

    }

    public function view($id){

        $food = Food::find($id);

        return view('food.view', compact('food'));
    }
}
