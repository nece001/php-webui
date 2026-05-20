<?php

namespace Nece\WebUi;

class Slider extends Component
{
    public function setVertical(bool $vertical = true): static
    {
        $this->config['vertical'] = $vertical;
        return $this;
    }

    public function setValue(float $value): static
    {
        $this->config['value'] = $value;
        return $this;
    }

    public function setRange(bool $range = true): static
    {
        $this->config['range'] = $range;
        return $this;
    }

    public function setRangeValue(float $value1, float $value2): static
    {
        $this->config['range_value'] = [$value1, $value2];
        return $this;
    }

    public function setMin(float $min): static
    {
        $this->config['min'] = $min;
        return $this;
    }

    public function setMax(float $max): static
    {
        $this->config['max'] = $max;
        return $this;
    }

    public function setStep(float $step): static
    {
        $this->config['step'] = $step;
        return $this;
    }

    public function setShowStep(bool $showStep = true): static
    {
        $this->config['show_step'] = $showStep;
        return $this;
    }

    public function setTips(bool $tips = true): static
    {
        $this->config['tips'] = $tips;
        return $this;
    }

    public function setTipsAlways(bool $tipsAlways = true): static
    {
        $this->config['tips_always'] = $tipsAlways;
        return $this;
    }

    public function setShowInput(bool $show_input = true): static
    {
        $this->config['show_input'] = $show_input;
        return $this;
    }

    public function setheight(int $height): static
    {
        $this->setVertical(true);
        $this->config['height'] = $height;
        return $this;
    }

    public function setTheme(string $theme): static
    {
        $this->config['theme'] = $theme;
        return $this;
    }

    public function setDisabled(bool $disabled = true): static
    {
        $this->config['disabled'] = $disabled;
        return $this;
    }

    public function setTipsFormatJsFunction(string $func): static
    {
        $this->config['tips_format'] = 'tips_format_js_function';
        $this->addFunction('tips_format_js_function', $func);
        return $this;
    }

    public function setOnChangeJsFunction(string $func): static
    {
        $this->config['on_change'] = 'on_change_js_function';
        $this->addFunction('on_change_js_function', $func);
        return $this;
    }

    public function setDoneJsFunction(string $func): static
    {
        $this->config['done'] = 'done_js_function';
        $this->addFunction('done_js_function', $func);
        return $this;
    }
}
