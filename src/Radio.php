<?php

namespace Nece\WebUi;

class Radio extends Control
{
    /**
     * 设置选中值
     *
     * @author nece001@163.com
     * @create 2026-05-11 14:35:17
     *
     * @param mixed $value
     * @return static
     */
    public function setCheckedValue($value): static
    {
        $this->config['checked_value'] = $value;
        return $this;
    }

    /**
     * 添加选项
     *
     * @author nece001@163.com
     * @create 2026-05-11 14:35:24
     *
     * @param mixed $value
     * @param string $label
     * @param boolean $disabled
     * @param string $template
     * @return static
     */
    public function addOption($value, string $label, bool $disabled = false, string $template = ''): static
    {
        $this->config['options'][] = [
            'value' => $value,
            'label' => $label,
            'disabled' => $disabled,
            'template' => $template,
        ];
        return $this;
    }

    /**
     * 获取选项
     *
     * @author nece001@163.com
     * @create 2026-05-11 14:39:18
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->config['options'];
    }

    public function setClearInputBorder(bool $border = true): static
    {
        $this->config['clear_input_border'] = $border;
        return $this;
    }
}
