<?php

namespace Nece\WebUi;

class IconList extends Component
{
    public function setBindId(string $bind_id): static
    {
        $this->config['bind_id'] = $bind_id;
        return $this;
    }
}
