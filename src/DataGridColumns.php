<?php

namespace Nece\WebUi;

use Nece\WebUi\DataGridColumn;

class DataGridColumns extends Component
{
    public function addChild(Component $child): static
    {
        if (!$child instanceof DataGridColumn) {
            throw new \InvalidArgumentException('DataGridColumns only accept DataGridColumn children');
        }

        $this->children[] = $child;
        return $this;
    }

    public function  addColumn(DataGridColumn $column): static
    {
        return $this->addChild($column);
    }

    public function addOperationColumn(DataGridColumn $operation): static
    {
        $this->config['operation'] = $operation;
        return $this;
    }
}
