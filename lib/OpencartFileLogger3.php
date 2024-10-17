<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class OpencartFileLogger3
{
    /**
     * @var object
     */
    private $log;

    /**
     * @var bool
     */
    private $shouldLog;

    public function __construct($shouldLog)
    {
        $this->shouldLog = $shouldLog;
        if ($this->shouldLog) {
            $this->log = new \Log('tatrapayplus.log');
        }
    }

    /**
     * @param $message
     *
     * @return void
     */
    public function info($message)
    {
        $this->log($message, 'INFO');
    }

    /**
     * @param $message
     * @param $level
     *
     * @return void
     */
    public function log($message, $level = 'info')
    {
        if (!$this->shouldLog) {
            return;
        }
        $date = gmdate('Y-m-d H:i:s');
        $formattedMessage = "[$date] [$level] $message" . PHP_EOL;
        $this->log->write($formattedMessage);
    }

    /**
     * @param $message
     *
     * @return void
     */
    public function warning($message)
    {
        $this->log($message, 'warning');
    }

    /**
     * @param $message
     *
     * @return void
     */
    public function error($message)
    {
        $this->log($message, 'error');
    }
}
