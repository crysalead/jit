<?php
namespace Lead\Jit\Spec\Fixture\Parser;

class Example
{
    public $path = '/the/original/path' . '/file.json';

    public function load()
    {
        require '/the/original/path/Rebase.php';
    }

    public function filename()
    {
        return basename('/the/original/path/Rebase.php');
    }

    public function path()
    {
        return '/the/original/path';
    }
}
