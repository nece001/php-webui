<?php

namespace Nece\WebUi;

class DataGridColumn extends Component
{
    public function setPrimaryKey(bool $primaryKey = true): static
    {
        $this->config['primary_key'] = $primaryKey;
        return $this;
    }

    public function setField(string $field): static
    {
        $this->config['field'] = $field;
        return $this;
    }

    public function setTitle(string $title): static
    {
        $this->config['title'] = $title;
        return $this;
    }

    public function setWidth(int $width = 100): static
    {
        $this->config['width'] = $width;
        return $this;
    }

    public function setAlign(string $align): static
    {
        $this->config['align'] = $align;
        return $this;
    }

    public function setFixed(string $fixed): static
    {
        $this->config['fixed'] = $fixed;
        return $this;
    }

    public function setTemplate(string $template): static
    {
        $this->config['template'] = $template;
        return $this;
    }

    public function setRowSpan(int $rowSpan): static
    {
        $this->config['row_span'] = $rowSpan;
        return $this;
    }

    public function setColSpan(int $colSpan): static
    {
        $this->config['col_span'] = $colSpan;
        return $this;
    }

    public function setSwitch(string $switch, ?Action $action = null): static
    {
        $this->config['template'] = 'switch';
        $this->config['switch'] = $switch;
        $this->config['switch_action'] = $action;
        return $this;
    }
}
