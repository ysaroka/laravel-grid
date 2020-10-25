<?php
/**
 * Copyright (c) 2018.
 * @author Antony [leantony] Chacha
 */

namespace Leantony\Grid\Routing;

trait ConfiguresRoutes
{
    /**
     * Route name for the index route. Will also be used for export, search and filtering
     *
     * @var string
     */
    protected $indexUrl;

    /**
     * Route name for the create route
     *
     * @var string
     */
    protected $createUrl;

    /**
     * Route name for viewing an item
     *
     * @var string
     */
    protected $viewUrl;

    /**
     * Route name for updating an item
     *
     * @var string
     */
    protected $updateUrl;

    /**
     * Route name for deleting an item
     *
     * @var string
     */
    protected $deleteUrl;

    /**
     * Sort url
     *
     * @var string
     */
    protected $sortUrl;

    /**
     * The route parameter to be used for view and delete routes
     *
     * @var string
     */
    protected $defaultRouteParameter = 'id';

    /**
     * @param string $indexUrl
     */
    public function setIndexUrl(string $indexUrl): void
    {
        $this->indexUrl = $indexUrl;
    }

    /**
     * @param array $params
     * @return string
     */
    public function getIndexUrl(array $params = []): string
    {
        $allParams = http_build_query(add_query_param($params));
        return $this->indexUrl . (!empty($allParams) ? '?' . $allParams : '');
    }

    /**
     * @return string
     */
    public function getRefreshUrl(): string
    {
        return $this->indexUrl;
    }

    /**
     * @return string
     */
    public function getFilterUrl(): string
    {
        return $this->indexUrl;
    }

    /**
     * @param string $key
     * @param string $direction
     */
    protected function setSortUrl(string $key, string $direction): void
    {
        $this->sortUrl = $this->getIndexUrl([
            $this->getGridSortParam() => $key,
            $this->getGridSortDirParam() => $direction
        ]);
    }

    /**
     * @param string $key
     * @param string $direction
     * @return string
     */
    public function getSortUrl(string $key, string $direction): string
    {
        $this->setSortUrl($key, $direction);
        return $this->sortUrl;
    }

    /**
     * @param string $createUrl
     */
    public function setCreateUrl(string $createUrl): void
    {
        $this->createUrl = $createUrl;
    }

    /**
     * @param array $params
     * @return string
     */
    public function getCreateUrl(array $params = []): string
    {
        $allParams = http_build_query(add_query_param($params));
        return $this->createUrl . (!empty($allParams) ? '?' . $allParams : '');
    }

    /**
     * @param array $params
     * @return string
     */
    public function getSearchUrl(array $params = []): string
    {
        return $this->getIndexUrl($params);
    }

    /**
     * @param string $viewUrl
     */
    public function setViewUrl(string $viewUrl): void
    {
        $this->viewUrl = $viewUrl;
    }

    public function getViewUrl(array $params = []): string
    {
        $allParams = http_build_query(add_query_param($params));
        return $this->viewUrl . (!empty($allParams) ? '?' . $allParams : '');
    }

    /**
     * @param string $updateUrl
     */
    public function setUpdateUrl(string $updateUrl): void
    {
        $this->updateUrl = $updateUrl;
    }

    /**
     * @param array $params
     * @return string
     */
    public function getUpdateUrl(array $params = []): string
    {
        $allParams = http_build_query(add_query_param($params));
        return $this->updateUrl . (!empty($allParams) ? '?' . $allParams : '');
    }

    /**
     * @param string $deleteUrl
     */
    public function setDeleteUrl(string $deleteUrl): void
    {
        $this->deleteUrl = $deleteUrl;
    }

    /**
     * @param array $params
     * @return string
     */
    public function getDeleteUrl(array $params = []): string
    {
        $allParams = http_build_query(add_query_param($params));
        return $this->deleteUrl . (!empty($allParams) ? '?' . $allParams : '');
    }

    /**
     * Get the default route parameter
     *
     * @return string
     */
    public function getDefaultRouteParameter(): string
    {
        return $this->defaultRouteParameter;
    }

    /**
     * Set the default route parameter
     *
     * @param string $defaultRouteParameter
     */
    public function setDefaultRouteParameter(string $defaultRouteParameter): void
    {
        $this->defaultRouteParameter = $defaultRouteParameter;
    }
}
