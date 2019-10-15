<?php
/**
 * Payment services class.
 *
 * @author Ali <alialharkan@gmail.com>
 */

class Service
{
    /**
     * HTTP service.
     *
     * @var Client
     */
    protected $http;

    /**
     * Defaults parameter for HTTP request.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Defaults config for HTTP request.
     *
     * @var array
     */
    private $configs;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = curl_init();
        $this->configs = require ('config/app.php');
    }

    /**
     * HTTP request method.
     *
     * @param  string
     * @param  array
     * @return object
     */
    protected function request($method, array $params = [])
    {
        curl_setopt($this->http, CURLOPT_URL, $params['endpoint']);
        curl_setopt($this->http, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($this->http, CURLOPT_HEADER, FALSE);
        curl_setopt($this->http, CURLOPT_HTTPHEADER, $params['headers']);
        curl_setopt($this->http, CURLOPT_USERPWD, $params['api_secret'].":");
        if($method == 'POST'){
            curl_setopt($this->http, CURLOPT_POST, TRUE);
            curl_setopt($this->http, CURLOPT_POSTFIELDS, http_build_query($params['data']));
        }

        return curl_exec($this->http);
    }

    /**
     * Check transactions.
     *
     * @param  string
     * @return object
     */
    public function get($id)
    {
        $defaults = $this->configs;
        $defaults['endpoint'] = $defaults['api_url'].'/'.$id ;
        $defaults['headers'] = array(
			"Content-Type: application/x-www-form-urlencoded",
        );

        return $this->request('GET', $defaults);
    }

    /**
     * Send transaction.
     *
     * @param  string
     * @return object
     */
    public function post($data)
    {
        $defaults = $this->configs;
        $defaults['data'] = $data;
        $defaults['endpoint'] = $defaults['api_url'] ;
        $defaults['headers'] = array(
			"Content-Type: application/x-www-form-urlencoded",
        );

        return $this->request('POST', $defaults);
    }

    /**
     * Create the instance from global configuration.
     *
     * @param  string
     * @return self
     */
    public static function make()
    {
        return new self();
    }
}
