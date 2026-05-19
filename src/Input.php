<?php

namespace Nece\WebUi;

class Input extends Control
{
    public function __construct(string $type = 'text')
    {
        $this->setType($type);
    }

    /**
     *  设置输入框的值
     *
     * @author nece001@163.com
     * @create 2026-05-19 15:24:23
     *
     * @param mixed $value
     * @return static
     */
    public function setValue($value): static
    {
        $this->setAttribute('value', strval($value));
        return $this;
    }

    public function setPlaceholder(string $placeholder): static
    {
        $this->setAttribute('placeholder', $placeholder);
        return $this;
    }

    public function setValidate(array $validate): static
    {
        $this->setAttribute('validate', $validate);
        return $this;
    }

    public function setValidateType(string $validate_type): static
    {
        $this->setAttribute('validate_type', $validate_type);
        return $this;
    }
}
