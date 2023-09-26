<?php

namespace App\Services;

use App\Repositories\EasyModelRepository;
use Illuminate\Http\Response;

class EasyModelService
{

    protected $repository;

    public function __construct(EasyModelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTemplatecontent()
    {
        $template_file = $this->repository->getTemplate();
        abort_if(!file_exists($template_file), Response::HTTP_CONFLICT, "Template file: \"$template_file\", not found");
        $content = file_get_contents($template_file);
        return $content;
    }

    public function getPlaceholdercontent()
    {
        $placeholder_file = $this->repository->getPlaceholder();
        abort_if(!file_exists($placeholder_file), Response::HTTP_CONFLICT, "Placeholder file: \"$placeholder_file\", not found ");
        $content = file_get_contents($placeholder_file);
        return $content;
    }

    public function parser()
    {
        $template_content = $this->getTemplatecontent();
        $json = $this->getPlaceholdercontent();
        $placeholders = json_decode($json);
        $parsed_content = $this->repository->parse($template_content, $placeholders);

        $newFileName = $placeholders->{'class_name'} . '.php';
        $path = $placeholders->{'path'};

        $exists = $this->repository->fileExist($path, $newFileName);
        abort_if($exists, Response::HTTP_CONFLICT, "This Model already exist");
        $this->repository->createFile($newFileName, $parsed_content, $path);
        return $parsed_content;
    }
}
