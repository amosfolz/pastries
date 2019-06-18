<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2019 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Sprinkle\Pastries\Database\Migrations\v100;

use UserFrosting\Sprinkle\Pastries\Database\Models\Pastries;
use UserFrosting\System\Bakery\Migration;

class DefaultPastries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $dependencies = [
        '\UserFrosting\Sprinkle\Pastries\Database\Migrations\V100\PastriesTable',
    ];

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        foreach ($this->pastries() as $pastry) {
            $pastry = new Pastries($pastry);
            $pastry->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        foreach ($this->pastries() as $pastry) {
            if (Pastries::where($pastry)->first()) {
                $pastry = Pastries::where($pastry)->first();
                $pastry->delete();
            }
        }
    }

    protected function pastries()
    {
        return [
            [
                'name'        => 'Apple strudel',
                'description' => 'Sliced apples and other fruit are wrapped and cooked in layers of filo pastry. The earliest known recipe is in Vienna, but several countries in central and eastern Europe claim this dish.',
                'origin'      => 'Central Europe',
            ],
            [
                'name'        => 'Pain au chocolat',
                'description' => '"Chocolate bread", also called a chocolatine in southern France and in French Canada, is a French pastry consisting of a cuboid-shaped piece of yeast-leavened laminated dough, similar to puff pastry, with one or two pieces of chocolate in the centre.',
                'origin'      => 'France',
            ],
            [
                'name'        => 'Baklava',
                'description' => 'A Turkish pastry that is rich and sweet, made of layers of filo pastry filled with chopped nuts and sweetened with syrup or honey.',
                'origin'      => 'Turkish/Greek',
            ],
        ];
    }
}
