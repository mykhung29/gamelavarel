<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashbroad');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function addProduct()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category')->orderBy('category_id', 'desc')->get();
        $type_product = DB::table('categories_game')->orderBy('id', 'desc')->get();
        return view('admin.add_product', [
            'cate_product' => $cate_product,
            'type_product' => $type_product
        ]);
    }

    public function showProduct()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->get();
        $all_quantity = DB::table('tbl_product')
            ->leftJoin('inventory', 'tbl_product.product_id', '=', 'inventory.product_id')
            ->select('tbl_product.product_id', 'tbl_product.product_name', DB::raw('SUM(inventory.quantity_product) as total_quantity'))
            ->groupBy('tbl_product.product_id', 'tbl_product.product_name')
            ->get();

        return view('admin.show_product', [
            'all_product' => $all_product,
            'inventory' => $all_quantity
        ]);
    }

    public function saveProduct(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_category'] = $request->product_category;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_video'] = $request->product_video;
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;
        $data['product_type'] = $request->product_type;

        $get_img = $request->file('product_img');
        if ($get_img) {
            $originalName = $get_img->getClientOriginalName();
            $extension = $get_img->getClientOriginalExtension();
            $filename = pathinfo($originalName, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $extension;

            $data['product_img'] = $filename;
            $get_img->move('public/img_upload/product', $filename);
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('/add-product');
        } else {
            $data['product_img'] = '';
            DB::table('tbl_product')->update($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('/add-product');
        }
    }

    public function activeProduct($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Đã hiện');
        return Redirect::to('/show-product');
    }

    public function unactiveProduct($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Đã ẩn');
        return Redirect::to('/show-product');
    }

    public function deleteProduct($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Đã xóa');
        return Redirect::to('/show-product');
    }

    public function editProduct($product_id)
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $all_category = DB::table('tbl_category')->orderBy('category_id', 'desc')->get();
        $all_type = DB::table('categories_game')->orderBy('id', 'desc')->get();
        return view('admin.edit_product', [
            'edit_product' => $all_product,
            'edit_category' => $all_category,
            'edit_type' => $all_type
        ]);
    }

    public function updateProduct(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_category'] = $request->product_category;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_video'] = $request->product_video;
        $data['product_desc'] = $request->product_desc;
        $data['product_type'] = $request->product_type;


        $get_img = $request->file('product_img');
        if ($get_img) {

            $originalName = $get_img->getClientOriginalName();


            $extension = $get_img->getClientOriginalExtension();

            $filename = pathinfo($originalName, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $extension;

            $data['product_img'] = $filename;
            $get_img->move('public/img_upload/product', $filename);
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('/show-product');
        } else {
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('/show-product');
        }
    }

    public function managerProduct()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
        return view('admin.inventory', [
            'product' => $all_product
        ]);
    }

    public function storeInventory(Request $request)
    {
        $this->AuthLogin();
        // Lấy dữ liệu từ form
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Tạo một mảng chứa dữ liệu cần thêm vào bảng inventory
        $data = array();
        $data['product_id'] = $product_id;
        $data['quantity_product'] = $quantity;

        // Thêm dữ liệu vào bảng inventory
        DB::table('inventory')->insert($data);


        return Redirect::to('/show-product');
    }
}
