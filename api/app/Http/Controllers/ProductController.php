<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return response()->json(
            [
                'products' => $products,
                'message' => 'Success',
                'code' => 200
            ]
        );
    }
    public function addProduct(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        return response()->json(
            [
                'product' => $product,
                'message' => 'Product Added Successfully',
                'code' => 200
            ]
        );
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(
                [
                    'message' => 'Product Deleted Successfully',
                    'code' => 200
                ]
            );
        } else {
            return response()->json(
                [
                    'message' => 'Product Not Found',
                ]
            );
        }
    }

    public function product($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(
                [
                    'product' => $product,
                    'message' => 'Success',
                    'code' => 200
                ]
            );
        } else {
            return response()->json(
                [
                    'message' => 'Product Not Found',
                ]
            );
        }
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->save();
            return response()->json(
                [
                    'product' => $product,
                    'message' => 'Product Updated Successfully',
                    'code' => 200
                ]
            );
        } else {
            return response()->json(
                [
                    'message' => 'Product Not Found',
                ]
            );
        }
    }
}
