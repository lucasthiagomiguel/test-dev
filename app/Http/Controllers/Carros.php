<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;
use App\Marca;
use Illuminate\Support\Facades\DB;

class Carros extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros =  DB::table('carros')
            ->where('carros.ativo', '=', 1)
            ->leftJoin('marcas', 'marcas.id', '=', 'carros.marca')
            ->select('carros.*','marcas.nome AS marcaCarro')
            ->get();
        return json_encode($carros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Carro();
        $car->ativo = 1;
        $car->nome = $request->input("nome");
        $car->marca = $request->input("marca");
        $car->modelo = $request->input("modelo");
        $car->save();
        return json_encode($car);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Carro::find($id);
        if(isset($car)){
            return json_encode($car);
        }
        return response("Produto nao encontrado",404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $car = Carro::find($id);
        if(isset($car)){

        $car = DB::table('carros')
                 ->where('id', $id)
                 ->update(['ativo' => 1,'nome' => $request->input("nome"),'marca' => $request->input("marca"),'modelo' => $request->input("modelo")]);
                 $car = Carro::find($id);
        return json_encode($car);    
      }
      return response("Produto nao encontrado",404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $car = Carro::find($id);
      if(isset($car)){

        $car = DB::table('carros')
                 ->where('id', $id)
                 ->update(['ativo' => 2]);
        return response("ok",200);
      }
      return response("Produto nao encontrado",404);
    }
    public function marcasJson()
    {
        $marca = Marca::all();
        return json_encode($marca);
    }
}
