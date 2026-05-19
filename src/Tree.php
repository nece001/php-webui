<?php

namespace Nece\WebUi;

class Tree extends Component
{
    public function setName(string $name): static
    {
        $this->config['name'] = $name;
        return $this;
    }

    public function setData(array $data): static
    {
        $this->config['data'] = $data;
        return $this;
    }

    public function setShowLine(bool $show_line = true): static
    {
        $this->config['show_line'] = $show_line;
        return $this;
    }

    public function setOnlyIconControl(bool $only_icon_control = true): static
    {
        $this->config['only_icon_control'] = $only_icon_control;
        return $this;
    }

    public function setAccordion(bool $accordion = true): static
    {
        $this->config['accordion'] = $accordion;
        return $this;
    }

    public function setShowCheckbox(bool $show_checkbox = true): static
    {
        $this->config['show_checkbox'] = $show_checkbox;
        return $this;
    }
}
