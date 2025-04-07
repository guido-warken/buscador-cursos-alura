<?php

use Phan\Issue;

return [
    'target_php_version' => 8.3,
    'directory_list' => [
        'src',
        'vendor/guzzlehttp/guzzle',
        'vendor/symfony/dom-crawler',
        'vendor/psr/http-message'
    ],
    'exclude_analysis_directory_list' => [
        'vendor/'
    ],
    'plugins' => [
        'AlwaysReturnPlugin',
        'DuplicateArrayKeyPlugin',
        'PrintfCheckerPlugin',
        'UnreachableCodePlugin',
        'DollarDollarPlugin',
        'DuplicateExpressionPlugin',
    ]
];