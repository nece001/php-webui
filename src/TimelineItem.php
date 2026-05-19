<?php

namespace Nece\WebUi;

class TimelineItem extends Component
{
    public function setTime(string $time): static
    {
        $this->config['time'] = $time;
        return $this;
    }

    public function setIcon(string $icon): static
    {
        $this->config['icon'] = $icon;
        return $this;
    }
}
