<?php

namespace Nece\WebUi;

class Uploader extends Component
{

    public function setButtonText(string $text): static
    {
        $this->config['button_text'] = $text;
        return $this;
    }

    public function setButtonIcon(string $icon): static
    {
        $this->config['button_icon'] = $icon;
        return $this;
    }

    public function setUploadUrl(string $url): static
    {
        $this->config['url'] = $url;
        return $this;
    }

    public function setFieldName(string $name): static
    {
        $this->config['field_name'] = $name;
        return $this;
    }

    public function setData(array $data): static
    {
        $this->config['data'] = $data;
        return $this;
    }

    public function setDataFunctions(array $functions): static
    {
        $this->config['data_functions'] = 'data_functions';
        $this->addJsFunction('data_functions', $functions);
        return $this;
    }

    public function setHeaders(array $headers): static
    {
        $this->config['headers'] = $headers;
        return $this;
    }

    public function setDataType(string $type): static
    {
        $this->config['data_type'] = $type;
        return $this;
    }

    public function setAccept(string $accept): static
    {
        $this->config['accept'] = strtolower($accept);
        return $this;
    }

    public function setAcceptMime(array $accept_mime): static
    {
        $this->config['accept_mime'] = $accept_mime;
        return $this;
    }

    public function setAcceptExts(array $accept_exts): static
    {
        $this->config['accept_exts'] = $accept_exts;
        return $this;
    }

    public function setAuto(bool $auto = true): static
    {
        $this->config['auto'] = $auto;
        return $this;
    }

    public function setBindAction(string $action): static
    {
        $this->config['bind_action'] = '#' . $action;
        return $this;
    }

    public function setForce(bool $force = true): static
    {
        $this->config['force'] = $force;
        return $this;
    }

    public function setSize(int $size): static
    {
        $this->config['size'] = $size;
        return $this;
    }

    public function setMultiple(bool $multiple = true): static
    {
        $this->config['multiple'] = $multiple;
        return $this;
    }

    public function setUnified(bool $unified = true): static
    {
        $this->config['unified'] = $unified;
        return $this;
    }

    public function setLimitNumber(int $number): static
    {
        $this->config['limit_number'] = $number;
        return $this;
    }

    public function setDrag(bool $drag = true): static
    {
        $this->config['drag'] = $drag;
        return $this;
    }

    public function setFormatError(string $text): static
    {
        $this->config['format_error'] = $text;
        return $this;
    }

    public function setCheckError(string $text): static
    {
        $this->config['check_error'] = $text;
        return $this;
    }

    public function setUploadError(string $text): static
    {
        $this->config['upload_error'] = $text;
        return $this;
    }

    public function setLimitNumberMessage(string $text): static
    {
        $this->config['limit_number_message'] = $text;
        return $this;
    }

    public function setLimitSizeMessage(string $text): static
    {
        $this->config['limit_size_message'] = $text;
        return $this;
    }

    public function setCrossDomainMessage(string $text): static
    {
        $this->config['cross_domain_message'] = $text;
        return $this;
    }

    public function setChooseFunction(string $function): static
    {

        $this->config['choose'] = 'choose_function';
        $this->addJsFunction('choose_function', $function);
        return $this;
    }

    public function setUploadBeforeFunction(string $function): static
    {
        $this->config['upload_before'] = 'upload_before_function';
        $this->addJsFunction('upload_before_function', $function);
        return $this;
    }

    public function setProgressFunction(string $function): static
    {
        $this->config['progress'] = 'progress_function';
        $this->addJsFunction('progress_function', $function);
        return $this;
    }

    public function setDoneFunction(string $function): static
    {
        $this->config['done'] = 'done_function';
        $this->addJsFunction('done_function', $function);
        return $this;
    }

    public function setAllDoneFunction(string $function): static
    {
        $this->config['all_done'] = 'all_done_function';
        $this->addJsFunction('all_done_function', $function);
        return $this;
    }

    public function setUploadErrorFunction(string $function): static
    {
        $this->config['upload_error'] = 'upload_error_function';
        $this->addJsFunction('upload_error_function', $function);
        return $this;
    }
}
