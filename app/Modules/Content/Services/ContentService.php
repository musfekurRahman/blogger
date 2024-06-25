<?php

namespace App\Modules\Content\Services;

use App\Services\UtilsService;
use Illuminate\Support\Facades\Auth;

class ContentService
{
    const IS_PINNED = ['1' => 'Yes', '0' => 'No'];


    public static function modifyForView($content)
    {
        $content->categories = json_decode($content->categories);
        $content->headline_url = strtolower(str_replace(" ", "-", $content->headline)) . "-" . UtilsService::encrypt($content->id);
        $content->author_name_url = strtolower(str_replace(" ", "-", $content->author_name)) . "-" . UtilsService::encrypt($content->blogger_id);
        $content->created_at_for_view = UtilsService::getFormatedDate($content->created_at);
        return $content;
    }




}
