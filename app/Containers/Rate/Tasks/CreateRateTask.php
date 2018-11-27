<?php

namespace App\Containers\Rate\Tasks;

use App\Containers\Rate\Data\Repositories\RateRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

class CreateRateTask extends Task
{

    protected $repository;

    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $collection = new Collection();
            foreach ($data['rates'] as $rate) {
                $collection->push($this->repository->create([
                    'user_id'      => $data['user_id'],
                    'hourly_rate'  => $rate['hourly_rate'],
                    'minimum_hour' => $rate['minimum_hour'],
                    'rate_comment' => $rate['rate_comment'],
                ]));
            }
            return $collection;
        } catch (Exception $exception) {
            dd($exception);
            throw new CreateResourceFailedException();
        }
    }
}
