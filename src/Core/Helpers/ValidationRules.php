<?php

namespace Chargily\ChargilyPro\Core\Helpers;

use Symfony\Component\Validator\Constraints as SymfonyRule;

class ValidationRules
{
    /**
     * Collect rules
     *
     * @param array ...$rules
     * @return array
     */
    public static function collect(array ...$rules): array
    {
        return array_merge(...$rules);
    }
    /**
     * required validation rule
     *
     * @return array
     */
    public static function required(): array
    {
        return [new SymfonyRule\Required(), new SymfonyRule\NotBlank()];
    }
    /**
     * minimum validation rule
     *
     * @return array
     */
    public static function min(int $min): array
    {
        return [new SymfonyRule\Length(min: $min)];
    }
    /**
     * maximum validation rule
     *
     * @return array
     */
    public static function max(int $max): array
    {
        return [new SymfonyRule\Length(max: $max)];
    }
    /**
     * alpha_dash_num validation rule
     *
     * @return array
     */
    public static function alpha_dash_num(): array
    {
        return [new SymfonyRule\Regex(pattern: '/^[\p{L}\p{N}_-]+$/u')];
    }
    /**
     * exists validation rule
     *
     * @return array
     */
    public static function in(array $choices): array
    {
        return [new SymfonyRule\Choice(choices: $choices)];
    }
    /**
     * numeric validation rule
     *
     * @return array
     */
    public static function numeric(): array
    {
        return [new SymfonyRule\Type(type: "numeric", message: 'This field must be numeric')];
    }
    /**
     * string validation rule
     *
     * @return array
     */
    public static function string(): array
    {
        return [new SymfonyRule\Type(type: "string", message: 'This field must be string')];
    }
    /**
     * string validation rule
     *
     * @return array
     */
    public static function array(): array
    {
        return [new SymfonyRule\Type(type: "array", message: 'This field must be array')];
    }
    /**
     * url validation rule
     *
     * @return array
     */
    public static function url(): array
    {
        return [new SymfonyRule\Url()];
    }
    /**
     * webhooks validation rule
     *
     * @return array
     */
    public static function webhook(): array
    {
        return [new SymfonyRule\Url(protocols: "https", relativeProtocol: false)];
    }
    /**
     * datetime validation rule
     *
     * @return array
     */
    public static function datetime(): array
    {
        return [new SymfonyRule\DateTime()];
    }
}
