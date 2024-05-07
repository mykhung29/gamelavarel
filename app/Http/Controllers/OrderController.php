<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    public function showOrders()
    {
        $all_orders = DB::table('order_details')
            ->select('id_order', 'user_id', 'place_id', DB::raw('GROUP_CONCAT(product_id) as product_ids'))
            ->groupBy('id_order', 'user_id', 'place_id')
            ->paginate(3);



        return view('admin.show_orders', ['all_orders' => $all_orders]);
    }
    public function sort(Request $request)
    {
        $sort = $request->input('sort');

        switch ($sort) {
            case 'id_order_asc':
                $all_orders = DB::table('order_details')
                    ->select('id_order', 'user_id', 'place_id', DB::raw('GROUP_CONCAT(product_id) as product_ids'))
                    ->groupBy('id_order', 'user_id', 'place_id')
                    ->orderBy('id_order', 'asc')
                    ->paginate(3);
                break;
            case 'id_order_desc':
                $all_orders = DB::table('order_details')
                    ->select('id_order', 'user_id', 'place_id', DB::raw('GROUP_CONCAT(product_id) as product_ids'))
                    ->groupBy('id_order', 'user_id', 'place_id')
                    ->orderBy('id_order', 'desc')
                    ->paginate(3);
                break;
            default:
                $all_orders = DB::table('order_details')
                    ->select('id_order', 'user_id', 'place_id', DB::raw('GROUP_CONCAT(product_id) as product_ids'))
                    ->groupBy('id_order', 'user_id', 'place_id')
                    ->paginate(3);
                break;
        }

        return view('admin.show_orders', ['all_orders' => $all_orders]);
    }

    public function showOrderDetail($id_order, $id_user, $place_id)
    {

        $info = DB::table('orders')
            ->where('id_user', $id_user)
            ->where('id', $place_id)
            ->get();

        $order_details = DB::table('order_details')
            ->where('id_order', $id_order)
            ->where('user_id', $id_user)
            ->get();

        $total = DB::table('order_details')
            ->where('id_order', $id_order)
            ->where('user_id', $id_user)
            ->sum(DB::raw('price * quantity'));



        return view('admin.details_order', ['order_detail' => $order_details, 'info' => $info, 'total' => $total]);
    }

}
