<?php
namespace app\core;

class Response
{
    /** Setter method for code of the response.
     * @param int $code is number code.
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}