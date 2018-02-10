<?php

namespace App\Helpers\Frontend\Input;

/**
 * Class Canvas
 * @package App\Helpers\Frontend\Input
 */
class Canvas
{
    public static function toImage($dataURI)
    {
        return base64_decode(str_replace(['data:image/png;base64,', ' '], ['', '+'], $dataURI));
    }
}
