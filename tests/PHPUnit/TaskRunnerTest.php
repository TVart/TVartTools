<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 21:38
 */

use libs\PHPUnit\TaskRunner;
//use libs\Interfaces\TaskInterface as TaskInterface;

class TaskRunnerTest extends PHPUnit_Framework_TestCase{

    public function testRunAllPassesParamsCorrectly(){
        $mock = $this->getMock("libs\Interfaces\TaskInterface", array("execute"));
        $mock->expects(
            /*
                $this->any()
                $this->never()
                $this->atLeastOnce()
             */
                $this->once()
            )
            ->method("execute")
            ->with($this->equalTo(["users"]));

        $mock2 = $this->getMock("libs\Interfaces\TaskInterface", array("execute"));
        $mock2->expects($this->exactly(2))
            ->method("execute")
            ->with(
                $this->equalTo(["users"]),
                $this->GreaterThanOrEqual(0)
            );

        $runner = new TaskRunner();
        $runner->registerTask($mock);
        $runner->runAll(["users"]);

        $runner = new TaskRunner();
        $runner->registerTask($mock2);
        $runner->registerTask($mock2);
        $runner->runAll(["users"]);
    }
}