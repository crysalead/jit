<?php
namespace Lead\Jit\Spec\Fixture;

class StaticClassKeyword
{
    public function name()
    {
        return static::class;
    }

    public function alternativeSyntax()
    {
        return StaticClassKeyword::class;
    }
}
