<?php

namespace core;

class Validator
{


    public function __construct(protected array $rules, protected array $data)
    {
    }

    public static function make(array $rules, array $data): Validator
    {
        return new static($rules, $data);
    }

    public function validate(): bool
    {
        /*
         * $ruleGroup = ['required', 'min:3', 'max:20'];
         */
        foreach ($this->rules as $fieldKey => $ruleGroup) {
            foreach ($ruleGroup as $rule) {
                $value = $this->data[$fieldKey] ?? null;
                $handlers = $this->getHandlers();

                if (array_key_exists($rule, $handlers) && !$handlers[$rule]($value)) {
                    return false;
                }
            }
        }

        return true;
    }

    protected function getHandlers(): array
    {
        return [
            'required' => fn($value) => empty($value),
            'min3' => fn($value) => mb_strlen($value) < 3,
            'max255' => fn($value) => mb_strlen($value) > 255
        ];
    }
}