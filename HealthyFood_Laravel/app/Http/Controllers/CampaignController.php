<?php

namespace App\Http\Controllers;

use App\Category;
use App\Campaign;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use function Sodium\add;

class CampaignController extends Controller
{

    public  function  all(){
        $products = Campaign::with("Category")->get();
        return view('product.list',[
            "products"=>$products
        ]);
    }

    public  function  create(){
        $categories = Category::all();
        return view('product.create',[
            "categories" => $categories
        ]);
    }

    public function save(Request  $request){
        $image = $request->get("image");
        $description = $request->get("description");
        $price = $request->get("price");
        $qty = $request->get("qty");
        $category_id = $request->get("category_id");

        $request->validate([
            "name" => "required",
            "image" => "required",
            "price" => "required|min:0",
            "qty" => "required|min:1",
            "category_id" => "required|numeric|min:1",
        ]);
        try {
            Campaign::create([
                "image"=>$image,
                "description"=>$description,
                "price"=>$price,
                "qty"=>$qty,
                "category_id"=>$category_id,
            ]);
        } catch (\Exception $e) {
            abort(404);
        }
        return redirect()->to("product");
    }

    public function edit($id)
    {
        $categories = Category::all();
        $pr = Campaign::findOrFail($id);
        if($pr == null) return redirect()->to("product");
        return  view('product.edit',[
            "pr"=>$pr,
            "categories"=>$categories
        ]);

    }

    public  function update($id, Request $request){
        $pr = Campaign::findOrFail($id);
        if($pr == null)  return redirect()->to("product");

        $pr->update([
            "image"=>$request->get("image"),
            "description"=>$request->get("description"),
            "price"=>$request->get("price"),
            "qty"=>$request->get("qty"),
            "category_id"=>$request->get("category_id"),
        ]);
        return redirect()->to("product");
    }
}
