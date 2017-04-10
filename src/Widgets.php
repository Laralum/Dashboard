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
            $dir = __DIR__.'/../../'.$package.'/src';
            $files = is_dir($dir) ? scandir($dir) : [];

            foreach ($files as $file) {
                if ($file == 'Widgets.json') {
                    $file_r = file_get_contents($dir . '/' . $file);
                    foreach (json_decode($file_r, true) as $w) {
                        array_push($widgets, $w);
                    }
                    break;
                }
            }
        }

        return $widgets;
    }
}
