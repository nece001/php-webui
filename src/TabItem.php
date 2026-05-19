<?php

namespace Nece\WebUi;

class TabItem extends Component
{
    public function setLabel(string $label): static
    {
        $this->config['label'] = $label;
        return $this;
    }

    public function setLabelBadge(Badge $badge): static
    {
        $this->config['badge'] = $badge;
        return $this;
    }
}
