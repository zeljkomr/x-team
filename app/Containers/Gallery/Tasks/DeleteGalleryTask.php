<?php

namespace App\Containers\Gallery\Tasks;

use App\Containers\Gallery\Data\Repositories\GalleryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Ship\Criterias\Eloquent\IncludesCriteria;

/**
 * Class DeleteGalleryTask
 * @package App\Containers\Gallery\Tasks
 */
class DeleteGalleryTask extends Task
{
    /**
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * DeleteGalleryTask constructor.
     * @param GalleryRepository $repository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return int
     */
    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
