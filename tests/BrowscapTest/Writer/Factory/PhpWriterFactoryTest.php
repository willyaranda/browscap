<?php
declare(strict_types = 1);
namespace BrowscapTest\Writer\Factory;

use Browscap\Writer\Factory\PhpWriterFactory;
use Browscap\Writer\WriterCollection;
use Monolog\Logger;
use org\bovigo\vfs\vfsStream;

/**
 * Class FullPhpWriterFactoryTest
 *
 * @category   BrowscapTest
 *
 * @author     Thomas Müller <mimmi20@live.de>
 */
class PhpWriterFactoryTest extends \PHPUnit\Framework\TestCase
{
    public const STORAGE_DIR = 'storage';

    /**
     * @var \Browscap\Writer\Factory\PhpWriterFactory
     */
    private $object;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    public function setUp() : void
    {
        vfsStream::setup(self::STORAGE_DIR);

        $this->object = new PhpWriterFactory();
    }

    /**
     * tests creating a writer collection
     *
     * @group writer
     * @group sourcetest
     */
    public function testCreateCollection() : void
    {
        $logger = $this->createMock(Logger::class);
        $dir    = vfsStream::url(self::STORAGE_DIR);

        self::assertInstanceOf(WriterCollection::class, $this->object->createCollection($logger, $dir));
    }
}
