<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Crypt;

class UtilsService
{
    const PAGINATION_PER_PAGE_CONTENT = 5;
    const PAGINATION_PER_PAGE_CONTENT_FOR_ADMIN = 15;

    public static function characterOnlySanitize(string $text): string
    {
        return trim(preg_replace('/\s+/', ' ', preg_replace("/[^a-zA-Z\s]+/", ' ', $text)));
    }

    /**
     * @throws Exception
     */
    public static function generateRandomString($length = 10): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function getFormatedDate(string $date): string
    {
        return date('M d, Y', strtotime($date));
    }

    public static function getIdFromUrlPart($name): int|string
    {
        $explodeName = explode('-', $name);
        if (isset($explodeName[count($explodeName) - 1])) {
            $encodedId = $explodeName[count($explodeName) - 1];
            if (strlen($encodedId) > 100) {
                return (integer)self::decrypt($encodedId);
            }
        }
        return '';
    }

    public static function encrypt($data): string
    {
        return urlencode(Crypt::encrypt($data));
    }

    public static function decrypt($data): string
    {
        return Crypt::decrypt(urldecode($data));
    }
    public static function showLimitedCharacter($string, $limit)
    {
        return strlen($string) > $limit ? substr($string, 0, $limit)."..." : $string;
    }
}
