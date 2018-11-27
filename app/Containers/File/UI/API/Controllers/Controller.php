<?php

namespace App\Containers\File\UI\API\Controllers;

use App\Containers\File\UI\API\Requests\CreateFileRequest;
use App\Containers\File\UI\API\Requests\DeleteFileRequest;
use App\Containers\File\UI\API\Requests\GetAllFilesRequest;
use App\Containers\File\UI\API\Requests\FindFileByIdRequest;
use App\Containers\File\UI\API\Requests\UpdateFileRequest;
use App\Containers\File\UI\API\Transformers\FileTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\File\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateFileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFile(CreateFileRequest $request)
    {
        $file = Apiato::call('File@CreateFileAction', [$request]);

        return $this->created($this->transform($file, FileTransformer::class));
    }

    /**
     * @param FindFileByIdRequest $request
     * @return array
     */
    public function findFileById(FindFileByIdRequest $request)
    {
        $file = Apiato::call('File@FindFileByIdAction', [$request]);

        return $this->transform($file, FileTransformer::class);
    }

    /**
     * @param GetAllFilesRequest $request
     * @return array
     */
    public function getAllFiles(GetAllFilesRequest $request)
    {
        $files = Apiato::call('File@GetAllFilesAction', [$request]);

        return $this->transform($files, FileTransformer::class);
    }

    /**
     * @param UpdateFileRequest $request
     * @return array
     */
    public function updateFile(UpdateFileRequest $request)
    {
        $file = Apiato::call('File@UpdateFileAction', [$request]);

        return $this->transform($file, FileTransformer::class);
    }

    /**
     * @param DeleteFileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFile(DeleteFileRequest $request)
    {
        Apiato::call('File@DeleteFileAction', [$request]);

        return $this->noContent();
    }
}
