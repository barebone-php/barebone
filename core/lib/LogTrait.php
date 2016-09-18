<?php
namespace Barebone;

trait LogTrait
{
    /**
     * Write to application log
     *
     * @param string $text     message
     * @param string $severity Either 'info', 'warn' or 'error'
     * @return Boolean Whether the record has been processed
     */
    public function log($text, $severity = 'info')
    {
        if ($severity === 'warn' || $severity === 'warning') {
            return Log::warning($text);
        }

        if ($severity === 'err' || $severity === 'error') {
            return Log::error($text);
        }

        return Log::info($text);
    }

}