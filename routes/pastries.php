<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2019 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

use UserFrosting\Sprinkle\Core\Util\NoCache;

$app->group('/pastries', function () {
    $this->get('', 'UserFrosting\Sprinkle\Pastries\Controller\PastriesController:pageList')
         ->setName('pastries');
})->add('authGuard');

// These routes will be for any methods that retrieve/modify data from the database.
$app->group('/api/pastries', function () {
    $this->get('', 'UserFrosting\Sprinkle\Pastries\Controller\PastriesController:getList');
})->add('authGuard')->add(new NoCache());

// These routes will be used to store any modals
$app->group('/modals/pastries', function () {
})->add('authGuard');
