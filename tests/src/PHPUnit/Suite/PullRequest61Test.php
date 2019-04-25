<?php


namespace Swaggest\JsonSchema\Tests\PHPUnit\Suite;


use Swaggest\JsonSchema\InvalidValue;
use Swaggest\JsonSchema\Schema;

class PullRequest61Test extends \PHPUnit_Framework_TestCase
{
    public function testResolveRef()
    {
        $schemaPath = __DIR__ . '/../../../resources/suite/schema_with_local_ref.json';
        $schema = Schema::import($schemaPath);

        // Passes.
        $schema->in(json_decode('{"options":{"m": 123}}'));

        // Fails.
        try {
            $schema->in(json_decode('{"options":{"m": 124}}'));
            $this->fail("Exception expected");
        } catch (InvalidValue $e) {

        }
    }
}