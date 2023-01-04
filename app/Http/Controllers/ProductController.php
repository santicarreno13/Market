<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;


class ProductController extends Controller
{


    public function details(Product $product)
    {
        return view('Products.details',compact('product'));
    }

    public function alldetails()
    {
        return view('Products.alldetails');
        // ,compact('alldetails')
    }
    public function showProducts()
    {
        return view('Products.index');
    }

    public function showHomeWithProducts()
    {
        $products = Product::with('Categories');
        $products = $this->getAllProducts()->original['products'];
        $productstwo = $this->getAllProductstwo()->original['products'];
        $productsthree = $this->getAllProductsthree()->original['products'];
        return view('index', compact('products','productstwo','productsthree'));
    }

    public function getAllProducts()
    {
        $products = Product::where('category_id', 1)->take(3)->get(); //With funciona mientras hace una consulta
        return response()->json(['products' => $products],200);
    }
    public function getAllProductstwo()
    {
        $products = Product::where('category_id', 2)->take(3)->get(); //With funciona mientras hace una consulta
        return response()->json(['products' => $products],200);
    }
    public function getAllProductsthree()
    {
        $products = Product::where('category_id', 3)->take(3)->get(); //With funciona mientras hace una consulta
        return response()->json(['products' => $products],200);
    }

    public function getAllProductsForDataTable()
    {
      
        // $products = Product::get();
        $products = Product::with('Category');
		return DataTables::of($products)
			->addColumn('action', function ($row) {
				return "<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='edit'
				class='btn btn-warning btn-sm'>Edit</a>
				<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='delete'
				class='btn btn-danger btn-sm'>Delete</a>";
			})
			->rawColumns(['action'])
			->make();    
    }
    public function getAProduct(Product $product)
    {
      
        $product->load('Category'); //Load funciona despues de haber echo una consulta
        return response()->json(['product' => $product],200);

    }

    public function getAnProduct(Product $product)
    {

        return response()->json(['product' => $product],200);

    }

    public function createProduct(CreateProductRequest $request)
    {

        $product = new Product($request->all());
        $product->save();
        return response()->json(['product' => $product],201);

    }

    public function updateProducts(Product $product, UpdateProductRequest $request)
    {

        
        $product->update($request->all());
        return response()->json(['product' => $product->refresh()],201);

    }

    public function deleteProducts(Product $product)
    {

        $product->delete();
        return response()->json([],204);

    }

    public function saveProduct(Request $request)
	{
		$product = new Product($request->all());
        $this->uploadImages($request, $product);
		$product->save();
		return response()->json(['product' => $product->load('Category')], 201);
	}

    public function updateProduct(Product $product, Request $request)
    {

         $requestAll = $request->all();
        $this->uploadImages($request, $product);
         $requestAll['image'] = $product->image;
        $product->update($requestAll);
        return response()->json(['product' => $product->refresh()->load('Category')],201);
    }

     public function deleteProduct(Product $product){

        $product->delete();
        return response()->json([],204);

    }

    private function uploadImages($request, &$product)
	{
		if (!isset($request->image)) return;
		$random = Str::random(20);
		$image_name = "{$random}.{$request->image->clientExtension()}";
		$request->image->move(storage_path('app/public/images'), $image_name);
		$product->image = $image_name;
	}
    
}
