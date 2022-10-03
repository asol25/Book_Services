<?php
namespace app\core;

use JetBrains\PhpStorm\ArrayShape;

class Response
{
    /** Setter method for code of the response.
     * @param int $code is number code.
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    /**
     * @param int $code Return 0 is code have error or null.
     * @param mixed $message Return value or error message.
     * @return array Container information about return value.
     */
     #[ArrayShape(["code" => "int", "message" => "mixed"])] public function setReturnMessage(int $code, mixed $message): array
    {
        return [
            "code" => $code,
            "message" => $message,
        ];
    }
}