<?php

namespace Nece\WebUi;

class TreeDataGrid extends DataGrid
{
    public function setAsync(bool $async = true): static
    {
        $this->config['async'] = $async;
        return $this;
    }

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

    /**
     * 设置包含子项的字段名
     *
     * @author nece001@163.com
     * @create 2026-05-24 19:43:09
     *
     * @param string $custom_children_field
     * @return static
     */
    public function setCustomChildrenField(string $custom_children_field): static
    {
        $this->config['custom_children_field'] = $custom_children_field;
        return $this;
    }

    /**
     * 设置是否为父级的字段名
     *
     * @author nece001@163.com
     * @create 2026-05-24 19:43:26
     *
     * @param string $custom_is_parent_field
     * @return static
     */
    public function setCustomIsParentField(string $custom_is_parent_field): static
    {
        $this->config['custom_is_parent_field'] = $custom_is_parent_field;
        return $this;
    }

    /**
     * 设置显示树形结构的字段名
     *
     * @author nece001@163.com
     * @create 2026-05-24 19:43:51
     *
     * @param string $custom_name_field
     * @return static
     */
    public function setCustomNameField(string $custom_name_field): static
    {
        $this->config['custom_name_field'] = $custom_name_field;
        return $this;
    }

    /**
     * 设置ID字段名
     *
     * @author nece001@163.com
     * @create 2026-05-24 19:44:35
     *
     * @param string $custom_id_field
     * @return static
     */
    public function setCustomIdField(string $custom_id_field): static
    {
        $this->config['custom_id_field'] = $custom_id_field;
        return $this;
    }

    /**
     * 设置父级ID字段名
     *
     * @author nece001@163.com
     * @create 2026-05-24 19:44:41
     *
     * @param string $custom_pid_field
     * @return static
     */
    public function setCustomPidField(string $custom_pid_field): static
    {
        $this->config['custom_pid_field'] = $custom_pid_field;
        return $this;
    }

    /**
     * 设置图标字段名
     *
     * @author nece001@163.com
     * @create 2026-05-24 19:44:48
     *
     * @param string $custom_icon_field
     * @return static
     */
    public function setCustomIconField(string $custom_icon_field): static
    {
        $this->config['custom_icon_field'] = $custom_icon_field;
        return $this;
    }
}