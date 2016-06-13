<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 22:23
 */
namespace libs\PHPUnit;

use \libs\Tvart\FeedParser\XmlParser;
class StockParser
{

    protected $parser;
    protected $feed;
    protected $return = [];
    public function __construct(XmlParser $parser){
        $this->parser = $parser;
    }

    public function getParsedFeed($feed){
        //$date = date($this->get(),$timestamps);
        //$date = date("d-m-Y",$timestamps);
        $this->parser->setFile($feed)
                ->setDebug(true)
                ->setNode('stock')
                ->parse(
                    function($stock){
                        $this->return[] = sprintf(
                            "SE Name : %s<br/>%s - %s - %s",
                            $stock['exchange'],
                            (string)$stock->name,
                            (string)$stock->symbol,
                            (string)$stock->price
                        );
                    }
                );
        return $this->return;
        //date($this->Importformatter->hello("date.format"),$timestamps);

    }
}