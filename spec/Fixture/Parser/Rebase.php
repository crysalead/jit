<?php
namespace Lead\Jit\Spec\Fixture\Parser;

class Example
{
    public $path = __DIR__ . '/file.json';

    public function load()
    {
        require __FILE__;
    }

    public function filename()
    {
        return basename(__FILE__);
    }

    public function path()
    {
        return __DIR__;
    }
}
