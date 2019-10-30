<?php

namespace App\Service\Request;

/**
 * Class Request
 * @package App\Service\Request
 */
final class Request
{
    /**
     * @var array
     */
    private $post;

    /**
     * @var array
     */
    private $get;

    /**
     * @var string
     */
    private $raw;

    /**
     * @var array
     */
    private $json;

    /**
     * @var array
     */
    private $server;

    /**
     * Request constructor.
     * @param array $post
     * @param array $get
     * @param $raw
     */
    public function __construct(array $post, array $get, array $server, string $raw)
    {
        $this->raw = $raw;
        $this->post = $post;
        $this->get = $get;
        $this->json = json_decode($this->raw, true);
        $this->server = $server;
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $this->post;
    }

    /**
     * @return array
     */
    public function getGet(): array
    {
        return $this->get;
    }

    /**
     * @return string
     */
    public function getRaw(): string
    {
        return $this->raw;
    }

    /**
     * @return array
     */
    public function getJson(): array
    {
        return $this->json;
    }

    /**
     * @return array
     */
    public function getServer(): array
    {
        return $this->server;
    }
}