<?php

/*
 * This file is part of Laralum Dashboard.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Laralum\Dashboard;

use Illuminate\Support\Facades\Facade;
use Laralum\Laralum\Packages;

/**
 * This is the widgets facade class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Widgets extends Facade
{
    /**
     * Returns all the widgets.
     */
    public static function get()
    {
        $widgets = [];
        foreach (Packages::all() as $package) {
            $dir = __DIR__.'/../../'.$package.'/src/Widgets';

            $files = is_dir($dir) ? scandir($dir) : [];
            foreach ($files as $file) {
                if ($file != '.' and $file != '..') {
                    // Widget found, get the data
                    $name = substr($file, 0, -4);
                    if (!array_key_exists($name, $widgets)) {
                        $widgets[$name] = include __DIR__.'/../../'.$package.'/src/Widgets/'.$file;
                    }
                }
            }
        }

        return $widgets;
    }
}
