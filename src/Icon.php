<?php

namespace Nece\WebUi;

class Icon extends Component
{
    public function __construct(string $icon)
    {
        $this->config['icon'] = $icon;
    }
}
