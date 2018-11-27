<?php

namespace App\Containers\Gallery\Tasks;

use App\Containers\Gallery\Data\Repositories\GalleryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Ship\Criterias\Eloquent\IncludesCriteria;

/**
 * Class CreateGalleryTask
 * @package App\Containers\Gallery\Tasks
 */
class CreateGalleryTask extends Task
{
    /**
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * CreateGalleryTask constructor.
     * @param GalleryRepository $repository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Support\Collection
     */
    public function run(array $data)
    {
        try {
            $gallery = $this->repository->create($data);
            $gallery->files()->attach($data['files']);

            return $gallery;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
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
