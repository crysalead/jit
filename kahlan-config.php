<?php
use filter\Filter;

/**
 * Completly disable the Kahlan autoloader interceptor configuration.
 */
Filter::register('jit.interceptor', function($chain) {});
Filter::apply($this, 'interceptor', 'jit.interceptor');
