<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::all();
        return view('products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource. If product exists, it will be updated to edit the product.
     */
    public function create(): View
    {
      return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
      Product::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'location'=>$request->location,
        'check'=>$request->check,
        'created_at'=>$request->created_at,
        'updated_at'=>$request->update_at,
        'hold_reason'=>$request->hold_reason,
        'code'=>$request->code,
        'image'=>$request->image,
        'storage_time'=>$request->storage_time,
        'priority'=>$request->priority,
        'acquired_from'=>$request->acquired_from,
        'acquire_date'=>$request->acquire_date,
        'warranty_term'=>$request->warranty_term,
        'receipt_link'=>$request->receipt_link,
        'user_id'=>$request->user_id,
     ]);
      $product = Product::first();
      $tags = explode(',', $request->tags);
      foreach ($tags as $tag) {
          $tag = trim($tag);
          if (!empty($tag)) {
              $newTag = Tag::firstOrCreate(['name' => $tag]);
              $product->relTags()->sync($newTag->id);
          }
      }
      return to_route('product.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
      $tags = Product::findOrFail($product->id)->relTags;
      return view('products.create', compact('product', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
      $product->update($request->all());


      $product->relTags()->sync($request->tags);

      return redirect()->route('product.index')->with('success', 'Item atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
      $product->relTags()->detach();
      $product->delete();
      return redirect()->route('product.index')->with('success', 'Item excluído com sucesso!');
    }
}
