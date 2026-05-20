<?php

namespace Nece\WebUi;

class Fixbar extends Component
{
    public function addBar(string $type, string $icon, string $content = '', string $style = ''): static
    {
        $this->config['bars'][] = [
            'type' => $type,
            'icon' => $icon,
            'content' => $content,
            'style' => $style,
        ];
        return $this;
    }

    public function setDefault(bool $default = true): static
    {
        $this->config['default'] = $default;
        return $this;
    }

    public function setBgColor(string $bgcolor): static
    {
        $this->config['bgcolor'] = $bgcolor;
        return $this;
    }

    public function setTargetId(string $target_id): static
    {
        $this->config['target_id'] = $target_id;
        return $this;
    }

    public function setScrollId(string $scroll_id): static
    {
        $this->config['scroll_id'] = $scroll_id;
        return $this;
    }

    public function setMargin(float $margin): static
    {
        $this->config['margin'] = $margin;
        return $this;
    }

    public function setDuration(float $duration): static
    {
        $this->config['duration'] = $duration;
        return $this;
    }

    public function setEventJsFunction(string $event, string $func): static
    {
        $key = $event . '_js_function';
        $this->config['events'][$key] = $func;
        $this->addJsFunction($key, $func);
        return $this;
    }
}
