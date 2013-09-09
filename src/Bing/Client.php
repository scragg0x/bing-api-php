<?php
namespace Bing;

class Client
{
    protected $version;
    protected $base_uri = 'https://api.datamarket.azure.com/Bing/Search/';
    protected $output;

    public function __construct($api_key, $output = 'json') {
        $this->output = $output;
        $this->version = 'v1';
        $auth = base64_encode("$api_key:$api_key");
        $data = array(
            'http' => array(
                'request_fulluri' => true,
                'ignore_errors' => false,
                'header' => "Authorization: Basic $auth"
            )
        );
        $this->base_uri .= $this->version;
        $this->context = stream_context_create($data);
    }

    public function get($endpoint, $params = array()) {
        $qs = "?\$format={$this->output}";
        if ($params['Query']) {
            $params['Query'] = "'{$params['Query']}'";
        }
        $qs .= ($params) ? "&" . http_build_query($params) : "";
        return file_get_contents($this->base_uri . "/" . $endpoint . $qs, 0, $this->context);
    }
}