<?php

/*
 * This file is part of the SedRouteExporterBundle package.
 *
 * (c) Department of Software Engineering, University of Szeged <http://www.sed.inf.u-szeged.hu/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sed\RouteExporterBundle\Exporter;

use Sed\RouteExporterBundle\Exporter\Driver\AbstractExporter;

/**
 * Factory class to create an exporter for the given format.
 * @author David Tengeri <dtengeri@gmail.com>
 */
class RouteExporter
{
    /**
     * @var array The available exporters.
     */
    private static $exportedDrivers = array(
        'yaml' => 'Sed\\RouteExporterBundle\\Exporter\\Driver\\YamlExporter',
        'xml'  => 'Sed\\RouteExporterBundle\\Exporter\\Driver\\XmlExporter',
        'php'  => 'Sed\\RouteExporterBundle\\Exporter\\Driver\\PhpExporter',
    );

    /**
     * @param string $destination The output dir where the generated routing file will be saved.
     * @param string $format      The desired format. Available options: yaml (default), xml, php.
     *
     * @return AbstractExporter
     *
     * @throws \InvalidArgumentException If unknown format is given.
     */
    public static function getExporter($destination, $format)
    {
        // Check if the format is registered.
        if (!isset(self::$exportedDrivers[$format])) {
            throw new \InvalidArgumentException(sprintf('The export format "%s" does not exist. Available formats are: yaml, xml or php.', $format));
        }

        return new self::$exportedDrivers[$format]($destination);
    }
}
