<?php

namespace App\Http\Controllers;
use App\Services\EasyModelService;

class EasyModelController extends Controller
{
    protected $service;

    /**
     * Controller constructor.
     * @param Service $service
     */
    public function __construct(EasyModelService $service)
    {
        $this->service = $service;
    }

    public function store()
    {
        $this->service->parser();
        return  "Model Created successfully";
    }
}