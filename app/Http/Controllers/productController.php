<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function listProducts()
    {
        $listProduct = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'product.name', 'product.price', 'product.category_id', 'category.nameCategory', 'product.price', 'product.view', 'product.create_at', 'product.update_at')
            ->get();
        return view('products/listProduct')->with([
            'listProduct' => $listProduct
        ]);
    }
    public function addProducts()
    {
        $category = DB::table('category')
            ->select('id', 'nameCategory')
            ->get();
        return view('products/addProducts')
            ->with(['category' => $category]);
    }

    public function addPostProducts(Request $req)
    {
        $data = [
            'name' => $req->name,
            'category_id' => $req->category,
            'price' => $req->price,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),

        ];
        DB::table('product')->insert($data);
        return redirect()->route('products.listProducts');
        
    }


    public function deleteProducts($userId)
    {
        DB::table('product')->where('id', $userId)->delete();
        return redirect()->route('products.listProducts');
    }
    public function updateProducts($userId)
    {
        $category = DB::table('category')
            ->select('id', 'nameCategory')
            ->get();
        $product = DB::table('product')->where('id', $userId)->first();
        return view('products/updateProduct')
            ->with([
                'product' => $product,
                'category' => $category
            ]);
    }

    public function updatePostProducts(Request $req)
    {
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'category_id' => $req->category,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),

        ];
        DB::table('product')->where( 'id',$req->idUser)->update($data);
        return redirect()->route('products.listProducts');
    }
    public function searchProducts(){
        $data = $_GET['timkiem'];
        $timkiem = DB::table('product')->where('name','like',$data)
        ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'product.name', 'product.price', 'product.category_id', 'category.nameCategory', 'product.price', 'product.view', 'product.create_at', 'product.update_at')
            ->get();

        return view('products/searchProducts')
            ->with(['timkiem' => $timkiem]);
        
    }
}
