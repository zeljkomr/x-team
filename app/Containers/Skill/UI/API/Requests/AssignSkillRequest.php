<?php

namespace App\Containers\Skill\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class AssignSkillRequest.
 */
class AssignSkillRequest extends Request
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
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'user_id',
        'skills.*.skill_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'user_id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'user_id'             => 'required',
            'skills.*.skill_id'   => 'required',
            'skills.*.scale'      => 'required',
            'skills.*.comment'    => 'required',
            'skills.*.started_at' => 'required',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'isOwnerUserId',
        ]);
    }
}
