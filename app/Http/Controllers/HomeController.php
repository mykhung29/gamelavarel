<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $all_product = DB::table('tbl_product')->where('product_status', '1')->paginate(2);
        $all_category = DB::table('tbl_category')->where('category_status', '1')->get();
        return view('pages.home', ['all_product' => $all_product], ['all_category' => $all_category]);
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
    public function detail($product_id)
    {
        $detail_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        return view('pages.product_detail', ['detail_product' => $detail_product]);

    }
    public function login()
    {
        return view('pages.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
