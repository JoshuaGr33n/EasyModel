<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class EasyModelRepository
{
    private function path($placeholder_data)
    {
        return 'Models\\' . ucfirst(Str::camel($placeholder_data->{'scope'}[0])) .
            '\\' . ucfirst(Str::camel($placeholder_data->{'scope'}[1]));
    }
    private function scope($placeholder_data)
    {
        return 'Apps\\Models\\' . ucfirst(Str::camel($placeholder_data->{'scope'}[0])) .
            '\\' . ucfirst(Str::camel($placeholder_data->{'scope'}[1]));;
    }


    public function getTemplate()
    {
        $template = 'template.html';
        return $template;
    }

    public function getPlaceholder()
    {
        $placeholders = 'array.json';
        return $placeholders;
    }

    function parse($template_content, $placeholder_data)
    {
        $placeholder_data->{'path'} = $this->path($placeholder_data);
        $placeholder_data->{'scope'} = $this->scope($placeholder_data);

        foreach ($placeholder_data as $placeholder_key => $placeholder_value) {
            $placeholder_data->{'table_name'} = "'" . str_replace(' ', '-', $placeholder_data->{'name'}) . "'";
            $placeholder_data->{'class_name'} = ucfirst(Str::camel($placeholder_data->{'name'}));
            
            $template_content = str_replace('{' . $placeholder_key . '}', $placeholder_value, $template_content);
        }
        return $template_content;
    }

    function createFile($newFileName, $parsed_content, $path)
    {
        $disk = Storage::build([
            'driver' => 'local',
            'root' => app_path($path),
        ]);
        $disk->put($newFileName, "<?php\n {$parsed_content}");
    }

    function fileExist($path, $newFileName)
    {
        $exists = File::exists(app_path("{$path}/{$newFileName}"));
        return $exists;
    }



}
