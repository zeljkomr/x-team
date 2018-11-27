<?php

namespace App\Containers\Contact\Tasks;

use App\Containers\Contact\Data\Repositories\ContactRepository;
use App\Containers\User\Models\User;
use App\Ship\Criterias\Eloquent\IncludesCriteria;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

/**
 * Class CreateContactTask
 * @package App\Containers\Contact\Tasks
 */
class CreateContactTask extends Task
{

    /**
     * @var ContactRepository
     */
    protected $repository;

    /**
     * CreateContactTask constructor.
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function run(array $data)
    {
        try {
            $user = User::where('id', auth()->user()->id)->with('profile')->first();
            $result = new Collection();
            foreach ($data['contacts'] as $contact) {
                $result->push($this->repository->create([
                    'contact'    => $contact['contact'],
                    'type'       => $contact['type'],
                    'profile_id' => $user->profile->id,
                ]));
            }
            return $result;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }

    /**
     * @return ContactRepository
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
