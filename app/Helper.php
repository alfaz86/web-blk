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

    public static function replaceIframeDimensions($html, $newWidth, $newHeight)
    {
        $src = self::getIframeSrc($html);
        $html = '<iframe width="' . $newWidth . '" height="' . $newHeight . '" src="' . $src . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        return $html;
    }

    public static function getIframeSrc($html)
    {
        // Mencari pola regex yang cocok dengan nilai src pada tag <iframe>
        $pattern = '/<iframe[^>]*\bsrc=["\']([^"\']+)[^>]*>/i';

        // Mencocokkan pola regex dan mendapatkan nilai src
        preg_match($pattern, $html, $matches);

        // Mengembalikan nilai src (atau null jika tidak ditemukan)
        return isset($matches[1]) ? $matches[1] : null;
    }

    public static function formatCreatedAt($createdAt)
    {
        // Format the created_at date in Indonesian format
        $indonesianDate = $createdAt->locale('id')->isoFormat('D MMMM Y');

        return $indonesianDate;
    }
}
