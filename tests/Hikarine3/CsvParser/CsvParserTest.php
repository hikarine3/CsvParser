<?php
use PHPUnit\Framework\TestCase;
use Hikarine3\CsvParser;

class CsvParserTest extends TestCase
{
    private $parser;

    public function testConstruct() {
        $this->parser = new CsvParser;
        $this->assertInstanceOf(
            "Hikarine3\CsvParser",
            $this->parser
        );
    }

    public function testParse() {
        $this->parser = new CsvParser;
        $datas = $this->parser->parse(['file' => 'tests/Hikarine3/CsvParser/test_input.csv']);
        $this->assertEquals( $datas[0]['column1'] , 'japan');
    }
}

