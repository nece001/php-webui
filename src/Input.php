<?php

namespace Nece\WebUi;

use PhpParser\Node\Expr\FuncCall;

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

    public function setMin(string $min): static
    {
        $this->setAttribute('min', $min);
        return $this;
    }

    public function setMax(string $max): static
    {
        $this->setAttribute('max', $max);
        return $this;
    }

    public function setStep(string $step): static
    {
        $this->setAttribute('step', $step);
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

    public function setAncestorId(string $ancestorId): static
    {
        $this->config['ancestor_id'] = $ancestorId;
        return $this;
    }

    public function setDateTimeRange(bool $datetime_range = true): static
    {
        $this->config['datetime_range'] = $datetime_range;
        return $this;
    }

    public function setSeparator(string $separator): static
    {
        if (!isset($this->config['separator'])) {
            $this->config['separator'] = $separator;
        }
        return $this;
    }

    public function setDateTimeRangeSeparator(string $datetime_range_separator): static
    {
        $this->config['separator'] = $datetime_range_separator;
        $this->config['datetime_range_separator'] = $datetime_range_separator;
        return $this;
    }

    public function setDateTimeRangeAssociatedId(string $datetime_range_associated_id): static
    {
        $this->config['datetime_range_associated_id'] = $datetime_range_associated_id;
        return $this;
    }

    public function setDateTimeRangeLinked(bool $datetime_range_linked = true): static
    {
        $this->config['datetime_range_linked'] = $datetime_range_linked;
        return $this;
    }

    public function setDateTimeFullPanel(bool $datetime_full_panel = true): static
    {
        $this->config['datetime_full_panel'] = $datetime_full_panel;
        return $this;
    }

    public function setDateTimeFormat(string $datetime_format): static
    {
        $this->config['datetime_format'] = $datetime_format;
        return $this;
    }

    public function setDateTimeWeekDayStart(int $datetime_week_day_start = 0): static
    {
        $this->config['datetime_week_day_start'] = $datetime_week_day_start;
        return $this;
    }

    public function setDateTimeFormatToDisplayJsFunction(string $format_to_display_js_function): static
    {
        $this->config['datetime_format_to_display'] = 'datetime_format_to_display_js_function';
        $this->addJsFunction('datetime_format_to_display_js_function', $format_to_display_js_function);
        return $this;
    }

    public function setDateTimeShortcuts(string $text, string $value): static
    {
        if (0 === strpos($value, 'function')) {
            $func = $value;
            $value = 'datetime_shortcuts_js_function_' . uniqid();
            $this->addJsFunction($value, $func);
        }

        $this->config['datetime_shortcuts'][] = [
            'text' => $text,
            'value' => $value,
        ];
        return $this;
    }

    public function setDateTimeDisabledDateJsFunction(string $disabled_date): static
    {
        $this->config['datetime_disabled_date'] = 'datetime_disabled_date_js_function';
        $this->addJsFunction('datetime_disabled_date_js_function', $disabled_date);
        return $this;
    }

    public function setDateTimeDisabledTimeJsFunction(string $disabled_time): static
    {
        $this->config['datetime_disabled_time'] = 'datetime_disabled_time_js_function';
        $this->addJsFunction('datetime_disabled_time_js_function', $disabled_time);
        return $this;
    }

    public function setDateTimePanelShow(bool $datetime_panel_show = true): static
    {
        $this->config['datetime_panel_show'] = $datetime_panel_show;
        return $this;
    }

    public function setDateTimePanelPosition(string $datetime_panel_position): static
    {
        $this->config['datetime_panel_position'] = $datetime_panel_position;
        return $this;
    }

    public function setDateTimePanelZIndex(int $datetime_panel_z_index = 10000): static
    {
        $this->config['datetime_panel_z_index'] = $datetime_panel_z_index;
        return $this;
    }

    public function setDateTimePanelShade(float $shade, string $color = ''): static
    {
        $this->config['datetime_panel_shade'] = [
            'shade' => $shade,
            'color' => $color,
        ];
        return $this;
    }

    public function setDateTimeLang(string $lang): static
    {
        $this->config['datetime_lang'] = $lang;
        return $this;
    }

    public function setDateTimeTheme(string $theme, string $color = ''): static
    {
        $this->config['datetime_theme'] = [
            'theme' => $theme,
            'color' => $color,
        ];
        return $this;
    }

    public function setDateTimeShowFestival(bool $show_festival = true): static
    {
        $this->config['datetime_show_festival'] = $show_festival;
        return $this;
    }

    public function addDateTimeMark(string $date, string $mark): static
    {
        $this->config['datetime_marks'][$date] = $mark;
        return $this;
    }

    public function setDateTimeMarkJsFunction(string $func): static
    {
        $this->config['datetime_marks'] = 'datetime_marks_js_function';
        $this->addJsFunction('datetime_marks_js_function', $func);
        return $this;
    }

    public function setDateTimeHolidays(array $holidays, array $workday): static
    {
        $this->config['datetime_holidays'] = [$holidays, $workday];
        return $this;
    }

    public function setDateTimeHolidaysJsFunction(string $func): static
    {
        $this->config['datetime_holidays'] = 'datetime_holidays_js_function';
        $this->addJsFunction('datetime_holidays_js_function', $func);
        return $this;
    }

    public function setDateTimeCellRenderJsFunction(string $func): static
    {
        $this->config['datetime_cell_render'] = 'datetime_cell_render_js_function';
        $this->addJsFunction('datetime_cell_render_js_function', $func);
        return $this;
    }

    public function setDateTimeReadyJsFunction(string $func): static
    {
        $this->config['datetime_ready'] = 'datetime_ready_js_function';
        $this->addJsFunction('datetime_ready_js_function', $func);
        return $this;
    }

    public function setDateTimeChangeJsFunction(string $func): static
    {
        $this->config['datetime_change'] = 'datetime_change_js_function';
        $this->addJsFunction('datetime_change_js_function', $func);
        return $this;
    }

    public function setDateTimeDoneJsFunction(string $func): static
    {
        $this->config['datetime_done'] = 'datetime_done_js_function';
        $this->addJsFunction('datetime_done_js_function', $func);
        return $this;
    }

    public function setDateTimeOnConfirmJsFunction(string $func): static
    {
        $this->config['datetime_on_confirm'] = 'datetime_on_confirm_js_function';
        $this->addJsFunction('datetime_on_confirm_js_function', $func);
        return $this;
    }

    public function setDateTimeOnNowJsFunction(string $func): static
    {
        $this->config['datetime_on_now'] = 'datetime_on_Now_js_function';
        $this->addJsFunction('datetime_on_Now_js_function', $func);
        return $this;
    }

    public function setDateTimeOnClearJsFunction(string $func): static
    {
        $this->config['datetime_on_clear'] = 'datetime_on_clear_js_function';
        $this->addJsFunction('datetime_on_clear_js_function', $func);
        return $this;
    }

    public function setDateTimePanelCloseJsFunction(string $func): static
    {
        $this->config['datetime_panel_close'] = 'datetime_panel_close_js_function';
        $this->addJsFunction('datetime_panel_close_js_function', $func);
        return $this;
    }
}
