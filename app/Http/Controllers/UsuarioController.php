<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function __construct(
        protected Usuario $model
    ) {}
    public function index()
    {
        return UsuarioResource::collection($this->model->all());
    }

    public function store(StoreUpdateUsuarioRequest $request)
    {
        $data = $request->validated();
        $data['senha'] = bcrypt($request->senha);
        return new UsuarioResource(
            $this->model->create($data)
        );
    }

    public function show(string $id)
    {
        return new UsuarioResource($this->model->findOrFail($id));
    }

    public function update(StoreUpdateUsuarioRequest $request, string $id)
    {
        $usuario = $this->model->findOrFail($id);
        $data = $request->all();
        if($request->senha) $data['senha'] = bcrypt($request->senha);
        $usuario->update($data);
        return new UsuarioResource($usuario);
    }

    public function destroy(string $id)
    {
        $this->model->findOrFail($id)->delete();
        return response([], 204);
    }
}
