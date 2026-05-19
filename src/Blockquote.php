<?php

namespace Nece\WebUi;

class Blockquote extends Component
{
    public function setBorder(bool $border = true): static
    {
        $this->config['border'] = $border;
        return $this;
    }
}
