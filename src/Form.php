<?php

namespace Nece\WebUi;

class Form extends Component
{
    public function setMethod(string $method): static
    {
        $this->attributes['method'] = $method;
        return $this;
    }

    public function setAction(string $action): static
    {
        $this->attributes['action'] = $action;
        return $this;
    }

    public function setEnctype(string $enctype): static
    {
        $this->attributes['enctype'] = $enctype;
        return $this;
    }

    public function setTarget(string $target): static
    {
        $this->attributes['target'] = $target;
        return $this;
    }

    public function addChild(Component $child): static
    {
        if (!$child instanceof Control) {
            throw new \Exception('Form must add Control child');
        }

        $this->children[] = $child;
        return $this;
    }

    public function addInlineChildren(array $children): static
    {
        foreach ($children as $child) {
            if (!$child instanceof Control) {
                throw new \Exception('Form must add Control child');
            }
        }

        $this->children[] = $children;
        return $this;
    }

    public function setInlineLayout(bool $inline_layout = true): static
    {
        $this->config['inline_layout'] = $inline_layout;
        return $this;
    }

    public function setButtons(array $buttons, string $align = ''): static
    {
        $this->config['buttons'] = $buttons;
        $this->config['button_align'] = $align;
        return $this;
    }

    public function bindDataGrid(DataGrid $dataGrid, bool $from_data_grid = false): static
    {
        if (!$from_data_grid) {
            $dataGrid->bindSearchForm($this);
        }
        $this->config['data_grid'] = $dataGrid;
        return $this;
    }
}
