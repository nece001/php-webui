<?php

namespace Nece\WebUi\Render;

use Nece\WebUi\Render;

class ContentRender extends Render
{
    public function render(): string
    {
        return $this->component->getConfig('content');
    }
}
