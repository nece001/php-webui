<?php

namespace Nece\WebUi;

class Fieldset extends Component
{
    public function setTitle(string $title): static
    {
        $this->config['title'] = $title;
        return $this;
    }

    public function setLine(bool $line = true): static
    {
        $this->config['line'] = $line;
        return $this;
    }
}
