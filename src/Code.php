<?php

namespace Nece\WebUi;

class Code extends Component
{
    public function setCode(string $code): static
    {
        $this->config['code'] = $code;
        return $this;
    }

    public function setPreview(string $preview): static
    {
        if ($preview == 'true') {
            $this->config['preview'] = true;
        } elseif ($preview == 'false') {
            $this->config['preview'] = false;
        } else {
            $this->config['preview'] = $preview;
        }

        return $this;
    }

    public function setLayout(array $layout): static
    {
        $this->config['layout'] = $layout;
        return $this;
    }

    public function setStyle(string $style): static
    {
        $this->config['style'] = $style;
        return $this;
    }

    public function setCodeStyle(string $code_style): static
    {
        $this->config['code_style'] = $code_style;
        return $this;
    }

    public function setPreviewStyle(string $preview_style): static
    {
        $this->config['preview_style'] = $preview_style;
        return $this;
    }

    public function setTools(array $tools): static
    {
        $this->config['tools'] = $tools;
        return $this;
    }

    public function setToolsEventFunction(string $tools_event_function): static
    {
        $this->config['tools_event_function'] = $tools_event_function;
        return $this;
    }

    public function setCopy(bool $copy = true): static
    {
        $this->config['copy'] = $copy;
        return $this;
    }

    public function setText(string $code, string $preview = ''): static
    {
        $this->config['text'] = ['code' => $code, 'preview' => $preview];
        return $this;
    }

    public function setHeader(bool $header = true): static
    {
        $this->config['header'] = $header;
        return $this;
    }

    public function setLn(bool $ln = true): static
    {
        $this->config['ln'] = $ln;
        return $this;
    }

    public function setTheme(string $theme): static
    {
        $this->config['theme'] = $theme;
        return $this;
    }

    public function setEncode(bool $encode = true): static
    {
        $this->config['encode'] = $encode;
        return $this;
    }

    public function setLang(string $lang): static
    {
        $this->config['lang'] = $lang;
        return $this;
    }

    public function setLangMarker(bool $lang_marker = true): static
    {
        $this->config['lang_marker'] = $lang_marker;
        return $this;
    }

    public function setWordWrap(bool $word_wrap = true): static
    {
        $this->config['word_wrap'] = $word_wrap;
        return $this;
    }

    public function setHighlighter(string $highlighter = 'hljs'): static
    {
        $this->config['highlighter'] = $highlighter;
        return $this;
    }

    public function setCodeRender(string $code_render): static
    {
        $this->config['code_render'] = $code_render;
        return $this;
    }

    public function setDoneFunction(string $done_function): static
    {
        $this->config['done_function'] = $done_function;
        return $this;
    }

    public function setCopyFunction(string $copy_function): static
    {
        $this->config['copy_function'] = $copy_function;
        return $this;
    }

    public function setHighlightLine(array $highlight_line): static
    {
        $this->config['highlight_line'] = $highlight_line;
        return $this;
    }
}
