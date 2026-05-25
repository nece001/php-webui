<?php

namespace Nece\WebUi;

class Transfer extends Component
{
    public function setFieldName(string $name): static
    {
        $this->config['field_name'] = $name;
        return $this;
    }

    public function setTitle(string $left, string $right): static
    {
        $this->config['title'] = [$left, $right];
        return $this;
    }

    public function addData(string $title, string $value, bool $checked = false, bool $disabled = false): static
    {
        $this->config['data'][] = [
            'title' => $title,
            'value' => $value,
            'checked' => $checked,
            'disabled' => $disabled,
        ];
        return $this;
    }

    public function setCheckedValues(array $checked_values): static
    {
        $this->config['checked_values'] = $checked_values;
        return $this;
    }

    public function setShowSearch(bool $show_search = true): static
    {
        $this->config['show_search'] = $show_search;
        return $this;
    }

    public function setWidth(int $width): static
    {
        $this->config['width'] = $width;
        return $this;
    }

    public function setHeight(int $height): static
    {
        $this->config['height'] = $height;
        return $this;
    }

    public function setNoDataText(string $text): static
    {
        $this->config['no_data_text'] = $text;
        return $this;
    }

    public function setSearchNoDataText(string $text): static
    {
        $this->config['search_no_data_text'] = $text;
        return $this;
    }

    public function setOnChangeJsFunction(string $function): static
    {
        $this->config['on_change'] = 'on_change_js_function';
        $this->addJsFunction('on_change_js_function', $function);
        return $this;
    }

    public function setOnDblclickJsFunction(string $function): static
    {
        $this->config['on_dblclick'] = 'on_dblclick_js_function';
        $this->addJsFunction('on_dblclick_js_function', $function);
        return $this;
    }

    public function setParseDataJsFunction(string $function): static
    {
        $this->config['parse_data'] = 'parse_data_js_function';
        $this->addJsFunction('parse_data_js_function', $function);
        return $this;
    }
}
