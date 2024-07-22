<?php

namespace LupaSearch\LupaSearchPluginCore\Api;

use LupaSearch\Exceptions\BadResponseException;

interface DocumentsApiInterface
{
    /**
     * @param string $indexId
     * @return int
     * @throws BadResponseException
     */
    public function getCount(string $indexId): int;

    /**
     * @param string $indexId
     * @param string[] $selectFields
     * @param int $limit
     * @param int|null $searchAfter
     * @return array{documents: array<string, mixed>, limit: int, nextPageSearchAfter: int}
     * @throws BadResponseException
     */
    public function getAll(string $indexId, array $selectFields, int $limit, ?int $searchAfter = null): array;

    /**
     * @param string $indexId
     * @param array{documents: array<string, mixed>} $httpBody
     * @return array{batcKey: string, success: bool}
     * @throws BadResponseException
     */
    public function importDocuments(string $indexId, array $httpBody): array;

    /**
     * @param string $indexId
     * @param array{documents: array<string, mixed>} $httpBody
     * @return array{batcKey: string, success: bool}
     * @throws BadResponseException
     */
    public function updateDocuments(string $indexId, array $httpBody): array;

    /**
     * @param string $indexId
     * @param array{documents: array<string, mixed>, finished: bool} $httpBody
     * @return array{batcKey: string, success: bool}
     */
    public function replaceAllDocuments(string $indexId, array $httpBody): array;

    /**
     * @param string $indexId
     * @param array{ids: array<int|string>} $httpBody
     * @return void
     */
    public function batchDelete(string $indexId, array $httpBody): void;
}
