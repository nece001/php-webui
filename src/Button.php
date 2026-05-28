<?php

namespace Nece\WebUi;

class Button extends Control
{
    public function __construct(string $type = 'button')
    {
        $this->setType($type);
    }

    public function setType(string $type): static
    {
        $this->setAttribute('type', strtolower($type));
        return $this;
    }

    public function setUrl(string $url): static
    {
        $this->config['url'] = $url;
        return $this;
    }

    public function setSize(string $size): self
    {
        $this->config['size'] = $size;
        return $this;
    }

    public function setFontColor(string $font_color): self
    {
        $this->config['font_color'] = $font_color;
        return $this;
    }

    public function setBgColor(string $color): self
    {
        $this->config['bg_color'] = $color;
        return $this;
    }

    public function setBorderColor(string $color): self
    {
        $this->config['border_color'] = $color;
        return $this;
    }

    public function setRadius(bool $radius = true): self
    {
        $this->config['radius'] = $radius;
        return $this;
    }

    public function setFluid(bool $fluid = true): self
    {
        $this->config['fluid'] = $fluid;
        return $this;
    }

    public function setAction(Action $action): self
    {
        $this->config['action'] = $action;
        return $this;
    }

    public function setFilter(string $filter): self
    {
        $this->config['filter'] = $filter;
        $this->setAttribute('type', 'button');
        $this->setAttribute('lay-submit', '');
        return $this;
    }

    public function setCountdown(int $countdown, string $text): self
    {
        $this->config['countdown'] = ['countdown' => $countdown, 'text' => $text];
        return $this;
    }
}
