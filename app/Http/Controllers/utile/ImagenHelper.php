<?php

namespace App\Http\Controllers\utile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tenista;

class ImagenHelper
{
    /**
     * Update the image for the given model.
     */
    public function updateImage(Request $request, $model, $defaultImage)
    {
        $imagePath = $request->file('imagen')->storeAs(
            'public/imagenes/' . strtolower(class_basename($model)),
            $model->id . '.' . $request->file('imagen')->getClientOriginalExtension()
        );

        $name = strtolower(class_basename($model));

        $this->deleteOldImage($model->imagen, $defaultImage, $name);

        $model->imagen = Storage::url($imagePath);
    }

    /**
     * Delete the old image from storage.
     */
    public function deleteOldImage($imageUrl, $defaultImageUrl, $namel)
    {
        if ($imageUrl && $imageUrl !== $defaultImageUrl) {
            $oldImageName = pathinfo(str_replace(Storage::url(''), '', $imageUrl), PATHINFO_FILENAME);
            $allFiles = Storage::files('public/imagenes/' . $namel);
            foreach ($allFiles as $file) {
                $currentFileName = pathinfo($file, PATHINFO_FILENAME);
                if ($currentFileName !== pathinfo($defaultImageUrl, PATHINFO_FILENAME)) {
                    if (str_contains($currentFileName, $oldImageName)) {
                        Storage::delete($file);
                    }
                }
            }
        }
    }
}
