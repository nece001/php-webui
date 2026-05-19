<?php

namespace Nece\WebUi;

use Nece\WebUi\CollapseItem;

class Collapse extends Component
{
    public function setAccordion(bool $accordion = true): static
    {
        $this->config['accordion'] = $accordion;
        return $this;
    }

    public function addChild(Component $child): static
    {
        if (!$child instanceof CollapseItem) {
            throw new \InvalidArgumentException('Collapse addChild only CollapseItem');
        }

        $this->children[] = $child;
        return $this;
    }
}
