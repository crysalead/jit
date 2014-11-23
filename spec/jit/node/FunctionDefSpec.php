<?php
namespace spec\jit;

use jit\node\FunctionDef;

describe("FunctionDef", function() {

    describe("->argsToParams()", function() {

        it("builds a list of params from function arguments", function() {
            $sample = file_get_contents('spec/fixture/parser/Function.php');
            $node = new FunctionDef();
            $node->args = [
                '$required',
                '$param'    => '"value"',
                '$boolean'  => 'false',
                '$array'    => '[]',
                '$array2'   => 'array()',
                '$constant' => 'PI'
            ];
            expect($node->argsToParams())->toBe('$required, $param, $boolean, $array, $array2, $constant');
        });

    });

});
