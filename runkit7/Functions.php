<?php

function runkit7_zval_inspect($value)
{
}

function runkit7_superglobals()
{
}

function runkit7_function_add(string $function_name, $argument_list_or_closure, ?string $code_or_doc_comment, ?bool $return_by_reference, ?string $doc_comment, ?string $return_type, ?bool $is_strict)
{
}

function runkit7_function_remove(string $function_name)
{
}

function runkit7_function_rename(string $source_name, string $target_name)
{
}

function runkit7_function_redefine(string $function_name, $argument_list_or_closure, ?string $code_or_doc_comment, ?bool $return_by_reference, ?string $doc_comment, ?string $return_type, ?bool $is_strict)
{
}

function runkit7_function_copy(string $source_name, string $target_name)
{
}

function runkit7_method_add(string $class_name, string $method_name, $argument_list_or_closure, $code_or_flags, $flags_or_doc_comment, ?string $doc_comment, ?string $return_type, ?bool $is_strict)
{
}

function runkit7_method_redefine(string $class_name, string $method_name, $argument_list_or_closure, $code_or_flags, $flags_or_doc_comment, ?string $doc_comment, ?string $return_type, ?bool $is_strict)
{
}

function runkit7_method_remove(string $class_name, string $method_name)
{
}

function runkit7_method_rename(string $class_name, string $source_method_name, string $source_target_name)
{
}

function runkit7_method_copy(string $destination_class, string $destination_method, string $source_class, ?string $source_method)
{
}

function runkit7_constant_redefine(string $constant_name, $value, ?int $new_visibility)
{
}

function runkit7_constant_remove(string $constant_name)
{
}

function runkit7_constant_add(string $constant_name, $value, ?int $new_visibility)
{
}

