<?php

namespace Nece\WebUi;

class Pagination extends Component
{
    public function setVarName(string $name): static
    {
        $this->config['var_name'] = $name;
        return $this;
    }

    public function setPage(int $page): static
    {
        $this->config['page'] = $page;
        return $this;
    }

    public function setTotal(int $total): static
    {
        $this->config['total'] = $total;
        return $this;
    }

    public function setPageSize(int $page_size): static
    {
        $this->config['page_size'] = $page_size;
        return $this;
    }

    public function setPageSizeOptions(array $page_size_options): static
    {
        $this->config['page_size_options'] = $page_size_options;
        return $this;
    }

    public function setItemLimit(int $limit): static
    {
        $this->config['item_limit'] = $limit;
        return $this;
    }

    public function setFirst(string $text): static
    {
        $this->config['first'] = $text;
        return $this;
    }

    public function setPrev(string $text): static
    {
        $this->config['prev'] = $text;
        return $this;
    }

    public function setNext(string $text): static
    {
        $this->config['next'] = $text;
        return $this;
    }

    public function setLast(string $text): static
    {
        $this->config['last'] = $text;
        return $this;
    }

    public function setJumpCallback(string $callback): static
    {
        $this->config['jump'] = $callback;
        return $this;
    }

    public function setLayout(array $layout): static
    {
        $this->config['layout'] = $layout;
        return $this;
    }

    public function setTheme(string $theme): static
    {
        $this->config['theme'] = $theme;
        return $this;
    }
}
