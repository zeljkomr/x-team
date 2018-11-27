<?php

/**
 * @apiGroup           Skills
 * @apiName            assignRate
 * @api                {post} /v1/skills/assign/:user_id Assign skill to user
 * @apiDescription     Assign Skill to User
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  user_id (required)
 * @apiParam           {Object[]} skills
 * @apiParam           {String}  skills.skill_id (required)
 * @apiParam           {String}  skills.scale (required) 0-10
 * @apiParam           {String}  skills.comment (required)
 * @apiParam           {String}  skills.date (required) (date)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateSkill.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->post('skills/assign/{user_id}', [
    'as' => 'api_skill_assign_skill',
    'uses'  => 'Controller@assignSkill',
    'middleware' => [
      'auth:api',
    ],
]);
