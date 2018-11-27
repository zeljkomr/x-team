<?php

namespace App\Containers\Rate\UI\API\Requests;

use App\Containers\Authorization\Models\Role;
use App\Ship\Parents\Requests\Request;
use Webpatser\Uuid\Uuid;

/**
 * Class UpdateRateRequest.
 */
class UpdateRateRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    // protected $transporter = \App\Ship\Transporters\DataTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => Role::ADMIN,
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'id'                   => 'required',
            'rates'                => "required|array",
            'rates.*.hourly_rate'  => "required|between:000.00,999.99",
            'rates.*.minimum_hour' => "required|min:1|max:15",
            'rates.*.rate_comment' => "required|min:10|max:70",
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess|ownerRate',
        ]);
    }
}
