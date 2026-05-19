<?php

namespace Nece\WebUi;

class CheckBox extends Control
{
    /**
     * 设置选中值
     *
     * @author nece001@163.com
     * @create 2026-05-11 14:35:04
     *
     * @param array $values
     * @return static
     */
    public function setCheckedValues(array $values): static
    {
        $this->config['checked_values'] = $values;
        return $this;
    }

    /**
     * 添加选项
     *
     * @author nece001@163.com
     * @create 2026-05-11 14:34:55
     *
     * @param mixed $value
     * @param string $label
     * @param boolean $disabled
     * @param string $template
     * @return static
     */
    public function addOption($value, string $label, bool $disabled = false, string $skin = '', string $template = ''): static
    {
        $this->config['options'][] = [
            'value' => $value,
            'label' => $label,
            'disabled' => $disabled,
            'skin' => $skin,
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

    public function setSwitch(bool $switch = true): static
    {
        $this->config['switch'] = $switch;
        return $this;
    }
}
