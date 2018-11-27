<?php

namespace App\Containers\Gallery\Tasks;

use App\Containers\Gallery\Data\Repositories\GalleryRepository;
use App\Containers\Gallery\Models\Gallery;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Ship\Criterias\Eloquent\IncludesCriteria;

/**
 * Class UpdateGalleryTask
 * @package App\Containers\Gallery\Tasks
 */
class UpdateGalleryTask extends Task
{
    /**
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * UpdateGalleryTask constructor.
     * @param GalleryRepository $repository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function run($data)
    {
        try {
            if (isset($data['name']) && $data['description']) {
                $gallery = $this->repository->update([
                    'name'        => $data['name'] ?? false,
                    'description' => $data['description'] ?? false
                ], $data['gallery_id']);
            } else {
                $gallery = Gallery::with(['files'])->where('id', $data['gallery_id'])->first();
            }
            $gallery->files()->attach($data['files']);

            return $gallery;
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }

    /**
     * @return GalleryRepository
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
