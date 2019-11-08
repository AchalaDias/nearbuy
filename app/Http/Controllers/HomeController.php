<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Vendor;
use App\Item;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::get();
        $main_categories = Category::where('parent', 0)->orderBy('id', 'asc')->take(5)->get();
        return view('home')
                ->with(compact('main_categories'))
                ->with(compact('vendors'));
    }

    /**
     * Show categories.
     *
     * @return \Illuminate\Http\Response
     */

    public function listCategories() {
        $main_categories = Category::where('parent', 0)->where('status', 1)->orderBy('id', 'asc')->take(5)->get();
        return view('list-category')
                ->with(compact('main_categories'));
    }


    /**
     * Show items related to categories.
     *
     * @return \Illuminate\Http\Response
     */

    public function listItems(Request $request) {

        if(is_null($request->id)){
            return redirect()->intended(route('home'));
        }

        $category = Category::find($request->id);
        $sub_list = DB::select("
        SELECT  c.id, c.name, COUNT(i.id) AS item_count
        FROM  
             newbuy.categories c 
        LEFT JOIN  (select i.id,i.category_id  from newbuy.items i where i.status = 1 ) AS i ON c.id = i.category_id
        where c.status = 1 and c.parent=".$request->id." 
        GROUP BY c.id,c.name
        ");
        $items_list = [];
        // $items_list = Item::where('status', 1)->orderBy('id', 'desc')->take(10)->get();
        return view('show-category')
                ->with(compact('category'))
                ->with(compact('sub_list'))
                ->with(compact('items_list'));
    }


    /**
     * Show sub categories.
     *
     * @return \Illuminate\Http\Response
     */

    public function listSubItems(Request $request) {
        if(is_null($request->main_id) && is_null($request->sub_id)){
            return redirect()->intended(route('home'));
        }

        $category = Category::find($request->main_id);
        $sub_list = DB::select("
        SELECT  c.id, c.name, COUNT(i.id) AS item_count
        FROM  
             newbuy.categories c 
        LEFT JOIN  (select i.id,i.category_id  from newbuy.items i where i.status = 1 ) AS i ON c.id = i.category_id
        where c.status = 1 and c.parent=".$request->main_id." 
        GROUP BY c.id,c.name
        ");
        $items_list = Item::where('category_id', $request->sub_id)->where('status', 1)->orderBy('id', 'desc')->get();

        return view('show-category')
                ->with(compact('category'))
                ->with(compact('sub_list'))
                ->with(compact('items_list'));
    }


    /**
     * Show Item.
     *
     * @return \Illuminate\Http\Response
     */
    public function showItem(Request $request) {
        if(is_null($request->id)){
            return redirect()->intended(route('home'));
        }

        $item = Item::find($request->id);
        $category = Category::find($item->category_id);

        if($item->status != 1) {
            return redirect()->intended(route('home'));
        }
        return view('show-item')
                ->with(compact('item'))
                ->with(compact('category'));
    }

    /**
     * Show the vendor Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendorProfile(Request $request) {
        if(is_null($request->id)){
            return redirect()->intended(route('home'));
        }
        $vendor = Vendor::find($request->id);
        return view('vendor-profile')
                ->with(compact('vendor'));
    }
}
