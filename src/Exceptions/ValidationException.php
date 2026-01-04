<?php

namespace Chargily\ChargilyPro\Exceptions;

use Exception;

final class ValidationException extends Exception
{
    /**
     * Throw customized exception message
     *
     * @param string $message
     * @param array $array
     * @param int $code
     * @return void
     */
    public static function message(string $message, array $array, int $code): void
    {
        $message = "Validation failed for ({$message}): ";

        foreach ($array as $key => $value) {
            $msg = $value;
            if (is_array($value)) {
                $msg = json_encode($value);
            }
            $message .= " [({$key}): {$msg}]; ";
        }

        throw new self($message, $code);

        return;
    }
}
