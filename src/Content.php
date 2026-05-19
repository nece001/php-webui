<?php

namespace Nece\WebUi;

class Content extends Component
{
    public function __construct(string $content)
    {
        $this->config['content'] = $content;
    }
}
