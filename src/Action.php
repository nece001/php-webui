<?php

namespace Nece\WebUi;

class Action extends Component
{
    public function setUrl(string $url): static
    {
        $this->config['url'] = $url;
        return $this;
    }

    public function setMethod(string $method = 'POST'): static
    {
        $this->config['method'] = $method;
        return $this;
    }

    public function setData(array $data): static
    {
        $this->config['data'] = $data;
        return $this;
    }

    public function setIsJson(bool $is_json = true): static
    {
        $this->config['is_json'] = $is_json;
        return $this;
    }

    public function setOpenConfirm(string $title): static
    {
        $this->config['type'] = 'confirm';
        $this->config['title'] = $title;
        return $this;
    }

    public function setOpenForm(string $title): static
    {
        $this->config['type'] = 'form';
        $this->config['title'] = $title;
        return $this;
    }

    public function setSubmitAction(Action $action): static
    {
        $this->config['submit_action'] = $action->toArray();
        return $this;
    }

    public function toArray(): array
    {
        return $this->config;
    }
}
