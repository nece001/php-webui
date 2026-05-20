<?php

namespace Nece\WebUi;

class Control extends Component
{
    public function setType(string $type): static
    {
        $this->setAttribute('type', $type);
        return $this;
    }

    public function setName(string $name): static
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function setDisabled(bool $disabled = true): static
    {
        if ($disabled) {
            $this->setAttribute('disabled', $disabled);
        } else {
            $this->removeAttribute('disabled');
        }
        return $this;
    }

    public function setReadOnly(bool $readOnly = true): static
    {
        if ($readOnly) {
            $this->setAttribute('readonly', $readOnly);
        } else {
            $this->removeAttribute('readonly');
        }
        return $this;
    }

    public function setLabel(string $label): static
    {
        $this->config['label'] = $label;
        return $this;
    }

    public function setDescription(string $description): static
    {
        $this->config['description'] = $description;
        return $this;
    }

    public function setSeparator(string $separator): static
    {
        $this->config['separator'] = $separator;
        return $this;
    }

    public function setAffix(string $affix): static
    {
        $this->config['affix'] = $affix;
        return $this;
    }

    public function setPrepend(Component $prepend): static
    {
        $this->config['prepend'] = $prepend;
        return $this;
    }

    public function setAppend(Component $append): static
    {
        $this->config['append'] = $append;
        return $this;
    }

    public function setPrefix(Component $prefix): static
    {
        $this->config['prefix'] = $prefix;
        return $this;
    }

    public function setSuffix(Component $suffix): static
    {
        $this->config['suffix'] = $suffix;
        return $this;
    }
}
