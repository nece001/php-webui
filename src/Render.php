<?php

namespace Nece\WebUi;

use Nece\WebUi\Render\ContentRender;
use Nece\WebUi\Render\TagRender;
use Spatie\HtmlElement\HtmlElement;

abstract class Render
{
    /**
     * Component
     *
     * @var Component
     */
    protected $component;

    /**
     * 构造函数
     *
     * @author nece001@163.com
     * @create 2026-05-09 13:11:27
     *
     * @param Component $component
     */
    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    /**
     * 渲染
     *
     * @return string
     */
    abstract public function render(): string;

    /**
     * 转换为字符串
     *
     * @author nece001@163.com
     * @create 2026-05-09 13:12:23
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    protected function renderHtml(string $tag,  $attributes = [],  $nodes = ''): string
    {
        return HtmlElement::render($tag, $attributes, $nodes);
    }

    protected function getRender(Component $component): Render
    {
        if ($component instanceof Content) {
            return new ContentRender($component);
        }

        if ($component instanceof RichEditor) {
            $class_name = $component->getConfig('render_name');
            return new $class_name($component);
        }

        $class_name = $this->getClassBaseName(get_class($component));
        $namespace = $this->getNamespace(static::class);
        $render_name = $namespace . '\\' . $class_name . 'Render';
        return new $render_name($component);
    }

    protected function getClassBaseName(string $class): string
    {
        $parts = explode('\\', $class);
        return array_pop($parts);
    }

    protected function getNamespace(string $class): string
    {
        $parts = explode('\\', $class);
        return implode('\\', array_slice($parts, 0, -1));
    }

    protected function arrayFilter(array $array): array
    {
        return array_filter($array, function ($value) {
            return !is_null($value);
        });
    }

    protected function arrayToJavaScriptObject(array $array, array $replace): string
    {
        $array = $this->arrayFilter($array);
        $json = json_encode($array, JSON_UNESCAPED_UNICODE);
        if ($replace) {
            foreach ($replace as $key => $value) {
                $json = str_replace('"' . $key . '"', $value, $json);
            }
        }
        return $json;
    }

    protected function templateFetchPlaceholders(string $template): array
    {
        $data = [];
        $pattern = '/({([^{}]+)})/';
        if (preg_match_all($pattern, $template, $matches)) {
            foreach ($matches[2] as $i => $name) {
                $hold = $matches[0][$i];
                $data[$name] = $hold;
            }
        }
        return $data;
    }

    protected function templateReplaceVarName(string $template)
    {
        $placeholders = $this->templateFetchPlaceholders($template);
        foreach ($placeholders as $name => $hold) {
            $template = str_replace($hold, 'd.' . $name, $template);
        }
        return $template;
    }

    protected function templateReplaceOutput(string $template)
    {
        $placeholders = $this->templateFetchPlaceholders($template);
        foreach ($placeholders as $name => $hold) {
            $template = str_replace($hold, '{{=d.' . $name . '}}', $template);
        }
        return $template;
    }
}
