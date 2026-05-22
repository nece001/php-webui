<?php

namespace Nece\WebUi;

class DataGrid extends Component
{
    public function addColumns(): DataGridColumns
    {
        $columns = new DataGridColumns();
        $this->children[] = $columns;
        return $columns;
    }

    public function addChild(Component $child): static
    {
        if (!$child instanceof DataGridColumns) {
            throw new \InvalidArgumentException('DataGrid only accept DataGridColumns children');
        }

        $this->children[] = $child;
        return $this;
    }

    public function setData(array $data): static
    {
        $this->config['data'] = $data;
        return $this;
    }

    public function setDataUrl(string $url): static
    {
        $this->config['data_url'] = $url;
        return $this;
    }

    public function setToolbar(bool $toolbar = true): static
    {
        $this->config['toolbar'] = $toolbar;
        return $this;
    }

    public function setExportUrl(string $url): static
    {
        $this->config['export_url'] = $url;
        return $this;
    }

    public function setCheckboxColumn(bool $checkbox = true): static
    {
        $this->config['checkbox'] = $checkbox;
        return $this;
    }

    public function setPagination(bool $pagination = true): static
    {
        $this->config['pagination'] = $pagination;
        return $this;
    }

    public function setPageVarName(string $pageVarName = 'page'): static
    {
        $this->config['page_var_name'] = $pageVarName;
        return $this;
    }

    public function setPageSizeVarName(string $pageSizeVarName = 'page_size'): static
    {
        $this->config['page_size_var_name'] = $pageSizeVarName;
        return $this;
    }

    public function setPagePageSize(int $pageSize = 10): static
    {
        $this->config['page_size'] = $pageSize;
        return $this;
    }

    public function setLineStyle(string $lineStyle): static
    {
        $this->config['line_style'] = $lineStyle;
        return $this;
    }

    public function setSearchButtonFilterKey(string $search_button_filter_key): static
    {
        $this->config['search_button_filter_key'] = $search_button_filter_key;
        return $this;
    }

    public function addPermission(array $permission): static
    {
        $this->config['permission'] = $permission;
        return $this;
    }

    public function addTool(Button $button): static
    {
        $this->config['tools'][] = $button;
        return $this;
    }

    public function addOperation(Button $button): static
    {
        $this->config['operations'][] = $button;
        return $this;
    }

    public function bindSearchForm(Form $form): static
    {
        $form->bindDataGrid($this, true);
        $this->config['search_form'] = $form;
        return $this;
    }
}
