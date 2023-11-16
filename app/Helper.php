<?php

namespace App;

class Helper
{
    public static function generateSlug(string $title, string $model)
    {
        $slug = self::slugify($title);
        $check = $model::where('slug', $slug)->first();
        if ($check) {
            return $slug . '-' . substr(md5(rand()), 0, 3);
        }
        return $slug;
    }

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
