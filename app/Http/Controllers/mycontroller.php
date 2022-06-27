<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
class mycontroller extends Controller
{
    public function index(){
        $products = Products::all();
        return view('index', compact('products'));
    }
    public function viewAddProduct(){
        return view('add-product');
    }
    public function postAddProduct(Request $rq){
        $this->validate(
            $rq,
            ['product_name'=>'required','product_company'=>'required','product_price'=>'required','product_descriptions'=>'required','product_image'=>'required'],
            ['product_name.required'=>'Nhập tên sản phẩm','product_company.required'=>'Nhập tên công ty','product_price.required'=>'Nhập đơn giá sản phẩm','product_image.required'=>'Tải hình ảnh sản phẩm','product_descriptions.required'=>'Nhập mô tả sản phẩm']
        );
// echo $rq -> product_name; die();
        $imageFileType = pathinfo($_FILES["product_image"]["name"],PATHINFO_EXTENSION);
        $filename = strtotime(now()).'.'.$imageFileType;
        $rq->file('product_image')->storeAs('images',$filename,'local');
        $new_products = new Products();
        $new_products->name = $rq -> product_name;
        $new_products->company = $rq -> product_company;
        $new_products->price = $rq -> product_price;
        $new_products->image = $filename;
        $new_products->description = $rq -> product_descriptions;
        $new_products->save();
        return redirect('/');
    }

    public function detailProduct($id){
        $product = Products::find($id);
        return view('detail-product',compact('product'));
    }
    public function editProduct($id){
        $product = Products::find($id);
        return view('add-product',compact('product'));
    }
    public function deleteProduct($id){
        $product = Products::find($id);
        $product->delete();
        return redirect('/');
    }
}
