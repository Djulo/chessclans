<?php

/**
 * Trait koji sluzi za upload slike na profil
 * Autor: Nikola Kovacevic
 */

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    /**
     * Pokusava da postavi profilnu sliku
     *
     * @param UploadedFile $uploadedFile
     * @param [type] $folder
     * @param string $disk
     * @param [type] $filename
     * @return void
     */
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
