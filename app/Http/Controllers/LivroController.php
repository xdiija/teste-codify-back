<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLivroRequest;
use App\Http\Resources\LivroResource;
use App\Models\Livro;
use Exception;

class LivroController extends Controller
{
    public function __construct(
        protected Livro $model
    ) {}
    public function index()
    {
        return LivroResource::collection(
            $this->model->with(['autor', 'editora'])->get()
        );
    }
    public function store(StoreUpdateLivroRequest $request)
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
        return new LivroResource(
            $this->model->with(['autor', 'editora'])->find($id)
        );
    }

    public function update(StoreUpdateLivroRequest $request, string $id)
    {
        try {
            $livro = $this->model->findOrFail($id);
            $status = $livro->update($request->all()) ? "SUCCESS" : "ERROR_cod1";
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
