<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZapatoRequest;
use App\Http\Requests\UpdateZapatoRequest;
use App\Models\Zapato;

class ZapatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zapatos = Zapato::all();

        return view('productos.index', [
            'zapatos' => $zapatos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Zapato();

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
    public function store(StoreZapatoRequest $request)
    {
        $validados = $request->validated();

        $producto = new Zapato();
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
     * @param  \App\Models\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function show(Zapato $zapato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Zapato::findOrFail($id);

        return view('productos.edit', [
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateZapatoRequest  $request
     * @param  \App\Models\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $validados = request()->validate([
            'nombre'=> 'required|string|max:255',
            'descripcion'=> 'required',
            'precio'=> 'required',
        ]);

        $producto = Zapato::findOrFail($id);
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
     * @param  \App\Models\Zapato  $zapato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zapato $zapato)
    {
        //
    }
}
