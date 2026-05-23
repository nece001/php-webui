<?php

namespace Nece\WebUi\Render;

use Nece\WebUi\Render;

class TagRender extends Render
{
    public function render(): string
    {
        $tag = $this->component->getConfig('tag');
        $children = $this->component->getChildren();

        $nodes = [];
        foreach ($children as $child) {
            $nodes[] = $this->getRender($child)->render();
        }

        return $this->renderHtml($tag, $this->component->getAttributes(), $nodes);
    }
}
