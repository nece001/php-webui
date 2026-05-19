<?php

namespace Nece\WebUi;

class Progress extends Component
{
    public function setCurrent(float $current): static
    {
        $this->config['current'] = $current;
        return $this;
    }

    public function setTotal(float $total): static
    {
        $this->config['total'] = $total;
        return $this;
    }

    public function setShowPercent(bool $show_percent = true): static
    {
        $this->config['show_percent'] = $show_percent;
        return $this;
    }

    public function showNumber(bool $show_number = true): static
    {
        $this->config['show_number'] = $show_number;
        return $this;
    }

    public function setColor(string $color): static
    {
        $this->config['color'] = $color;
        return $this;
    }

    public function setBig(bool $big = true): static
    {
        $this->config['big'] = $big;
        return $this;
    }
}
