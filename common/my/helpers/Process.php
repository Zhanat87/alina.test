<?php

namespace common\my\helpers;

/**
 * Class Process
 * @package common\my\helpers
 *
 * @link http://mithrandir.ru/professional/php/php-daemons.html
 */
class Process
{

    /**
     * @var
     */
    private $pid;
    /**
     * @var bool
     */
    private $command;

    /**
     * @param bool $cl
     */
    public function __construct($cl = FALSE)
    {
        if ($cl != FALSE) {
            $this->command = $cl;
            $this->runCom();
        }
    }

    /**
     * запустить процесс
     */
    private function runCom()
    {
        $command = 'nohup ' . $this->command . ' > /dev/null 2>&1 & echo $!';
        exec($command, $op);
        $this->pid = (int) $op[0];
    }

    /**
     * @param $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @return bool
     */
    public function status()
    {
        $command = 'ps -p ' . $this->pid;
        exec($command, $op);
        if (!isset($op[1])) return FALSE;
        else return TRUE;
    }

    /**
     * @return bool
     */
    public function start()
    {
        if ($this->command != '') $this->runCom();
        else return TRUE;
    }

    /**
     * @return bool
     */
    public function stop()
    {
        $command = 'kill ' . $this->pid;
        exec($command);
        if ($this->status() == FALSE) return TRUE;
        else return FALSE;
    }

}