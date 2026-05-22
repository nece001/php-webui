<?php

namespace Nece\WebUi;

class TreeDataGrid extends DataGrid
{
    public function setAsyncUrl(string $url): static
    {
        $this->config['async_url'] = $url;
        return $this;
    }

    /**
     * 自动参数，可以根据配置项以及当前节点的数据传参，如： ['type', 'age=age', 'parentId=id']
     *
     * @author nece001@163.com
     * @create 2026-05-22 22:25:49
     *
     * @param array $params
     * @return static
     */
    public function setAsyncParams(array $params): static
    {
        $this->config['async_params'] = $params;
        return $this;
    }

    public function setPagination(bool $pagination = true): static
    {
        $this->config['pagination'] = $pagination;
        return $this;
    }
}
