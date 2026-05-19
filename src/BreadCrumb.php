<?php

namespace Nece\WebUi;

class BreadCrumb extends Component
{
    public function addLink(string $url, string $title)
    {
        $this->config['links'][] = [
            'url' => $url,
            'title' => $title,
        ];
        return $this;
    }
}
