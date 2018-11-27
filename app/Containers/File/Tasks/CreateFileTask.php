<?php

namespace App\Containers\File\Tasks;

use App\Containers\File\Data\Repositories\FileRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Webpatser\Uuid\Uuid;

/**
 * Class CreateFileTask
 * @package App\Containers\File\Tasks
 */
class CreateFileTask extends Task
{

    /**
     * @var FileRepository
     */
    protected $repository;

    /**
     * CreateFileTask constructor.
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $data
     * @param $location
     * @return \Illuminate\Support\Collection|mixed
     */
    public function run($data, $location)
    {
        try {
            $picture = [];

            if (is_array($data)) {
                $response = collect([]);
                foreach ($data as $file) {
                    $name = Uuid::generate(1) . '.';
                    $imageName = time() . '_' . $name . $file->getClientOriginalExtension(); //getClientOriginalName()
                    if (isset($location)) {
                        $picture['path'] = 'public/files/' . $location . '/' . $imageName;
                        $file->storeAs('public/files/' . $location . '/', $imageName);
                    } else {
                        $picture['path'] = 'public/files/' . $imageName;
                        $file->storeAs('public/files/', $imageName);
                    }
                    $response->push($this->repository->create($picture));
                }
                return $response;
            } else {
                $name = Uuid::generate(1) . '.';
                $imageName = time() . '_' . $name . $data->getClientOriginalExtension();
                if (isset($location)) {
                    $picture['path'] = 'public/files/' . $location . '/' . $imageName;
                    $data->storeAs('public/files/' . $location . '/', $imageName);
                } else {
                    $picture['path'] = 'public/files/' . $imageName;
                    $data->storeAs('public/files/', $imageName);
                }
                return $this->repository->create($picture);
            }
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
