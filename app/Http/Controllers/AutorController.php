<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAutorRequest;
use App\Http\Resources\AutorResource;
use App\Models\Autor;
use Exception;

class AutorController extends Controller
{
    public function __construct(
        protected Autor $model
    ) {}
    public function index()
    {
        return AutorResource::collection($this->model->all());
    }

    public function store(StoreUpdateAutorRequest $request)
    {
        try {
            $status = $this->model->create($request->validated()) ? "SUCCESS" : "ERROR";
        } catch (Exception $e) {
            $status = "ERROR_cod2 $e";
        }
        return response([$status], 200);
    }

    public function show(string $id)
    {
        return new AutorResource($this->model->find($id));
    }

    public function update(StoreUpdateAutorRequest $request, string $id)
    {
        try {
            $autor = $this->model->findOrFail($id);
            $status = $autor->update($request->all()) ? "SUCCESS" : "ERROR_cod1";
        } catch (Exception $e) {
            $status = "ERROR_cod2 $e";
        }
        return response(['status' => $status], 200);
    }

    public function destroy(string $id)
    {
        $this->model->findOrFail($id)->delete();
        return response()->noContent(201);
    }
}
