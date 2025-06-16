<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('category')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    public function showById($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return $product;
    }

    public function show()
    {
        $products = Product::all();
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found'], 404);
        }
        return $products;
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $request->validate([
            'name'        => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
        ]);

        $product->update($request->all());
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    public function filterByCategory(Request $request)
    {
        $category = $request->query('category');
        if (!$category) {
            return response()->json(['message' => 'Category query parameter is required'], 400);
        }

        $products = Product::whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        })->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found for this category'], 404);
        }

        return $products;
    }

    public function getProductByPage(Request $request)
    {
        $page = $request->query('page');
        $perPage = 2;

        if ($page) {
            $products = Product::with('category')->paginate($perPage, ['*'], 'page', $page);
            if ($products->isEmpty()) {
                return response()->json(['message' => 'No products found'], 404);
            }
            return response()->json($products->items());
        } else {
            return response()->json(['message' => 'Page query parameter is required'], 400);
        }
    }
}
