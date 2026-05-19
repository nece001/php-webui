<?php

namespace Nece\WebUi;

class ButtonGroup extends Component
{
    public function addChild(Component $child): static
    {
        if (!$child instanceof Button) {
            throw new \InvalidArgumentException('ButtonGroup only accept Button component');
        }

        $this->children[] = $child;
        return $this;
    }
}
