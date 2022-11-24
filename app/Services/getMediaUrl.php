<?php

use Illuminate\Database\Eloquent\Model;

function getMediaUrl(Model $model, string $collection)
{
    $media = $model->getFirstMediaUrl($collection);
    $pathData = explode("//", $media);
    $mediaPath = explode('/', $pathData[1] ?? '');
    unset($mediaPath[0]);
    $newPath = implode(DIRECTORY_SEPARATOR, $mediaPath);
    return  asset($newPath);
}
