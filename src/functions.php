<?php
/**
 * Add support for:
 * - str_before on Laravel < v5.5
 * - str_after  on Laravel < v5.4
 */
if (!function_exists('str_before')) {
    /**
     * Get the portion of a string before a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function str_before($subject, $search)
    {
        return '' === $search ? $subject : explode($search, $subject)[0];
    }
}

if (!function_exists('str_after')) {
    /**
     * Return the remainder of a string after a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function str_after($subject, $search)
    {
        return '' === $search ? $subject : array_reverse(explode($search, $subject, 2))[0];
    }
}

if (!function_exists('str_replace_last')) {
    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_last($search, $replace, $subject)
    {
        $position = strrpos($subject, $search);

        if (false !== $position) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }
}
