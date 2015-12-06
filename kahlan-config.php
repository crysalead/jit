<?php
use Kahlan\Filter\Filter;

/**
 * Completly disable the Kahlan autoloader interceptor configuration.
 */
class_exists('Lead\Jit\Parser');
class_exists('Lead\Jit\Node\BlockDef');
class_exists('Lead\Jit\Node\FunctionDef');
class_exists('Lead\Jit\TokenStream');

Filter::register('jit.interceptor', function($chain) {});
Filter::apply($this, 'interceptor', 'jit.interceptor');
