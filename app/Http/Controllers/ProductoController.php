<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', [
            'productos' => $productos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();

        return view('productos.create', [
            'producto' => $producto,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreZapatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $validados = $request->validated();

        $producto = new Producto();
        $producto->nombre = $validados['nombre'];

        $image = $request->file('imagen');
            /* Movemos a la carpeta deseada */
            $image->move(public_path('img'), $image->getClientOriginalName());

            /* $image->move('img', $image->getClientOriginalName()); */
            /* Lo guardamos en la base de datos como string */
            $producto->imagen = "img/" . $image->getClientOriginalName();

        $producto->descripcion = $validados['descripcion'];
        $producto->precio = $validados['precio'];

        $producto->save();

        return redirect('/productos')
            ->with('success', 'Producto insertado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('productos.edit', [
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $validados = request()->validate([
            'nombre'=> 'required|string|max:255',
            'descripcion'=> 'required',
            'precio'=> 'required',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $validados['nombre'];
        $producto->descripcion = $validados['descripcion'];
        $producto->precio = $validados['precio'];
        $producto->save();

        return redirect('/productos')
            ->with('success', 'Producto modificado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->back()
            ->with('success', 'Producto borrado correctamente');
    }
}
