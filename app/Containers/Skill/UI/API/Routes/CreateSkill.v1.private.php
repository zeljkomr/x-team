<?php

/**
 * @apiGroup           Skills
 * @apiName            createRate
 * @api                {post} /v1/skills Create Skill
 * @apiDescription     Create skill, if that skill already exists in database, API will assign it to user
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {Object[]} skills
 * @apiParam           {String}  skills.skill_id (required)
 * @apiParam           {String}  skills.scale (required)
 * @apiParam           {String}  skills.comment (required)
 * @apiParam           {String}  skills.started_at (required)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateSkill.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->post('skills', [
    'as' => 'api_skill_create_skill',
    'uses'  => 'Controller@createSkill',
    'middleware' => [
      'auth:api',
    ],
]);
