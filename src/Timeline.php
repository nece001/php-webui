<?php

namespace Nece\WebUi;

class Timeline extends Component
{
    public function addChild(Component $child): static
    {
        if (!$child instanceof TimelineItem) {
            throw new \Exception('TimelineItem is required');
        }
        $this->children[] = $child;
        return $this;
    }
}
