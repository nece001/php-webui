<?php

namespace Nece\WebUi\Render;

use Nece\WebUi\Render;

class PageRender extends Render
{
    private static $style_code = [];
    private static $javascript_code = [];

    public static function addJavaScriptCode(string $code, string $key = ''): void
    {
        if ($key) {
            static::$javascript_code[$key] = $code;
        } else {
            static::$javascript_code[] = $code;
        }
    }

    public static function addStyleCode(string $code, string $key = ''): void
    {
        if ($key) {
            static::$style_code[$key] = $code;
        } else {
            static::$style_code[] = $code;
        }
    }

    public function render(): string
    {
        $nodes = [
            $this->renderHeader(),
            $this->renderBody(),
        ];

        return '<!DOCTYPE html>' . $this->renderHtml('html', [], $nodes);
    }

    private function renderHeader(): string
    {
        $charset = $this->component->getConfig('charset', 'utf-8');
        $title = $this->component->getConfig('title', '');
        $viewPort = $this->component->getConfig('viewPort', '');
        $keywords = $this->component->getConfig('keywords', '');
        $description = $this->component->getConfig('description', '');
        $style_urls = $this->component->getConfig('style_urls', []);

        $nodes = [
            $this->renderHtml('meta', ['charset' => $charset]),
            $this->renderHtml('meta', ['name' => 'viewport', 'content' => $viewPort]),
            $this->renderHtml('title', [], $title),
        ];

        if ($keywords) {
            $nodes[] = $this->renderHtml('meta', ['name' => 'keywords', 'content' => $keywords]);
        }

        if ($description) {
            $nodes[] = $this->renderHtml('meta', ['name' => 'description', 'content' => $description]);
        }

        if ($style_urls) {
            foreach ($style_urls as $url) {
                $nodes[] = $this->renderHtml('link', ['rel' => 'stylesheet', 'href' => $url]);
            }
        }

        if (self::$style_code) {
            $nodes[] = $this->renderHtml('style', [], implode("\n", self::$style_code));
            self::$style_code = [];
        }

        return $this->renderHtml('head', [], $nodes);
    }

    private function renderBody(): string
    {
        $children = $this->component->getChildren();
        $javascript_urls = $this->component->getConfig('javascript_urls', []);

        $nodes = [];
        foreach ($children as $child) {
            $nodes[] = $this->getRender($child)->render();
        }
        if ($javascript_urls) {
            foreach ($javascript_urls as $url) {
                $nodes[] = $this->renderHtml('script', ['src' => $url]);
            }
        }

        if (self::$javascript_code) {
            $nodes[] = $this->renderHtml('script', [], implode("\n", self::$javascript_code));
            self::$javascript_code = [];
        }

        return $this->renderHtml('body', $this->component->getAttributes(), $nodes);
    }
}
