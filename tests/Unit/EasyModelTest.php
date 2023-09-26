<?php

namespace Tests\Unit;

use App\Repositories\EasyModelRepository;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Mockery;

class EasyModelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_template()
    {
        $repo = new EasyModelRepository();
        $template = file_get_contents(public_path($repo->getTemplate()));
        $this->assertIsString($repo->getTemplate());
        $this->assertStringContainsStringIgnoringCase('template.html', $repo->getTemplate());
        $this->assertFileExists((public_path($repo->getTemplate())), "given filename doesn't exists");
        $this->assertNotEquals($template,'');
    }

    
    public function test_placeholder()
    {
        $repo = new EasyModelRepository();
        $content = file_get_contents(public_path($repo->getPlaceholder()));
        $this->assertIsString($repo->getPlaceholder());
        $this->assertStringContainsStringIgnoringCase('array.json', $repo->getPlaceholder());
        $this->assertFileExists((public_path($repo->getPlaceholder())), "given filename doesn't exists");
        $this->assertNotEquals($content,'');
        $this->assertStringContainsString('name', $content);
        $this->assertStringContainsString('scope', $content);
    }

    // public function test_file()
    // {
    //     $repo = new EasyModelRepository();
    //     $this->assertFileExists((app_path($repo->fileExist($path, $newFileName))), "given filename doesn't exists");
    // }
}
