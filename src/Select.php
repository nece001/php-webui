<?php

namespace Nece\WebUi;

class Select extends Control
{
    /**
     * 设置选中值
     *
     * @author nece001@163.com
     * @create 2026-05-11 14:37:23
     *
     * @param array $values
     * @return static
     */
    public function setSelectedValues(array $values): static
    {
        $this->config['selected_values'] = $values;
        return $this;
    }

    /**
     * 添加选项
     *
     * @author nece001@163.com
     * @create 2026-05-11 14:37:14
     *
     * @param mixed $value
     * @param string $label
     * @param boolean $disabled
     * @param string $group
     * @return static
     */
    public function addOption($value, string $label, bool $disabled = false, string $group = ''): static
    {
        $row = [
            'value' => $value,
            'label' => $label,
            'disabled' => $disabled,
        ];

        if ($group) {
            $this->config['options'][$group]['items'][] = $row;
        } else {
            $this->config['options'][] = $row;
        }

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
}
