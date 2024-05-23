<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $all_product = DB::table('tbl_product')
            ->join('tbl_category', 'tbl_product.product_category', '=', 'tbl_category.category_name')
            ->where('tbl_category.category_status', '1')
            ->paginate(8);
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();
        $all_type = DB::table('categories_game')->get();

        return view('pages.home', ['all_product' => $all_product], ['all_category' => $all_category, 'all_type' => $all_type]);
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();

        $search_product = DB::table('tbl_product')
            ->join('tbl_category', 'tbl_product.product_category', '=', 'tbl_category.category_name')
            ->where('tbl_category.category_status', '1')
            ->where('product_name', 'like', '%' . $keywords . '%')
            ->paginate(8);
        if ($search_product->isEmpty()) {
            Session::put('message', 'Không tìm thấy sản phẩm !!!');
        }
        return view('pages.cart.search', ['search_product' => $search_product, 'all_category' => $all_category]);
    }
    public function category($category_name)
    {
        $all_product = DB::table('tbl_product')->where('product_category', '=', $category_name)->where('product_status', '1')->paginate(2);
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();

        if ($all_product->isEmpty()) {
            session()->put('message', 'Các sản phẩm dòng này đang hiện hết hàng :((');
        }

        return view('pages.home', ['all_product' => $all_product], ['all_category' => $all_category]);
    }

    public function type_product($type)
    {
        $all_type = DB::table('categories_game')->get();
        $all_product = DB::table('tbl_product')->where('product_type', '=', $type)->where('product_status', '1')->paginate(2);
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();

        if ($all_product->isEmpty()) {
            session()->put('message', 'Các sản phẩm dòng này đang hiện hết hàng :((');
        }

        return view('pages.home', ['all_product' => $all_product, 'all_category' => $all_category, 'all_type' => $all_type]);
    }

    public function show_category()
    {
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();
        return view('layout', ['all_category' => $all_category]);
    }
    public function detail($product_id)
    {
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();
        $detail_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        return view('pages.product_detail', ['detail_product' => $detail_product, 'all_category' => $all_category]);

    }
    public function login()
    {
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();
        return view('pages.login-register.login', ['all_category' => $all_category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        return view('pages.about');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
