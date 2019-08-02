<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

class ImagesController
{
    public function upload(Request $request): JsonResponse
    {
        /** @var UploadedFile|null $image */
        $image = $request->file('image');

        if ($image === null) {
            return new JsonResponse([
                'error' => 'Image not sent',
            ]);
        }

        $name = md5(uniqid('image',true) . time()). '.' . $image->getClientOriginalExtension();

        $image->storeAs('images', $name, ['disk' => 'public']);

        return new JsonResponse([
            'data' => [
                'url' => '/storage/images/' . $name,
            ]
        ]);
    }
}
