<?php

namespace Nece\WebUi;

class Dropdown extends Component
{
    public function setBindId(string $id): static
    {
        $this->config['bind_id'] = $id;
        return $this;
    }

    public function setData(array $data): static
    {
        $this->config['data'] = $data;
        return $this;
    }

    public function setTrigger(string $trigger): static
    {
        $this->config['trigger'] = $trigger;
        return $this;
    }

    public function setCloseOnClick(bool $closeOnClick = true): static
    {
        $this->config['close_on_click'] = $closeOnClick;
        return $this;
    }

    public function setShow(bool $show = true): static
    {
        $this->config['show'] = $show;
        return $this;
    }

    public function setAlign(string $align): static
    {
        $this->config['align'] = $align;
        return $this;
    }

    public function setAllowSpread(bool $isAllowSpread = true): static
    {
        $this->config['allow_spread'] = $isAllowSpread;
        return $this;
    }

    public function setSpreadItem(bool $isSpreadItem = true): static
    {
        $this->config['spread_item'] = $isSpreadItem;
        return $this;
    }

    public function setAccordion(bool $isAccordion = true): static
    {
        $this->config['accordion'] = $isAccordion;
        return $this;
    }

    public function setDelay(int $delay, int $hidden = 0): static
    {
        $this->config['delay'] = ['delay' => $delay, 'hidden' => $hidden];
        return $this;
    }

    public function setShade(float $shade, string $color = ''): static
    {
        $this->config['shade'] = ['shade' => $shade, 'color' => $color];
        return $this;
    }

    public function setTemplate(string $template): static
    {
        if (0 === strpos($template, 'function')) {
            $func = $template;
            $template = 'template_js_function_' . uniqid();
            $this->addJsFunction($template, $func);
        }

        $this->config['template'] = $template;
        return $this;
    }

    public function setContent(string $content): static
    {
        $this->config['content'] = $content;
        return $this;
    }

    public function setClickScope(string $clickScope): static
    {
        $this->config['click_scope'] = $clickScope;
        return $this;
    }

    public function setCustomName(array $customName): static
    {
        $this->config['custom_name'] = $customName;
        return $this;
    }

    public function setReadyJsFunction(string $func): static
    {
        $this->config['ready'] = 'ready_js_function';
        $this->addJsFunction('ready_js_function', $func);
        return $this;
    }

    public function setClickJsFunction(string $func): static
    {
        $this->config['click'] = 'click_js_function';
        $this->addJsFunction('click_js_function', $func);
        return $this;
    }

    public function setCloseJsFunction(string $func): static
    {
        $this->config['close'] = 'close_js_function';
        $this->addJsFunction('close_js_function', $func);
        return $this;
    }

    public function setOnClickOutsideJsFunction(string $func): static
    {
        $this->config['on_click_outside'] = 'on_click_outside_js_function';
        $this->addJsFunction('on_click_outside_js_function', $func);
        return $this;
    }
}
