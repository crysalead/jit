<?php
use filter\Filter;

/**
 * Completly disable the Kahlan autoloader interceptor configuration.
 */
Filter::register('jit.autoloader', function($chain) {});
Filter::apply($this, 'autoloader', 'jit.autoloader');
