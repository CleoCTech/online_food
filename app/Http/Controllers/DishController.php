<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    //


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories =Category::where('category_status', 1)
                    ->get();
        return view('BackEnd.Food.add', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $foods = Dish::all();
        $categories =Category::where('category_status', 1)
                    ->get();
        $foods = DB::table('dishes')
                        ->join('categories','dishes.category_id', '=', 'categories.category_id')
                        ->select('dishes.*', 'categories.category_name')
                        ->get();
        return view('BackEnd.Food.manage', compact('foods', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'dish_name'=>'required',
            'dish_image'=>'image|max:1999'
        ]);

         //Handle cover_image file upload
        //if function to check if the user has uploaded the file
        if($request->hasFile('dish_image')){
            //get filename with extension
            $filenameWithExt =$request->file('dish_image')->getClientOriginalName();
            //get just filenaem
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just Ext
            $extension =$request->file('dish_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
             $path = $request->file('dish_image')->storeAs('public/dish_images/', $fileNameToStore);
            //  $path = $request->file('dish_image')->storeAs('https://filedn.eu/lk8FvOc8PFbzuJS2ee0tKLj/', $fileNameToStore);
        }else{
            //if the user did not upload the image, we create a variable down here to hold a static tittle 'noimage.jpg' of a file which will be used as defualt image if no image uploaded
            $fileNameToStore='noimage.jpg';
        }

        // $imgName =$request->file('dish_image');
        // $image =$imgName->getClientOriginalName();
        // $directory ='BackEndSourceFile/dish_img/';
        // $imgUrl =$directory.$image;
        // $imgName->move($directory,$imgName);

        $dish = new Dish();
        $dish ->dish_name =$request->dish_name;
        $dish ->category_id =$request->category_id;
        $dish ->dish_detail =$request->dish_detail;
        $dish ->dish_image =$fileNameToStore;
        $dish ->dish_status =$request->dish_status;
        $dish ->full_price =$request->full_price;
        $dish ->half_price =$request->half_price;
        $dish->save();

        return back()->with('sms', "Data Saved");
        return view('BackEnd.Food.add');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $food =Dish::find($request->dish_id);

        $img_main =$request->file('dish_image');
        if ($img_main) {
            # code...
            $img_name =$img_main->getClientOriginalName();
            $directory = 'BackEndSourceFile/dish_img/';
            $imgUrl =$directory.$img_name;
            $img_main->move($directory.$img_name);

            $old_img =$food->dish_image;
            if (file_exists($old_img)) {
                # code...
                unlink($old_img);
            }
            $food ->dish_name =$request->dish_name;
            $food ->category_id =$request->category_id;
            $food ->dish_detail =$request->dish_detail;
            $food ->dish_image =$imgUrl;
            $food ->full_price =$request->full_price;
            $food ->half_price =$request->half_price;
        }else{
            $food ->dish_name =$request->dish_name;
            $food ->category_id =$request->category_id;
            $food ->dish_detail =$request->dish_detail;
            $food ->full_price =$request->full_price;
            $food ->half_price =$request->half_price;
        }
        $food->save();
        return redirect('/manage-food')->with('sms', "Data Updated");
    }

    public function activate($id){

        $food =Dish::find($id);
        $food->dish_status =1;
        $food->save();
        return back();
    }
    public function deactivate($id){

        $food =Dish::find($id);
        $food->dish_status =0;
        $food->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish =Dish::find($id);
        $dish->delete();
        return back();
    }
}
