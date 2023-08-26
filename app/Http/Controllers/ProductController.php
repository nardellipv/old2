<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Branch;
use App\Models\Product;

class ProductController extends Controller
{
    public function listProduct()
    {
        if (checkUserBranch()[1]) {
            $products = Product::where('branch_id', checkUserBranch()[1]->id)
                ->get();
        } else {
            $products = Product::get();
        }

        return view('admin.products.indexProduct', compact('products'));
    }

    public function addNewProduct()
    {
        $branches = Branch::get();

        return view('admin.products.addProduct', compact('branches'));
    }
    public function addProduct(AddProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'offer' => $request->offer,
            'point' => $request->point,
            'point_changed' => $request->point_changed,
            'branch_id' => $request->branch_id,
            'show' => $request->show,
            'exchange' => $request->exchange,
        ]);

        toast('Se agregó el producto' . $product->name . ' correctamente', 'success');
        return redirect()->route('list.product');
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $branches = Branch::get();

        return view('admin.products.editProduct', compact('product', 'branches'));
    }

    public function upgradeProduct(EditProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->offer = $request->offer;
        $product->point = $request->point;
        $product->point_changed = $request->point_changed;
        $product->branch_id = $request->branch_id;
        $product->show = $request->show;
        $product->exchange = $request->exchange;
        $product->save();

        toast('Se editó el producto' . $product->name . ' correctamente', 'success');
        return redirect()->route('list.product');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        toast('Se eliminó el producto' . $product->name . ' correctamente', 'success');
        return redirect()->route('list.product');
    }

    public function activeExchangeProduct($id)
    {
        $productExchange = Product::find($id);
        $productExchange->exchange = 'N';
        $productExchange->save();

        toast('Se activo el cambio para el producto' . $productExchange->name . ' correctamente', 'success');
        return redirect()->route('list.product');
    }

    public function desactiveExchangeProduct($id)
    {
        $productExchange = Product::find($id);
        $productExchange->exchange = 'Y';
        $productExchange->save();

        toast('Se desactivo el cambio para el producto' . $productExchange->name . ' correctamente', 'success');
        return redirect()->route('list.product');
    }
}
