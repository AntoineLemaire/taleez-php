<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony'                     => true,
        'array_syntax'                 => ['syntax' => 'short'],
        'array_indentation'            => true,
        'ordered_class_elements'       => true,
        'phpdoc_order'                 => true,
        'ordered_imports'              => true,
        'phpdoc_to_comment'            => false,
        'blank_line_after_opening_tag' => false,
    ])
    ->setFinder($finder)
    ;
