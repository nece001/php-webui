<?php

namespace Nece\WebUi;

class ColorPicker extends Component
{
    public function setBindId(string $bind_id): self
    {
        $this->config['bind_id'] = $bind_id;
        return $this;
    }

    public function setColor(string $color): self
    {
        $this->config['color'] = $color;
        return $this;
    }

    public function setFormat(string $format): self
    {
        $this->config['format'] = $format;
        return $this;
    }

    public function setAlpha(bool $alpha): self
    {
        $this->config['alpha'] = $alpha;
        return $this;
    }

    public function setPredefine(bool $predefine = true): self
    {
        $this->config['predefine'] = $predefine;
        return $this;
    }

    public function setColors(array $colors): self
    {
        $this->config['colors'] = $colors;
        return $this;
    }

    public function setSize(string $size): self
    {
        $this->config['size'] = $size;
        return $this;
    }

    public function setChangeJsFunction(string $func): self
    {
        $this->config['change'] = 'change_js_function';
        $this->addJsFunction('change_js_function', $func);
        return $this;
    }

    public function setDoneJsFunction(string $func): self
    {
        $this->config['done'] = 'done_js_function';
        $this->addJsFunction('done_js_function', $func);
        return $this;
    }

    public function setCancelJsFunction(string $func): self
    {
        $this->config['cancel'] = 'cancel_js_function';
        $this->addJsFunction('cancel_js_function', $func);
        return $this;
    }

    public function setCloseJsFunction(string $func): self
    {
        $this->config['close'] = 'close_js_function';
        $this->addJsFunction('close_js_function', $func);
        return $this;
    }
}
