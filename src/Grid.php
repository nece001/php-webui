<?php

namespace Nece\WebUi;

class Grid extends Component
{
    public function setSpace(int $space): static
    {
        $this->config['space'] = $space;
        return $this;
    }

    public function addChild(Component $component): static
    {
        if (!$component instanceof GridColumn) {
            throw new \InvalidArgumentException('Grid component must be instance of GridColumn');
        }

        $this->children[] = $component;
        return $this;
    }

    public function addColumn(GridColumn $column): static
    {
        $this->children[] = $column;
        return $this;
    }
}
