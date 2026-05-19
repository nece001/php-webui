<?php

namespace Nece\WebUi;

class Flow extends Component
{
    public function setAuto(bool $auto = true): static
    {
        $this->config['auto'] = $auto;
        return $this;
    }

    public function setLazyimg(bool $lazyimg = true): static
    {
        $this->config['lazyimg'] = $lazyimg;
        return $this;
    }

    public function setEnd(string $end): static
    {
        $this->config['end'] = $end;
        return $this;
    }

    public function setMb(int $mb): static
    {
        $this->config['mb'] = $mb;
        return $this;
    }

    public function setMoreText(string $more_text): static
    {
        $this->config['more_text'] = $more_text;
        return $this;
    }

    public function setDirection(string $direction): static
    {
        $this->config['direction'] = $direction;
        return $this;
    }

    public function setScrollElemId(string $scroll_elem_id): static
    {
        $this->config['scroll_elem_id'] = '#' . $scroll_elem_id;
        return $this;
    }

    public function setDoneJsFunction(string $done_js_function): static
    {
        $this->config['done_js_function'] = $done_js_function;
        return $this;
    }

    public function setDataUrl(string $url, string $method = 'GET'): static
    {
        $this->config['data_url'] = ['url' => $url, 'method' => $method];
        return $this;
    }

    public function setDataItemTemplate(string $template): static
    {
        $this->config['data_template'] = $template; // 给js用时转为通用的json对象字面量，消除特殊字符的影响
        return $this;
    }
}
