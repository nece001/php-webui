<?php

namespace Nece\WebUi;

class Tag extends Component
{
    public function __construct($tag)
    {
        $this->config['tag'] = $tag;
    }
}
