<?php

return (new PhpCsFixer\Config())
  ->setRules([
      '@PSR2' => true,
      'strict_param' => false,
      'array_syntax' => ['syntax' => 'short'],
      'curly_braces_position' => [
        'classes_opening_brace' => 'same_line',
        'functions_opening_brace' => 'same_line',
      ],
  ])
  ->setIndent("  ")
  ->setUsingCache(false)
;
