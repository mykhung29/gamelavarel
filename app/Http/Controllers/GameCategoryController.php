<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class GameCategoryController extends Controller
{
    public function index()
    {
        $all_category_game = DB::table('categories_game')->get();
        return view('admin.show_type', compact('all_category_game'));
    }

    public function create()
    {
        return view('admin.add_type');
    }

    public function store(Request $request)
    {
        DB::table('categories_game')->insert([
            'name' => $request->category_game_name,
            'description' => $request->category_game_description
        ]);

        return redirect('/show-type');
    }
    public function delete($id)
    {
        DB::table('categories_game')->where('id', $id)->delete();
        Session::put('message', 'Đã xóa');
        return Redirect::to('/show-type');
    }


}