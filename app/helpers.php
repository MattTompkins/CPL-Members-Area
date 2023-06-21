<?php

if (!function_exists('formatDate')) {
    /**
     * Formats date in d M Y
     *
     * @param date $date
     * @return date in format d M Y
     */
    function formatDate($date)
    {
        return \Carbon\Carbon::parse($date)->format('d M Y');
    }
}

if (!function_exists('pre_r')) {
    /**
     * Pre_r - for debugging
     *
     * @param array $data
     * @return void
     */
    function pre_r($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('first100Words')) {
    /**
     * Returns first 100 words of a string with ellipsis if there are more than 100 words
     *
     * @param string $string
     * @return string first 100 words with ellipsis if more than 100 words
     */
    function first100Words($string)
    {
        $words = explode(" ", $string); // Split the string into an array of words
        $first100Words = array_slice($words, 0, 100); // Take the first 100 words
        $result = implode(" ", $first100Words); // Join the words back into a string

        if (count($words) > 100) {
            $result .= '...'; // Append ellipsis if there are more than 100 words
        }

        return $result;
    }
}
