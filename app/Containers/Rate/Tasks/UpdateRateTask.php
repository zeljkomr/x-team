<?php

namespace App\Containers\Rate\Tasks;

use App\Containers\Rate\Data\Repositories\RateRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

/**
 * Class UpdateRateTask
 * @package App\Containers\Rate\Tasks
 */
class UpdateRateTask extends Task
{

    /**
     * @var RateRepository
     */
    protected $repository;

    /**
     * UpdateRateTask constructor.
     * @param RateRepository $repository
     */
    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function run($id, array $data)
    {
        try {
            $user = User::where('id', auth()->user()->id)->with('rates')->first();

            $info = new Collection();
            foreach ($data['rates'] as $rate) {
                $info->push($user->rates()->where('id', $id)->update([
                    'hourly_rate'  => $rate['hourly_rate'],
                    'minimum_hour' => $rate['minimum_hour'],
                    'rate_comment' => $rate['rate_comment'],
                ], $id));
            }

            $userNew = User::where('id', auth()->user()->id)->with('rates')->first();
            return $userNew->rates->where('id', $id)->first();

        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
