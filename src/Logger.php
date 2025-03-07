<?php

namespace RFM;

class Logger {
    /**
     * @var string
     */
    public $file;
    /**
     * @var int
     */
    public $traceLevel = 1;
    /**
     * @var boolean
     */
    public $enabled = false;


    public function __construct()
    {
        $this->file = sys_get_temp_dir() . '/filemanager.log';
    }

    /**
     * Log message
     * @param string $message
     */
    public function log($message)
    {
        if ($this->enabled) {
            $entry = $this->formatMessage($message);
            $fp = fopen($this->file, "a");
            fwrite($fp, $entry . PHP_EOL);
            fclose($fp);
        }
    }

    /**
     * Formats a log message for display as a string.
     * @param string $message
     * @return string
     */
    protected function formatMessage($message): string
    {
        $traces = [];
        foreach ($this->getBacktrace() as $trace) {
            $traces[] = "in {$trace['file']}:{$trace['line']}";
        }

        $str = "[" . date('Y-m-d H:i:s', time()) . "]#" .  $this->getUserIp() . "# - " . $message;
        return $str . ($traces === [] ? '' : "\n    " . implode("\n    ", $traces));
    }

    /**
     * Returns backtrace stack according to $traceLevel
     * @return array
     */
    protected function getBacktrace()
    {
        $traces = [];
        if ($this->traceLevel > 0) {
            $count = 0;
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            array_pop($backtrace); // remove the last trace since it would be the entry script, not very useful
            foreach ($backtrace as $trace) {
                if (isset($trace['file'], $trace['line']) && !str_starts_with($trace['file'], FM_APP_PATH)) {
                    unset($trace['object'], $trace['args']);
                    $traces[] = $trace;
                    if (++$count >= $this->traceLevel) {
                        break;
                    }
                }
            }
        }
        return $traces;
    }

    /**
     * Return user IP address
     * @return mixed
     */
    protected function getUserIp()
    {
        $client  = $_SERVER['HTTP_CLIENT_IP'] ?? null;
        $forward = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null;
        $remote  = $_SERVER['REMOTE_ADDR'];

        if ($client && filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif ($forward && filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }
}