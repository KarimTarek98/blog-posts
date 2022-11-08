<?php

namespace App\Traits;

trait StorablePostThumb
{
    public function storeThumbnail($request, string $image)
    {

        if ($request->has($image))
        {
            return $request->file($image)->store($image);
        }
    }
}
