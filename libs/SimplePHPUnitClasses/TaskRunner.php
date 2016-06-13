<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 20/12/14
 * Time: 21:26
 */

namespace libs\PHPUnit;

use libs\PHPUnit\Interfaces\TaskInterface;

class TaskRunner {
    protected $tasks = [];

    public function registerTask(TaskInterface $task){
        $this->tasks[] = $task;
    }

    public function runAll($opts){
        foreach($this->tasks as $id_task => $task){
            $task->execute($opts, $id_task);
        }
        //$this->tasks[0]->execute($opts);
    }
} 