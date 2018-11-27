<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\Portfolio\UI\API\Transformers\PortfolioTransformer;
use App\Containers\Profile\UI\API\Transformers\ProfileTransformer;
use App\Containers\Rate\UI\API\Transformers\RateTransformer;
use App\Containers\Skill\UI\API\Transformers\SkillTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class UserPrivateProfileTransformer.
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 */
class UserPrivateProfileTransformer extends Transformer
{

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'roles',
        'profile',
        'skills',
        'rates',
        'portfolio'
    ];

    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @param \App\Containers\User\Models\User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        $response = [
            'object'    => 'User',
            'id'        => $user->getHashedKey(),
            'name'      => $user->name,
            'email'     => $user->email,
            'confirmed' => $user->confirmed,
            'nickname'  => $user->nickname,
            'gender'    => $user->gender,
            'birth'     => $user->birth,

            'social_auth_provider' => $user->social_provider,
            'social_id'            => $user->social_id,
            'social_avatar'        => [
                'avatar'   => $user->social_avatar,
                'original' => $user->social_avatar_original,
            ],

            'created_at'          => $user->created_at,
            'updated_at'          => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ];

        $response = $this->ifAdmin([
            'real_id'    => $user->id,
            'deleted_at' => $user->deleted_at,
        ], $response);

        return $response;
    }

    /**
     * @param User $user
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

    /**
     * @param User $user
     * @return \League\Fractal\Resource\Item
     */
    public function includeProfile(User $user)
    {
        if ($user->profile) {
            return $this->item($user->profile, new ProfileTransformer());
        }
    }

    /**
     * @param User $user
     * @return \League\Fractal\Resource\Collection
     */
    public function includeSkills(User $user)
    {
        if ($user->skills) {
            return $this->collection($user->skills, new SkillTransformer());
        }
    }

    /**
     * @param User $user
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRates(User $user)
    {
        if ($user->rates) {
            return $this->collection($user->rates, new RateTransformer());
        }
    }

    /**
     * @param User $user
     * @return \League\Fractal\Resource\Collection
     */
    public function includePortfolio(User $user)
    {
        if ($user->portfolio) {
            return $this->collection($user->portfolio, new PortfolioTransformer());
        }
    }
}
