<?php
namespace libs\Tvart\FeedParser;
class XmlParser
{
    /**
     * @var \XMLReader
     */
    protected $xmlr = "";
    /**
     * @var string
     */
    protected $root = "";
    /**
     * @var string
     */
    protected $node = "";
    /**
     * @var bool
     */
    protected $needUnzip = false;

    /**
     * @var bool
     */
    protected $debug = false;

    public function __construct()
    {
        $this->xmlr = new \XMLReader();
    }

    public function __destruct(){
        if($this->xmlr){
            $this->xmlr->close();
        }
    }

    /**
     * @param \Closure $callback
     */
    public function parse(\Closure $callback)
    {
        while($this->xmlr->read() && $this->xmlr->localName !== $this->node);
        $this->parseFile($callback);
    }

    /**
     * @param \Closure $callback
     */
    private function parseFile(\Closure $callback){
        while($this->xmlr->localName == $this->node) {
            $callback(new \SimpleXMLElement($this->xmlr->readOuterXml()));
            if($this->debug){break;}
            $this->xmlr->next($this->node);
        }
        $this->xmlr->close();
    }

    /**
     * @param bool $flag
     * @return $this
     */
    public function setUnzip($flag){
        $this->needUnzip = $flag;
    }

    /**
     * @param bool $flag
     * @return $this
     */
    public function setDebug($flag){
        $this->debug = $flag;
        return $this;
    }

    /**
     * @param string $root
     * @return $this
     */
    public function setRoot($root){
        $this->root = $root;
        return $this;
    }

    /**
     * @param $node
     * @return $this
     */
    public function setNode($node){
        $this->node = $node;
        return $this;
    }

    /**
     * @param $file
     * @return $this
     */
    public function setFile($file)
    {
        libxml_use_internal_errors(true);
        $this->xmlr->open($file);
        $errors = libxml_get_errors();
        if(!empty($errors)) {
            $last_error = libxml_get_last_error();
            throw new \RuntimeException(sprintf("%s %s", $last_error->message,$file));
        }
        libxml_clear_errors();
        return $this;
    }
}