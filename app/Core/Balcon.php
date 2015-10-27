<?php

namespace App\Core;

use App\Resolvers\RouteResolverFactory;

class Balcon implements BalconInterface
{
    /** @var  \Illuminate\Foundation\Application */
    protected $app;
    protected $routeResolver;
    protected $entityResolver;
    protected $entity;
    protected $responseResolver;
    protected $response;
    protected $extenssionsContainer;


    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @inheritdoc
     */
    public function getRouteResolver()
    {
        if (!$this->routeResolver) {
            $this->routeResolver = $this->app->make('\App\Resolvers\RouteResolverInterface');
        }
        return $this->routeResolver;
    }

    public function setRouteResolver(\App\Resolvers\RouteResolverInterface $routeResolver)
    {
        $this->routeResolver = $routeResolver;
    }

    /**
     * @inheritdoc
     */
    public function getEntityResolver()
    {
        if (!$this->entityResolver) {
            $this->entityResolver = $this->app->make('\App\Resolvers\EntityResolverInterface');
        }
        return $this->entityResolver;
    }

    public function setEntityResolver($entityResolver)
    {
        $this->entityResolver = $entityResolver;
    }

    public function getEntity()
    {
        // FIXME: move to entityResolver
        return $this->entity;
    }

    public function setEntity($entity)
    {
        // FIXME: move to entityResolver
        $this->entity = $entity;
    }

    public function getResponseResolver()
    {
        if (!$this->responseResolver) {
            $this->responseResolver = $this->app->make('\App\Resolvers\ResponseResolverInterface');
        }
        return $this->responseResolver;
    }

    public function setResponseResolver($responseResolver)
    {
        $this->responseResolver = $responseResolver;
    }

    public function getResponse()
    {
        // FIXME: move to responseResolver
        return $this->response;
    }

    public function setResponse($response)
    {
        // FIXME: move to responseResolver
        $this->response = $response;
    }

    /**
     * @return \App\Core\ExtensionsCollector
     */
    public function getExtensionsContainer()
    {
        if (null == $this->extenssionsContainer) {
            $this->extenssionsContainer = $this->collectExtensions();
        }

        return $this->extenssionsContainer;
    }

    /**
     * @return \App\Core\ExtensionsCollector
     */
    protected function collectExtensions()
    {
        $this->extenssionsContainer = new ExtensionsCollector();

        return $this->extenssionsContainer;
    }
}