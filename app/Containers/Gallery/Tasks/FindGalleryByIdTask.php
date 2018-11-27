<?php

namespace App\Containers\Gallery\Tasks;

use App\Containers\Gallery\Data\Repositories\GalleryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Ship\Criterias\Eloquent\IncludesCriteria;

/**
 * Class FindGalleryByIdTask
 * @package App\Containers\Gallery\Tasks
 */
class FindGalleryByIdTask extends Task
{
    /**
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * FindGalleryByIdTask constructor.
     * @param GalleryRepository $repository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function run($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
