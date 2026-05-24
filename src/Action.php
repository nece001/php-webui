<?php

namespace Nece\WebUi;

class Action extends Component
{
    public function __construct(string $event_name = 'action')
    {
        $this->config['event_name'] = $event_name;
    }

    public function setBindId(string $bind_id): static
    {
        $this->config['bind_id'] = $bind_id;
        return $this;
    }

    public function setUrl(string $url): static
    {
        $this->config['url'] = $url;
        return $this;
    }

    public function setMethod(string $method): static
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

    public function setEventName(string $event_name): static
    {
        $this->config['event_name'] = $event_name;
        return $this;
    }

    public function setParamName(string $param_name): static
    {
        $this->config['param_name'] = $param_name;
        return $this;
    }

    public function toArray(): array
    {
        $config = $this->config;

        $method = 'get';
        $type = isset($config['type']) ? $config['type'] : '';
        if ($type == 'form') {
            $config['method'] = 'get';
        }

        if (isset($config['method'])) {
            $method = strtolower($config['method']);
        }

        $param_name = isset($config['param_name']) ? $config['param_name'] : 'id';
        if (in_array($method, ['post'])) {
            $config['data'][$param_name] = '{value}';
        } else {
            if (isset($config['url'])) {
                $url = $config['url'];
                $params = [];
                if (false !== strpos($url, '?')) {
                    $query = substr($url, strpos($url, '?') + 1);
                    $params = parse_str($query, $params);
                    if (!isset($params[$param_name])) {
                        $url .= '&' . $param_name . '={value}';
                    }
                } else {
                    $url .= '?' . $param_name . '={value}';
                }

                $config['url'] = $url;
            }
        }

        return $config;
    }
}
