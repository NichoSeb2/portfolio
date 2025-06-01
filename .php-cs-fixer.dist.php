<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = (new Finder())
	->in(__DIR__ . "/config")
	->in(__DIR__ . "/migrations")
	->in(__DIR__ . "/public")
	->in(__DIR__ . "/src")
	->in(__DIR__ . "/tests")
	->append([
		__DIR__ . "/.php-cs-fixer.dist.php",
	])
;

return (new Config())
	->setParallelConfig(ParallelConfigFactory::detect())
	->setRules([
		// '@Symfony' => true,
		'@PHP84Migration' => true,
		'@PSR12' => true,
		'@PER-CS2.0' => true,
		'indentation_type' => true,
		'ordered_imports' => true,
		'no_unused_imports' => true,
		'single_line_comment_spacing' => true,
		'type_declaration_spaces' => true,
		'no_multiline_whitespace_around_double_arrow' => true,
		'object_operator_without_whitespace' => true,
		'binary_operator_spaces' => true,
		'no_extra_blank_lines' => true,
		'unary_operator_spaces' => [
			'only_dec_inc' => false,
		],
		'fully_qualified_strict_types' => ['import_symbols' => true],
	])
	->setIndent("\t")
	->setLineEnding("\n")
	->setFinder($finder)
;
