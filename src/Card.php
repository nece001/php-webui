<?php

namespace Nece\WebUi;

class Card extends Component
{
    public function setTitle(string $title): static
    {
        $this->config['title'] = $title;
        return $this;
    }
}
