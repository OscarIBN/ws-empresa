<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Validator;

class enterpriseController extends Controller
{
    protected $data = [
        'message' => 'OK',
        'error' => null,
        'enterprise' => null,
        'status' => 200
    ];
    public function readAll()
    {
        $enterprises = Enterprise::all();

        if ($enterprises->isEmpty()) {
            $this->data['message'] = 'Sin registros';
            return response()->json($this->data, $this->data['status']);
        }

        $this->data['enterprise'] = $enterprises;

        return response()->json($this->data, $this->data['status']);
    }

    public function readOne($nit)
    {
        $enterprise = Enterprise::where('nit', $nit)->first();

        if (!$enterprise) {
            $this->data['message'] = 'No existe empresa con ese nit';
            return response()->json($this->data, $this->data['status']);
        }

        $this->data['enterprise'] = $enterprise;

        return response()->json($this->data, $this->data['status']);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nit' => 'required|unique:empresas|max:20',
            'nombre' => 'required|unique:empresas|max:255|min:2',
            'direccion' => 'required|max:255|min:2',
            'telefono' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            $this->data['message'] = 'Datos no válidos';
            $this->data['error'] = $validator->errors();
            $this->data['status'] = 406;
            return response()->json($this->data, $this->data['status']);
        }

        $enterprise = Enterprise::create([
            'nit' => $request->nit,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'estado' => true,
        ]);

        if (!$enterprise) {
            $this->data['message'] = 'Sucedio un error al crear empresa';
            $this->data['status'] = 409;
            return response()->json($this->data, $this->data['status']);
        }

        $this->data['enterprise'] = $enterprise;
        $this->data['status'] = 201;

        return response()->json($this->data, $this->data['status']);

    }

    public function update(Request $request, $nit)
    {
        $enterprise = Enterprise::where('nit', $nit)->first();

        if (!$enterprise) {
            $this->data['message'] = 'No existe empresa con ese nit';
            return response()->json($this->data, $this->data['status']);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:empresas|max:255|min:2',
            'direccion' => 'required|max:255|min:2',
            'telefono' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            $this->data['message'] = 'Datos no válidos';
            $this->data['error'] = $validator->errors();
            $this->data['status'] = 406;
            return response()->json($this->data, $this->data['status']);
        }

        $enterprise->nombre = $request->nombre;
        $enterprise->direccion = $request->direccion;
        $enterprise->telefono = $request->telefono;
        $enterprise->estado = $request->estado;

        try {
            $enterprise->update($request->except('nit'));

            $this->data['enterprise'] = $enterprise;
            $this->data['status'] = 200;

            return response()->json($this->data, $this->data['status']);
        } catch (\Exception $e) {

            $this->data['enterprise'] = $enterprise;
            $this->data['error'] = $e->getMessage();
            $this->data['status'] = 500;

            return response()->json($this->data, $this->data['status']);
        }

    }

    public function destroy($nit)
    {
        $enterprise = Enterprise::where('nit', $nit)->first();

        if (!$enterprise) {
            $this->data['message'] = 'No existe empresa con ese nit';
            return response()->json($this->data, $this->data['status']);
        }

        try {
            $enterprise->delete();

            $this->data['enterprise'] = $enterprise;
            $this->data['status'] = 200;

            return response()->json($this->data, $this->data['status']);
        } catch (\Exception $e) {

            $this->data['enterprise'] = $enterprise;
            $this->data['error'] = $e->getMessage();
            $this->data['status'] = 500;

            return response()->json($this->data, $this->data['status']);
        }

    }

}
