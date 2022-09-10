<?php


namespace app\src\services;


class CallAPI
{
    public function __construct()
    {
    }

    /**
     * @param string $method            Method: POST, PUT, GET etc.
     * @param string $url               URL of the call API.
     * @param false $data               Data: array("param" => "value") ==> index.php?param=value.
     * @return bool|string|array        Data return to call API.
     */
    public function CallAPI(string $method, string $url, bool $data = false): bool|string|array
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}