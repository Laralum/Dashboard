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
                    $file_r = file_get_contents($dir.'/'.$file);
                    foreach (json_decode($file_r, true) as $w) {
                        $w['package'] = $package;
                        array_push($widgets, $w);
                    }
                    break;
                }
            }
        }

        $widgets = static::orderByPreference($widgets);

        return $widgets;
    }

    /**
     * Order the widgets by preference.
     */
    public static function orderByPreference($widgets)
    {
        $preference = collect(['laralum', 'dashboard', 'users', 'roles', 'permissions']);

        $ordered_widgets = [];
        $final_ordered_widgets = [];

        $widgets = collect($widgets)->groupBy('package')->toArray();

        foreach (Packages::all() as $package) {
            if (!in_array($package, $preference->toArray())) {
                $preference->push($package);
            }
        }

        $ordered_widgets = $preference->map(function ($p) use ($widgets) {
            return array_key_exists($p, $widgets) ? $widgets[$p] : null;
        })->filter();

        foreach ($ordered_widgets as $widget) {
            foreach ($widget as $w) {
                array_push($final_ordered_widgets, $w);
            }
        }

        return $final_ordered_widgets;
    }
}
