<?php

namespace Nece\WebUi;

class ButtonContainer extends Component
{
    public function addChild(Component $child): static
    {
        if (!$child instanceof Button) {
            throw new \InvalidArgumentException('ButtonGroup only accept Button component');
        }

        $this->children[] = $child;
        return $this;
    }

    public function setAlign(string $align): static
    {
        $this->config['align'] = $align;
        return $this;
    }
}
