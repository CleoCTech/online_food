<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Dish;

class FrontEndController extends Controller
{
    //
    public function index()
    {

        // $categories = Category::where('category_status', 1)
        //                             ->get();
        $dishes = Dish::where('dish_status', 1)
                            ->get();

        return view('FrontEnd.include.home', compact('dishes'));
    }

    public function show($id)
    {

        // $categories = Category::where('category_status', 1)
        //                             ->get();
        $categoryDish = Dish::where('category_id', $id)
                            ->where('dish_status', 1)
                            ->get();
        return view('FrontEnd.include.dish', compact('categoryDish'));
    }
}