<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEditoraRequest;
use App\Http\Resources\EditoraResource;
use App\Models\Editora;
use Exception;

class EditoraController extends Controller
{
    public function __construct(
        protected Editora $model
    ) {}
    public function index()
    {
        return EditoraResource::collection($this->model->all());
    }

    public function store(StoreUpdateEditoraRequest $request)
    {
        try {
            $status = $this->model->create($request->validated()) ? "SUCCESS" : "ERROR";
        } catch (Exception $e) {
            $status = "ERROR_cod2 $e";
        }
        return response(['status' => $status], 200);
    }

    public function show(string $id)
    {
        return new EditoraResource($this->model->find($id));
    }

    public function update(StoreUpdateEditoraRequest $request, string $id)
    {
        try {
            $editora = $this->model->findOrFail($id);
            $status = $editora->update($request->all()) ? "SUCCESS" : "ERROR_cod1";
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
