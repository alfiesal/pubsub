<?php

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/spec',
    ])
    ->notName('*.phpt');

/**
 * This configuration was taken from https://github.com/sebastianbergmann/phpunit/blob/master/.php_cs.dist
 * and slightly adjusted.
 */
return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        '@Symfony' => true,
        'declare_strict_types' => true,
        'logical_operators' => true,
        '@PSR2' => true,
        'align_multiline_comment' => ['comment_type' => 'phpdocs_like'],
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw',
                'try', 'do', 'for', 'foreach', 'if', 'switch', 'while', 'yield',
            ],
        ],
        'cast_spaces' => ['space' => 'single'],
        'class_attributes_separation' => ['elements' => ['method', 'property']],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_equal_normalize' => ['space' => 'none'],
        'explicit_indirect_variable' => true,
        'fully_qualified_strict_types' => true,
        'function_typehint_space' => true,
        'general_phpdoc_annotation_remove' => [
            'annotations' => ['access', 'author', 'copyright', 'package', 'subpackage'],
        ],
        'lowercase_cast' => true,
        'lowercase_static_reference' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'method_chaining_indentation' => true,
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        'native_function_casing' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_comment' => true,
        'no_empty_phpdoc' => true,
        'no_empty_statement' => true,
        'no_extra_blank_lines' => [
            'tokens' => ['break', 'case', 'continue', 'curly_brace_block', 'default', 'extra',
                'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use', 'use_trait',
            ],
        ],
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_null_property_initialization' => true,
        'no_php4_constructor' => true,
        'no_short_bool_cast' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_spaces_around_offset' => ['positions' => ['inside', 'outside']],
        'no_trailing_comma_in_list_call' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_unneeded_final_method' => true,
        'no_unset_cast' => true,
        'no_unused_imports' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line' => true,
        'object_operator_without_whitespace' => true,
        'ordered_class_elements' => [
            'order' => ['use_trait', 'constant_public', 'constant_protected', 'constant_private',
                'property_public_static', 'property_protected_static', 'property_private_static',
                'property_public', 'property_protected', 'property_private',
                'method_public_static', 'method_protected_static', 'method_private_static',
                'construct', 'destruct', 'magic', 'phpunit',
                'method_public', 'method_protected', 'method_private',
            ],
        ],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => true],
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_indent' => true,
        'phpdoc_inline_tag' => true,
        'phpdoc_order' => true,
        'phpdoc_scalar' => true,
        'phpdoc_separation' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_trim' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_types' => ['groups' => ['simple', 'alias', 'meta']],
        'phpdoc_types_order' => ['null_adjustment' => 'always_last'],
        'phpdoc_var_annotation_correct_order' => true,
        'psr4' => true,
        'return_type_declaration' => ['space_before' => 'none'],
        'semicolon_after_instruction' => true,
        'short_scalar_cast' => true,
        'simplified_null_return' => true,
        'single_quote' => true,
        'space_after_semicolon' => true,
        'ternary_operator_spaces' => true,
        'ternary_to_null_coalescing' => true,
        'trailing_comma_in_multiline_array' => true,
        'unary_operator_spaces' => true,
        'whitespace_after_comma_in_array' => true,
        'visibility_required' => [
            'elements' => ['const', 'method', 'property'],
        ],
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],


    ])
    ->setFinder($finder);