<?php

namespace App\Http\Controllers;

use App\Category;
use App\link;
use App\Post;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cat,$pro)
    {
          $cate = Category::where('nombre_categoria',$cat)->first();
          $prod = Product::where('nombre_producto',$pro)->first();


        return $cate .'   '.$prod;

    }
    public function ListP(){
        if (!Auth::check())
        {return Redirect::to('/login');}
        $link = link::all();
        $category = Category::all();
        $product = Product::all();
        return view('admin.product.List',['links'=>$link,'category'=>$category,'product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check())
        {return Redirect::to('/login');}
        $link = link::all();
        $category = Category::all();
        $post = Post::all();
        return view('admin.product.Create',['links'=>$link,'category'=>$category,'post'=>$post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'portada'=>"Portada",
            'titulo'=>"titulo",
            'descripcion'=>"descricion",
            'id_User'=>$request->id_User,
        ]);
        $posid = Post::groupBy('idPost')->orderBy('idPost','asc')->get()->last();

        $product = Product::create([
            'nombre_producto'=> $request->nombre_producto,
            'descripcion'=> $request->descripcion,
            'imagen1'=> $request->imagen1,
            'imagen2'=> $request->imagen2,
            'imagen3'=> $request->imagen3,
            'imagen4'=> $request->imagen4,
            'precio'=> $request->precio,
            'destacado'=> $request->destacado,
            'estado'=> $request->estado,
            'id_category'=>$request->id_category,
            'id_post'=> $posid->idPost
        ]);
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
