<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2019 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Sprinkle\Pastries\Sprunje;

use UserFrosting\Sprinkle\Core\Sprunje\Sprunje;
use UserFrosting\Sprinkle\Pastries\Database\Models\Pastries;

class PastrySprunje extends Sprunje
{
    protected $name = 'pastries';

    protected $sortable = [
    'name',
    'description',
    'origin',
    ];

    protected $filterable = [
    'name',
    'description',
    'origin',
    ];

    protected function baseQuery()
    {
        $instance = new Pastries();

        return $instance->newQuery();
    }
}
