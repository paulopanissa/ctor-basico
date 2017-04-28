<?php

namespace App\Http\Controllers;

use App\Entities\SetProfession;

class ConfigProfissaoController extends Controller
{
    use ApiControllerTrait;

    protected $model;

    public function __construct(SetProfession $profession)
    {
        $this->model = $profession;
    }

    public function listAll()
    {
        return $this->model->orderBy('name', 'asc')->get();
    }
}
