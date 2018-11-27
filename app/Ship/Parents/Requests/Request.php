<?php

namespace App\Ship\Parents\Requests;

use Apiato\Core\Abstracts\Requests\Request as AbstractRequest;
use App\Containers\Portfolio\Models\Portfolio;
use App\Containers\User\Models\User;
use App\Ship\Transporters\DataTransporter;

/**
 * Class Request
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
abstract class Request extends AbstractRequest
{

    /**
     * If no custom Transporter is set on the child this will be default.
     *
     * @var string
     */
    protected $transporter = DataTransporter::class;

    /**
     * @return bool
     */
    public function isOwnerUserId()
    {
        return $this->user()->id == $this->user_id;
    }

    /**
     * @return bool
     */
    public function hasProfile()
    {
        $user = User::where('id', $this->user()->id)->with('profile')->first();
        if ($user && $user->profile) {
            return ($user->profile->user_id == $this->user()->id) ? true : false;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function ownProfile()
    {
        $user = User::where('id', $this->user()->id)->with('profile')->first();
        if ($user && $user->profile) {
            return ($user->profile->id == $this->id) ? true : false;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function ownerContacts()
    {
        $user = User::where('id', $this->user()->id)->with('profile.contacts')->first();
        if ($user && $user->profile && $user->profile->contacts) {
            return $user->profile->contacts->where('id', $this->id)->first() ? true : false;
        }
        return false;
    }

    public function ownerRate()
    {
        $user = User::where('id', $this->user()->id)->with('rates')->first();
        if ($user && $user->rates) {
            return $user->rates->where('id', $this->id)->first() ? true : false;
        }
        return false;
    }

    public function ownerPortfolio()
    {
        $portfolio = Portfolio::find($this->id);
        if ($portfolio && $portfolio->user_id == $this->user()->id) {
            return true;
        }
        return false;
    }
}
