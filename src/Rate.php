<?php

namespace Nece\WebUi;

class Rate extends Component
{
    public function setLength(float $length): static
    {
        $this->config['length'] = $length;
        return $this;
    }

    public function setValue(float $value): static
    {
        $this->config['value'] = $value;
        return $this;
    }

    public function setHalf(bool $half = true): static
    {
        $this->config['half'] = $half;
        return $this;
    }

    public function setTheme(string $theme): static
    {
        $this->config['theme'] = $theme;
        return $this;
    }

    public function setShowText(bool $show_text = true): static
    {
        $this->config['show_text'] = $show_text;
        return $this;
    }

    public function setReadOnly(bool $readonly = true): static
    {
        $this->config['readonly'] = $readonly;
        return $this;
    }

    public function setTextFormatJsFunction(string $func): static
    {
        $this->config['text_format'] = 'text_format_js_function';
        $this->addJsFunction('text_format_js_function', $func);
        return $this;
    }

    public function setOnChooseJsFunction(string $func): static
    {
        $this->config['on_choose'] = 'on_choose_js_function';
        $this->addJsFunction('on_choose_js_function', $func);
        return $this;
    }
}
