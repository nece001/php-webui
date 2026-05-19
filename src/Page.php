<?php

namespace Nece\WebUi;

class Page extends Component
{

    public function __construct()
    {
        $this->setLang('en');
        $this->setCharset('utf-8');
        $this->setViewPort('width=device-width, initial-scale=1.0');
    }

    public function setLang(string $lang): static
    {
        $this->config['lang'] = $lang;
        return $this;
    }

    public function setCharset(string $charset): static
    {
        $this->config['charset'] = $charset;
        return $this;
    }

    public function setViewPort(string $viewPort): static
    {
        $this->config['viewPort'] = $viewPort;
        return $this;
    }

    public function setTitle(string $title): static
    {
        $this->config['title'] = $title;
        return $this;
    }

    public function setKeywords(string $keywords): static
    {
        $this->config['keywords'] = $keywords;
        return $this;
    }

    public function setDescription(string $description): static
    {
        $this->config['description'] = $description;
        return $this;
    }

    public function setJavascriptUrls(array $javascript): static
    {
        $this->config['javascript_urls'] = $javascript;
        return $this;
    }

    public function addJavascriptUrl(string $url): static
    {
        $this->config['javascript_urls'][] = $url;
        return $this;
    }

    public function setStyleUrls(array $style): static
    {
        $this->config['style_urls'] = $style;
        return $this;
    }

    public function addStyleUrl(string $url): static
    {
        $this->config['style_urls'][] = $url;
        return $this;
    }
}
