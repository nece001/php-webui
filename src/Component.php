<?php

namespace Nece\WebUi;

class Component
{
    protected $class_names = [];
    protected $inline_style = [];

    protected $config = [];
    protected $attributes = [];
    protected $children = [];

    public function getConfig(string $name, $default = null)
    {
        return $this->config[$name] ?? $default;
    }

    public function removeConfig(string $name): static
    {
        if (isset($this->config[$name])) {
            unset($this->config[$name]);
        }
        return $this;
    }

    public function setAttribute(string $name, string $value): static
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function removeAttribute(string $name): static
    {
        if (isset($this->attributes[$name])) {
            unset($this->attributes[$name]);
        }
        return $this;
    }

    public function getAttribute(string $name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
    }

    public function getAttributes(): array
    {
        $class_name = implode(' ', $this->class_names);
        $css_rules = [];
        foreach ($this->inline_style as $name => $value) {
            $css_rules[] = "{$name}:{$value};";
        }
        $css = implode('', $css_rules);

        $this->getId();
        $this->attributes['id'] = $this->getId();
        if ($class_name) {
            $this->attributes['class'] = $class_name;
        }

        if ($css) {
            $this->attributes['style'] = $css;
        }

        return $this->attributes;
    }

    public function addChild(Component $child): static
    {
        $this->children[] = $child;
        return $this;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function setClassName(string $class_name): static
    {
        $class_name = trim($class_name);
        $this->class_names = explode(' ', $class_name);
        return $this;
    }

    public function addClassName(string $names): static
    {
        if ($names) {
            $names = explode(' ', trim($names));

            // 合并数组,去重
            $names = array_unique(array_merge($this->class_names, $names));

            // 清理掉空字符串元素
            $this->class_names = array_filter($names);
        }
        return $this;
    }

    public function removeClassName(string $names = ''): static
    {
        if ($names) {
            $names = array_filter(explode(' ', trim($names)));
            $this->class_names = array_diff($this->class_names, $names);
        } else {
            $this->class_names = [];
        }
        return $this;
    }

    public function setCss(string $style): static
    {
        $rules = explode(';', trim(trim($style), ';'));
        $items = [];
        foreach ($rules as $rule) {
            $parts = explode(':', trim($rule));
            $name = trim($parts[0]);
            $value = trim($parts[1]);
            $items[$name] = $value;
        }

        $this->inline_style = $items;
        return $this;
    }

    public function addCss(string $style): static
    {
        $rules = explode(';', trim(trim($style), ';'));
        foreach ($rules as $rule) {
            $parts = explode(':', trim($rule));
            $name = trim($parts[0]);
            $value = trim($parts[1]);
            $this->inline_style[$name] = $value;
        }

        return $this;
    }

    public function removeCss(array $names = []): static
    {
        if ($names) {
            $names = array_filter($names);
            $this->inline_style = array_diff_key($this->inline_style, $names);
        } else {
            $this->inline_style = [];
        }
        return $this;
    }

    public function setId(string $id): static
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getId(): string
    {
        $id = $this->getAttribute('id', '');
        if (!$id) {
            $id = 'element_' . uniqid();
            $this->setAttribute('id', $id);
        }

        return $id;
    }
}
