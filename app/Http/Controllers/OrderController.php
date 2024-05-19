<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    // public function showOrders()
    // {
    //     $all_orders = DB::table('order_details')
    //         ->join('order_statuses', 'order_details.status', '=', 'order_statuses.status_code')
    //         ->join('tbl_product', 'order_details.product_id', '=', 'tbl_product.product_id')
    //         ->select('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text', DB::raw('GROUP_CONCAT(tbl_product.product_name) as product_names'))
    //         ->groupBy('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text')
    //         ->paginate(3);


    //     return view('admin.show_orders', ['all_orders' => $all_orders]);
    // }

    public function sort(Request $request)
    {
        $sort = $request->input('sort');

        switch ($sort) {
            case 'id_order_asc':
                $all_orders = DB::table('order_details')
                    ->join('order_statuses', 'order_details.status', '=', 'order_statuses.status_code')
                    ->join('tbl_product', 'order_details.product_id', '=', 'tbl_product.product_id')
                    ->select('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text', DB::raw('GROUP_CONCAT(tbl_product.product_name) as product_names'))
                    ->groupBy('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text')
                    ->orderBy('id_order', 'desc')
                    ->paginate(2);
                break;
            case 'id_order_desc':
                $all_orders = DB::table('order_details')
                    ->join('order_statuses', 'order_details.status', '=', 'order_statuses.status_code')
                    ->join('tbl_product', 'order_details.product_id', '=', 'tbl_product.product_id')
                    ->select('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text', DB::raw('GROUP_CONCAT(tbl_product.product_name) as product_names'))
                    ->groupBy('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text')
                    ->orderBy('id_order', 'asc')
                    ->paginate(2);
                break;
            default:
                $all_orders = DB::table('order_details')
                    ->join('order_statuses', 'order_details.status', '=', 'order_statuses.status_code')
                    ->join('tbl_product', 'order_details.product_id', '=', 'tbl_product.product_id')
                    ->select('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text', DB::raw('GROUP_CONCAT(tbl_product.product_name) as product_names'))
                    ->groupBy('order_details.id_order', 'order_details.user_id', 'order_details.place_id', 'order_statuses.status_text')
                    ->orderBy('id_order', 'asc')
                    ->paginate(2);
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

        $status_order = DB::table('order_statuses')
            ->get();

        $current_status = $order_details[0]->status;
        $id_order = $order_details[0]->id_order;

        $current_status_text = DB::table('order_statuses')
            ->where('status_code', $current_status)
            ->get();

        return view('admin.details_order', [
            'order_detail' => $order_details,
            'info' => $info,
            'total' => $total,
            'status_order' => $status_order,
            'current_status' => $current_status_text,
            'id_order' => $id_order

        ]);
    }

    public function updateStatus(Request $request, $id_order)
    {
        $status = $request->input('update_status');

        DB::table('order_details')
            ->where('id_order', $id_order)
            ->update(['status' => $status]);

        return redirect('/show-orders');
    }

}
