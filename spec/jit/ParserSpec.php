<?php
namespace spec\jit;

use jit\Parser;

describe("Parser", function() {

    describe("->parse()", function() {

        it("parses consistently", function() {
            $sample = file_get_contents('spec/fixture/parser/Sample.php');
            $parsed = Parser::parse($sample);
            $this->expect(Parser::unparse($parsed))->toBe($sample);
        });

        it("parses syntaxically broken use statement and doesn't crash", function() {
            $code = "<?php use MyClass?>";
            $parsed = Parser::parse($code);
            $this->expect(Parser::unparse($parsed))->toBe($code);
        });

        it("parses functions", function() {
            $sample = file_get_contents('spec/fixture/parser/Function.php');
            $root = Parser::parse($sample);
            foreach ($root->tree as $node) {
                if ($node->type === 'function') {
                    expect($node->name)->toBe('myFunction');
                    expect($node->isClosure)->toBe(false);
                    expect($node->isMethod)->toBe(false);
                    expect($node->parent)->toBe($root);
                    expect($node->args)->toBe([
                        '$required',
                        '$param'    => '"value"',
                        '$boolean'  => 'false',
                        '$array'    => '[]',
                        '$array2'   => 'array()',
                        '$constant' => 'PI'
                    ]);
                }
            }
        });

    });

    describe("->debug()", function() {

        it("attaches the correct lines", function() {

            $filename = 'spec/fixture/parser/Sample';
            $parsed = Parser::debug(file_get_contents($filename . '.php'));
            $this->expect($parsed)->toBe(file_get_contents($filename . '.txt'));

        });

        it("parses files with no namespace", function() {

            $filename = 'spec/fixture/parser/NoNamespace';
            $parsed = Parser::debug(file_get_contents($filename . '.php'));
            $this->expect($parsed)->toBe(file_get_contents($filename . '.txt'));

        });

        it("parses heredoc", function() {

            $filename = 'spec/fixture/parser/Heredoc';
            $parsed = Parser::debug(file_get_contents($filename . '.php'));
            $this->expect($parsed)->toBe(file_get_contents($filename . '.txt'));

        });

        it("parses strings", function() {

            $filename = 'spec/fixture/parser/String';
            $parsed = Parser::debug(file_get_contents($filename . '.php'));
            $this->expect($parsed)->toBe(file_get_contents($filename . '.txt'));

        });

        it("parses closures", function() {

            $filename = 'spec/fixture/parser/Closure';
            $parsed = Parser::debug(file_get_contents($filename . '.php'));
            $this->expect($parsed)->toBe(file_get_contents($filename . '.txt'));

        });

        it("parses switch cases", function() {

            $filename = 'spec/fixture/parser/Switch';
            $parsed = Parser::debug(file_get_contents($filename . '.php'));
            $this->expect($parsed)->toBe(file_get_contents($filename . '.txt'));

        });

    });

});
