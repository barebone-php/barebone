<?php
namespace Barebone;

trait Core
{
    /**
     * Write to application log
     * @param string $text message
     */
    public function log($text)
    {
        Log::info($text);
    }

    /**
     * Write to application log
     * @param string $text message
     */
    public function logError($text)
    {
        Log::error($text);
    }

    /**
     * Write to application log
     * @param string $text message
     */
    public function logWarning($text)
    {
        Log::warning($text);
    }
}