<?php

namespace Nece\WebUi;

class Container extends Component
{
    public function setFluid(bool $fluid = true): static
    {
        $this->config['fluid'] = $fluid;
        return $this;
    }
}
