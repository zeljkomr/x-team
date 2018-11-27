<?php

namespace App\Containers\Gallery\Tasks;

use App\Containers\Gallery\Data\Repositories\GalleryRepository;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Criterias\Eloquent\IncludesCriteria;

/**
 * Class GetAllGalleriesTask
 * @package App\Containers\Gallery\Tasks
 */
class GetAllGalleriesTask extends Task
{
    /**
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * GetAllGalleriesTask constructor.
     * @param GalleryRepository $repository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this->repository->paginate();
    }
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
