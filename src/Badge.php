<?php

namespace Nece\WebUi;

class Badge extends Component
{
    public function setText(string $text): static
    {
        $this->config['text'] = $text;
        return $this;
    }

    public function setDot(bool $dot = true): static
    {
        $this->config['dot'] = $dot;
        return $this;
    }

    public function setColor(string $color): static
    {
        $this->config['color'] = $color;
        return $this;
    }

    public function setBorder(bool $border = true): static
    {
        $this->config['border'] = $border;
        return $this;
    }
}
