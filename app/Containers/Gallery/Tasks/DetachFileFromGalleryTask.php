<?php

namespace App\Containers\Gallery\Tasks;

use App\Containers\File\Models\File;
use App\Containers\Gallery\Data\Repositories\GalleryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Storage;

/**
 * Class DetachFileFromGalleryTask
 * @package App\Containers\Gallery\Tasks
 */
class DetachFileFromGalleryTask extends Task
{

    /**
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * DetachFileFromGalleryTask constructor.
     * @param GalleryRepository $repository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function run($data)
    {
        try {
            $gallery = $this->repository->find($data['gallery_id'])->with('files')->first();
            $gallery->files()->detach($data['files']);
            $filesToDelete = File::whereIn('id', $data['files'])->pluck('path')->toArray();

            try {
                Storage::delete($filesToDelete);
            } catch (\App\Ship\Parents\Exceptions\Exception $exception) {
            }

            return $gallery;
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
