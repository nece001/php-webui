<?php

namespace Nece\WebUi;

class CollapseItem extends Component
{
    public function setTitle(string $title): static
    {
        $this->config['title'] = $title;
        return $this;
    }

    public function setShow(bool $show = true): static
    {
        $this->config['show'] = $show;
        return $this;
    }
}
