<?php
ini_set("display_errors", "1");
require 'vendor/autoload.php';
error_reporting(E_ALL);
//use \libs\Database\Connection as Connection;
/*use \libs\Migration\Migrate;
use \libs\Migration\Seed;
Connection::getInstance();
$migrater = new Migrate();
$migrater->createTables();
$seed = new Seed();
$seed->feedTables();*/

use \libs\Tvart\StreamContent as Sc;
use \libs\Tvart\FeedParser\XmlParser;

$sc = Sc::getContext();
$sc->initMemcache();
$data = $sc->getContent("http://www.xmlfiles.com/examples/portfolio.xml",1);

$localXmlFeed = "public/feed/portfolio.xml";
if(!is_file($localXmlFeed)){
    file_put_contents($localXmlFeed,$data);
}

$parser = new XmlParser();
$parser->setFile($localXmlFeed)
        ->setNode('stock')
        ->setDebug(true)
        ->parse(function($stock){
            echo sprintf(
                "SE Name : %s<br/>%s - %s - %s",
                $stock['exchange'],
                (string)$stock->name,
                (string)$stock->symbol,
                (string)$stock->price
            );
        });
