<?php

namespace Nece\WebUi;


class Tab extends Component
{
    public function addChild(Component $child): static
    {
        if (!$child instanceof TabItem) {
            throw new \Exception('Tab only accept TabItem child');
        }

        $this->children[] = $child;
        return $this;
    }

    public function setCard(bool $card = true): static
    {
        $this->config['card'] = $card;
        return $this;
    }

    public function setPanel(bool $panel = true): static
    {
        $this->config['panel'] = $panel;
        return $this;
    }

    public function setInline(bool $inline = true): static
    {
        $this->config['inline'] = $inline;
        return $this;
    }

    public function setTrigger(string $trigger = 'click'): static
    {
        $this->config['trigger'] = $trigger;
        return $this;
    }
}
