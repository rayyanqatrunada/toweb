<?php

/**
 * Fallback polyfill for PHP intl extension and NumberFormatter.
 * Ini memastikan Laravel & Filament tetap berjalan lancar bahkan jika
 * hosting belum mengaktifkan ekstensi PHP "intl".
 */

namespace {
    if (! extension_loaded('intl')) {
        if (! class_exists('NumberFormatter')) {
            class NumberFormatter
            {
                public const PATTERN_DECIMAL = 0;
                public const DECIMAL = 1;
                public const CURRENCY = 2;
                public const PERCENT = 3;
                public const SCIENTIFIC = 4;
                public const SPELLOUT = 5;
                public const ORDINAL = 6;
                public const DURATION = 7;
                public const NUMBERING_SYSTEM = 8;
                public const PATTERN_RULEBASED = 9;
                public const CURRENCY_CODE = 10;

                public const PARSE_INT_ONLY = 0;
                public const GROUPING_USED = 1;
                public const DECIMAL_ALWAYS_SHOWN = 2;
                public const MAX_INTEGER_DIGITS = 3;
                public const MIN_INTEGER_DIGITS = 4;
                public const INTEGER_DIGITS = 5;
                public const MAX_FRACTION_DIGITS = 6;
                public const MIN_FRACTION_DIGITS = 7;
                public const FRACTION_DIGITS = 8;
                public const MULTIPLIER = 9;
                public const GROUPING_SIZE = 10;
                public const ROUNDING_MODE = 11;
                public const ROUNDING_INCREMENT = 12;
                public const FORMAT_WIDTH = 13;
                public const PADDING_POSITION = 14;
                public const SECONDARY_GROUPING_SIZE = 15;
                public const SIGNIFICANT_DIGITS_USED = 16;
                public const MIN_SIGNIFICANT_DIGITS = 17;
                public const MAX_SIGNIFICANT_DIGITS = 18;
                public const LENIENT_PARSE = 19;

                public const POSITIVE_PREFIX = 0;
                public const POSITIVE_SUFFIX = 1;
                public const NEGATIVE_PREFIX = 2;
                public const NEGATIVE_SUFFIX = 3;
                public const PADDING_CHARACTER = 4;
                public const CURRENCY_CODE_SYMBOL = 5;
                public const DEFAULT_RULESET = 6;
                public const PUBLIC_RULESETS = 7;

                public const DECIMAL_SEPARATOR_SYMBOL = 0;
                public const GROUPING_SEPARATOR_SYMBOL = 1;
                public const PATTERN_SEPARATOR_SYMBOL = 2;
                public const PERCENT_SYMBOL = 3;
                public const ZERO_DIGIT_SYMBOL = 4;
                public const DIGIT_SYMBOL = 5;
                public const MINUS_SIGN_SYMBOL = 6;
                public const PLUS_SIGN_SYMBOL = 7;
                public const CURRENCY_SYMBOL = 8;
                public const INTL_CURRENCY_SYMBOL = 9;
                public const MONETARY_SEPARATOR_SYMBOL = 10;
                public const EXPONENTIAL_SYMBOL = 11;
                public const PERMILL_SYMBOL = 12;
                public const PAD_ESCAPE_SYMBOL = 13;
                public const INFINITY_SYMBOL = 14;
                public const NAN_SYMBOL = 15;
                public const SIGNIFICANT_DIGIT_SYMBOL = 16;
                public const MONETARY_GROUPING_SEPARATOR_SYMBOL = 17;

                public const TYPE_DEFAULT = 1;
                public const TYPE_INT32 = 2;
                public const TYPE_INT64 = 3;
                public const TYPE_DOUBLE = 4;
                public const TYPE_CURRENCY = 5;

                protected ?string $locale;
                protected int $style;
                protected ?string $pattern;
                protected array $attributes = [];
                protected array $textAttributes = [];
                protected array $symbols = [];

                public function __construct(?string $locale = null, int $style = self::DECIMAL, ?string $pattern = null)
                {
                    $this->locale = $locale ?? 'en';
                    $this->style = $style;
                    $this->pattern = $pattern;
                }

                public static function create(?string $locale = null, int $style = self::DECIMAL, ?string $pattern = null): self
                {
                    return new self($locale, $style, $pattern);
                }

                public function setAttribute(int $attribute, int|float $value): bool
                {
                    $this->attributes[$attribute] = $value;
                    return true;
                }

                public function getAttribute(int $attribute): int|float|false
                {
                    return $this->attributes[$attribute] ?? false;
                }

                public function setTextAttribute(int $attribute, string $value): bool
                {
                    $this->textAttributes[$attribute] = $value;
                    return true;
                }

                public function getTextAttribute(int $attribute): string|false
                {
                    return $this->textAttributes[$attribute] ?? false;
                }

                public function setSymbol(int $symbol, string $value): bool
                {
                    $this->symbols[$symbol] = $value;
                    return true;
                }

                public function getSymbol(int $symbol): string|false
                {
                    return $this->symbols[$symbol] ?? false;
                }

                public function format(int|float $num, int $type = self::TYPE_DEFAULT): string|false
                {
                    $decimals = $this->attributes[self::FRACTION_DIGITS] ?? null;
                    $maxDecimals = $this->attributes[self::MAX_FRACTION_DIGITS] ?? 2;

                    $dec = $decimals !== null ? (int) $decimals : (int) $maxDecimals;

                    $isIndonesian = str_starts_with($this->locale ?? '', 'id');
                    $decPoint = $isIndonesian ? ',' : '.';
                    $thousandsSep = $isIndonesian ? '.' : ',';

                    if ($this->style === self::PERCENT) {
                        $formatted = number_format($num * 100, $dec, $decPoint, $thousandsSep);
                        return $formatted . '%';
                    }

                    if (is_int($num) && $decimals === null) {
                        return number_format($num, 0, $decPoint, $thousandsSep);
                    }

                    return number_format($num, $dec, $decPoint, $thousandsSep);
                }

                public function formatCurrency(float $num, string $currency): string|false
                {
                    $decimals = $this->attributes[self::FRACTION_DIGITS] ?? 0;
                    $isIndonesian = str_starts_with($this->locale ?? '', 'id') || $currency === 'IDR';

                    $decPoint = $isIndonesian ? ',' : '.';
                    $thousandsSep = $isIndonesian ? '.' : ',';

                    $formatted = number_format($num, $decimals, $decPoint, $thousandsSep);

                    if ($currency === 'IDR' || $currency === 'Rp') {
                        return 'Rp ' . $formatted;
                    }

                    return $currency . ' ' . $formatted;
                }

                public function parse(string $string, int $type = self::TYPE_DOUBLE, int &$offset = 0): int|float|false
                {
                    $cleaned = preg_replace('/[^\d\.\,\-]/', '', $string);
                    return is_numeric($cleaned) ? (float) $cleaned : false;
                }
            }
        }
    }
}

namespace Illuminate\Support {
    if (! \extension_loaded('intl')) {
        if (! function_exists('Illuminate\Support\extension_loaded')) {
            function extension_loaded(string $name): bool
            {
                if ($name === 'intl') {
                    return true;
                }
                return \extension_loaded($name);
            }
        }
    }
}
