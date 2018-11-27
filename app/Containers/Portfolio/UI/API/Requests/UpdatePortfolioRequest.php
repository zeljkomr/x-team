<?php

namespace App\Containers\Portfolio\UI\API\Requests;

use App\Containers\Authorization\Models\Role;
use App\Ship\Parents\Requests\Request;

/**
 * Class UpdatePortfolioRequest.
 */
class UpdatePortfolioRequest extends Request
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
        'id'
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'id'
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:5|max:70',
            'description' => 'required|min:15|max:250',
            'scale'       => 'required|integer|between:1,10',
            'url'         => 'required|url',
            'id'          => 'required'
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess|ownerPortfolio',
        ]);
    }
}
