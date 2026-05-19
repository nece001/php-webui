<?php

namespace Nece\WebUi;

class GridColumn extends Component
{
    public function setXs(int $xs): static
    {
        $this->config['xs'] = $xs;
        return $this;
    }

    public function setSm(int $sm): static
    {
        $this->setAttribute('sm', $sm);
        return $this;
    }

    public function setMd(int $md): static
    {
        $this->config['md'] = $md;
        return $this;
    }

    public function setLg(int $lg): static
    {
        $this->config['lg'] = $lg;
        return $this;
    }

    public function setXl(int $xl): static
    {
        $this->config['xl'] = $xl;
        return $this;
    }
}
