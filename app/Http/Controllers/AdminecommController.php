<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Review;




use Illuminate\Support\Str;

class AdminecommController extends Controller
{
    public function AdminHome()
    {
        return view('admin.Home');
    }

    public function AllProducts()
    {
        $Allproducts = Product::all();
        return view('admin.AllProducts', compact('Allproducts'));
    }

    public function AddProduct()
    {
        $AllCategories = Category::all();
        return view('admin.addproduct', ['AllCategories' => $AllCategories]);
    }

    public function EditProduct($productid = null)
    {
        if ($productid != null) {
            $AllCategories = Category::all();
            $currentProduct = Product::find($productid);
            if ($currentProduct == null) {
                abort(403, 'not found product');
            }
            return view('admin.editproduct', ['product' => $currentProduct, 'AllCategories' => $AllCategories]);
        } else {
            return redirect('addproduct');
        }
    }

    public function RemoveProduct($productid)
    {
        if ($productid) {
            $currentProduct = Product::find($productid);
            if ($currentProduct) {
                $currentProduct->delete();
                return redirect()->back()->with('message', 'The Product deleted successfully');

            }
        }
        abort(403, 'Please enter a valid product id in the route');
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:30'],
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => '',
            // 'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if a file has been uploaded
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('image', 'public');
        } else {
            $path = null;
        }

        // Set default value for nameEn if not provided
        $nameEn = $request->input('nameEn', '');

        // Editing an existing product
        if ($request->id) {
            $currentProduct = Product::find($request->id);
            if (!$currentProduct) {
                abort(404, 'Product not found');
            }
            $currentProduct->name = $request->name;
            $currentProduct->price = $request->price;
            $currentProduct->quantity = $request->quantity;
            $currentProduct->category_id = $request->category_id;
            $currentProduct->nameEn = $nameEn; // Assigning the value here
            if ($path) {
                $currentProduct->imagepath = $path;
            }
            $currentProduct->save();
            return redirect()->back()->with('message', 'The Product updated successfully');
        } else {
            // Adding a new product
            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->quantity = $request->quantity;
            $newProduct->category_id = $request->category_id;
            $newProduct->imagepath = $path;
            $newProduct->nameEn = $nameEn; // Assigning the value here
            $newProduct->save();
            return redirect()->back()->with('message', 'The Product added successfully');
        }
    }



    public function AddProductImages ($productid) {

        $product = Product::find($productid);
        $productphotos=ProductPhoto::where('product_id',$productid)->get();


        return view('admin.addProductImages', ['product'=>$product,'productphotos'=>$productphotos]);
    }

    public function RemoveProductPhoto($productid)
    {
        if ($productid) {
            $currentProduct = ProductPhoto::find($productid);

            if ($currentProduct) {
                $currentProduct->delete();
                return redirect()->back()->with('message', 'image deleted successfully');
            }
        }

        abort(403, 'Please enter a valid product id in the route');
    }


    public function StoreProductImage(Request $request){
        $request->validate([
            'product_id'=>'required',

            'photo' =>'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $path_ = $request->file('photo')->storeAs('image', Str::uuid()->toString().'.'.$request->file('photo')->getClientOriginalExtension() , 'public');
        $newImage = new ProductPhoto();
        $newImage->product_id=$request->product_id;
        $newImage->imagepath=$request->photo;

        $path='';
        if($request->has('photo')){
        $path=$request->photo->move('image',Str::uuid()->toString().'.'.$request->file('photo')->getClientOriginalExtension() );

        }
        $newImage -> imagepath =$path;


        $newImage -> save();



            return redirect('/');







    }
    public function charts(){
        $randomProducts = Product::inRandomOrder()->take(10)->get();

        $products = Product::all();

        foreach ($randomProducts as $product) {
            $product->sales = rand(100, 1000);
        }


        return view('admin.charts', [
            'randomProducts' => $randomProducts,
            'products' => $products
        ]);
    }

    public function Bills(){
        $bills=Order::with('orderdetails')->get();

        return view('admin.bills',compact('bills'));
    }

    public function Reviews(){
        $reviews=Review::all();

        return view('admin.customerOpinions',compact('reviews'));
    }


    public function approvedBills($id){
        $data=Bills::find($id);

        $data->status='approved';
        $data->save();
        return redirect()->back();

    }
    public function cancelledBills($id){
        $data=Bills::find($id);

        $data->delete();

        return redirect()->back()->with('message', ' The bill Deleted successfully');


    }

    public function DeleteOpinion($id){
        $data=Review::find($id);

        $data->delete();
        return redirect()->back()->with('message', 'Deleted successfully');


    }
    



    }






