<?php
//include('./libs/PHPUnit/FileLogger.php');
use libs\PHPUnit\FileLogger;

class FileLoggerTest extends PHPUnit_Framework_TestCase{
    const FILENAME = "./log.txt";
    protected $logger;

    public function setUp(){
        $this->logger = new FileLogger(self::FILENAME);
    }

    public function testCreatLogFile(){
        $this->logger->write("hello moto");
        $this->assertFileExists(self::FILENAME);
    }

    public function testCreatFileOnFirstWrite(){
        $this->assertFileNotExists(self::FILENAME);
        $this->logger->write("hello first");
        $this->assertCount(1, file("./log.txt"));
        $this->assertFileExists(self::FILENAME);
    }

    public function testAppendingToFile(){
        $this->logger->write("hello test\n");
        $this->logger->write("hello test\n");
        $this->logger->write("hello test\n");
        $this->assertCount(3, file("./log.txt"));
    }

    public function tearDown(){
        if(file_exists(self::FILENAME)){
            unlink(self::FILENAME);
        }
        $this->logger = null;
    }
} 