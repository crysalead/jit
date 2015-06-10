<?php
namespace spec\fixture\interceptor;

class StaticClassKeyword
{
    public function name()
    {
        return static::class;
    }
}
