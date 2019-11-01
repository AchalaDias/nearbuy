<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helmesvs\Notify\Facades\Notify;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     /**
     * Show the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_categories = Category::where('parent', 0)->orderBy('id', 'asc')->get();
        $sub_categories = Category::where('parent', '!=', 0)->orderBy('id', 'asc')->get();

        return view('admin.category.list')
                ->with(compact('main_categories'))
                ->with(compact('sub_categories'));
    }

    /**
     * Loard  category creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function loardForm() 
    {
        $main_categories = Category::where('parent', 0)->orderBy('id', 'asc')->get();
        $sub_categories = Category::where('parent', '!=', 0)->orderBy('id', 'asc')->get();

        return view('admin.category.create')
                ->with(compact('main_categories'))
                ->with(compact('sub_categories'));
    }

    /**
     * Create  Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory(Request $request) {

         // Validate the form data
         $validator = $this->validate($request, [
            'name' => 'required|min:3|max:50|unique:categories',
            'category_id' => 'required',
        ]);

        if($request->all()['category_id'] == 1) {
            $validator = $this->validate($request, [
                'image' => 'required|base64mimes:jpeg,jpg|base64max:5000'
            ]);
        }
        $data = $request->all();
        $category = Category::find($data['category_id']);

        if($category->id == 1){
            Category::create([
                'name' => $data['name'],
                'parent' => 0,
                'image_path' => $data['image'],
                'status' => 0,
                'user_id' => Auth::user()->id
            ]);
        } else {
            Category::create([
                'name' => $data['name'],
                'parent' => $category->id,
                'image_path' => $data['image'],
                'status' => 0,
                'user_id' => Auth::user()->id
            ]);
        }

        Notify::success('Category Created Successfully !', $title = null, $options = []);
        return response()->json(['msg'=> 'success', 'redirect' => route('admin.categories') ]);
        // return redirect()->intended(route('admin.categories'));
    }
}
