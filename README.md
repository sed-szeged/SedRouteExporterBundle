SedExporterBundle
=================

This bundle helps to export your route definitions in yml, xml or php format.
It is useful if you defined your routes using annotations, but you want to migrate to something else. (For example to use Ioncube's PHP encoder, which can not work together with annotations.)

Keep in mind that the routes will be exported into one file and some information will be lost (e.g. prefix definitions) during the exportation.

## Installation

1. Add SedRouteExporterBundle to your composer.json by running:
  
  ``` bash
  $ php composer.phar require sed/route-exporter-bundle 'dev-master'
  ```
  
2. Enable the bundle in the kernel:
  ``` php
  <?php
  // app/AppKernel.php
  
  public function registerBundles()
  {
      $bundles = array(
          // ...
          new Sed\RouteExporterBundle\SedRouteExporterBundle(),
      );
  }
  ```
  
## Usage

To export the route definitions run the command:
``` bash
$ php app/console sed:router:export --format <yaml/xml/php> --output <destination-dir>
```
  

