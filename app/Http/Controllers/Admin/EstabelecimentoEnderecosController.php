<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IEstabelecimentoEnderecosController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\EstabelecimentoEnderecoRequest;
use CodeDelivery\Repositories\EstabelecimentoEnderecoRepository;

class EstabelecimentoEnderecosController extends SimpleController implements IEstabelecimentoEnderecosController
{
    public function __construct(EstabelecimentoEnderecoRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'EstabelecimentoEnderecos';

        $this->route = 'admin.estabelecimentos.enderecos';
    }

    public function store(EstabelecimentoEnderecoRequest $request)
    {
        try {
            $data = $request->all();

            $entity = $this->repository->create($data);

            return redirect()->route($this->route . '.show', [ 'id' => $entity->id ])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function update(EstabelecimentoEnderecoRequest $request, $id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->repository->update($data, $entity->id);

            return redirect()->route($this->route . '.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }
}