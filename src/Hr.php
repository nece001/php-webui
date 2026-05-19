<?php

namespace Nece\WebUi;

class Hr extends Component
{
    public function setColor(string $color): static
    {
        $this->config['color'] = $color;
        return $this;
    }
}
