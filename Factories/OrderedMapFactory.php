<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface;
use LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries\OrderedMap;

use function array_keys;
use function is_array;
use function is_int;

class OrderedMapFactory
{
    /**
     * @param mixed[] $data
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    public static function create(array $data): OrderedMapInterface
    {
        $map = new OrderedMap();

        foreach ($data as $name => $value) {
            if (is_array($value) && !empty($value)) {
                $value = self::isAssoc($value) ? self::create($value) : array_map(static function ($item) {
                    return is_array($item) && !empty($item) && self::isAssoc($item) ? self::create($item) : $item;
                }, $value);
            }

            $map->add((string)$name, $value);
        }

        return $map;
    }

    /**
     * @param mixed[] $array
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    private static function isAssoc(array $array): bool
    {
        foreach (array_keys($array) as $key) {
            if (!is_int($key)) {
                return true;
            }
        }

        return false;
    }
}
