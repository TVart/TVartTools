<?php

namespace tvart\Tools\FeedParser;
class CsvParser
    {
    /**
    * @var \SplFileObject
    */
    protected $file = "";
    /**
    * @var resource
    */
    protected $hanlde = false;
    /**
    * @var string
    */
    protected $delim = ";";
    /**
    * @var string
    */
    protected $enclosure = '"';
    /**
    * @var bool
    */
    protected $debug = false;

    /**
    * @param $file
    */
    public function __construct($file=false)
    {
        if($file){
            $this->setFile($file);
        }
    }

    /**
    * @param \Closure $callback
    */
    public function parse(\Closure $callback)
    {
        if($this->hanlde){
            $this->parseHandle($callback);
        }else{
            $this->parseFile($callback);
        }
    }

    /**
    * @param \Closure $callback
    */
    protected function parseFile(\Closure $callback){
        while(!$this->file->eof()) {
            if(strlen($this->delim) == 1) {
                $data = $this->file->fgetcsv($this->delim, $this->enclosure);
            } else {
                $data = explode(
                    $this->delim,
                    $this->file->fgets()
                );
                $data = array_map(
                    function($row){
                        return mb_convert_encoding(trim($row,$this->enclosure),"UTF-8","Windows-1252,ISO-8859-15");
                    },
                    $data
                );
                if($this->debug){break;}
                /*
                $enclosure = $this->enclosure;
                array_walk($data, function(&$val) use ($enclosure) {
                return trim($val, $enclosure);
                });
                */
            }
            $callback($data);
        }
    }

    /**
    * @param \Closure $callback
    */
    protected function parseHandle(\Closure $callback){
        while(($line = fgets($this->hanlde)) !== false)
        {
            $data = explode(
                $this->delim,
                $line
            );
            $data = array_map(
                function($row){
                    return mb_convert_encoding(trim($row,$this->enclosure),"UTF-8","Windows-1252,ISO-8859-15");
                },$data
            );
            $callback($data);
            if($this->debug){break;}
        }
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
    * @param $file
    * @return $this
    */
    public function setFile($file)
    {
        $this->file = new \SplFileObject($file, "r");
        if(!$this->file->isFile()) {
            throw new \RuntimeException(sprintf("Invalid file for parsing %s", $file));
        }
        return $this;
    }

    /**
    * @param $file
    * @return $this
    */
    public function setHandle($file)
    {
        $this->hanlde = fopen($file, 'r');
        if($this->hanlde == false) {
            throw new \RuntimeException(sprintf("Unable to handle file %s", $file));
        }
        return $this;
    }

    /**
    * @param $delim
    * @return $this
    * @throws \Exception
    */
    public function setDelim($delim)
    {
        if (0 === strlen($delim)) {
            throw new \Exception("Delimiter can't be empty");
        }
            $this->delim = $delim;
        return $this;
    }

    /**
    * @param $enclosure
    * @return $this
    */
    public function setEnclosure($enclosure)
    {
        $this->enclosure = $enclosure;
        return $this;
    }
}