<?php

namespace Nece\WebUi;

class Carousel extends Component
{
    public function setWidth(string $width): static
    {
        $this->config['width'] = $width;
        return $this;
    }

    public function setHeight(string $height): static
    {
        $this->config['height'] = $height;
        return $this;
    }

    public function setAnim(string $anim): static
    {
        $this->config['anim'] = $anim;
        return $this;
    }

    public function setFull(bool $full = true): static
    {
        $this->config['full'] = $full;
        return $this;
    }

    public function setAutoplay(string $autoplay): static
    {
        if ($autoplay === 'true') {
            $this->config['autoplay'] =  true;
        } elseif ($autoplay === 'false') {
            $this->config['autoplay'] = false;
        } else {
            $this->config['autoplay'] = $autoplay;
        }

        $this->config['autoplay'] = $autoplay;
        return $this;
    }

    public function setInterval(int $interval): static
    {
        $this->config['autoplay'] = $interval;
        return $this;
    }

    public function setIndex(int $index): static
    {
        $this->config['index'] = $index;
        return $this;
    }

    public function setArrow(string $arrow): static
    {
        $this->config['arrow'] = $arrow;
        return $this;
    }

    public function setIndicator(string $indicator): static
    {
        $this->config['indicator'] = $indicator;
        return $this;
    }
}
