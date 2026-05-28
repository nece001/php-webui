<?php

namespace Nece\WebUi;

class IconList extends Component
{
    public function setBindId(string $bind_id): static
    {
        $this->config['bind_id'] = $bind_id;
        return $this;
    }

    public function setIsOpenWindow(bool $is_open_window = true): static
    {
        $this->config['is_open_window'] = $is_open_window;
        return $this;
    }
}
