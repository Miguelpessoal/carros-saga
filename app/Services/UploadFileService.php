<?php

namespace App\Services;

use Exception;

class UploadFileService
{

    public function upload($file, $path)
    {
        if ($this->validateFileExtension($file->extension())) {
            return $file->store($path);
        }

        return false;
    }

    private function validateFileExtension($extension)
    {
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'xls']);
    }
}
