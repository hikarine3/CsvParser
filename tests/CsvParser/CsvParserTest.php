<?php
require_once( __DIR__ . '/../../src/CsvParser.php' );
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
        $datas = $this->parser->parse(['file' => __DIR__ .'/test_input.csv']);
        $this->assertEquals( $datas[0]['column1'] , 'japan');
        $this->assertEquals( $datas[0]['column2'] , 'JP');
        $this->assertEquals( $datas[1]['column1'] , 'usa');
        $this->assertEquals( $datas[1]['column2'] , 'US');
        $this->assertEquals( $datas[1]['column4'] , 'america');
        $this->assertEquals( $datas[2]['column1'] , 'china');
        $this->assertEquals( $datas[2]['column2'] , 'CN');
        $this->assertEquals( $datas[3]['column1'] , 'russia');
        $this->assertEquals( $datas[3]['column2'] , 'Russia<br />Country');

        $datas = $this->parser->parse(['file' => __DIR__ .'/test_input2.csv']);
        $this->assertEquals( $datas[0]['tourSpotId'] , 'tourspots[0]');
        $this->assertEquals( $datas[0]['value'] , '第７回　現代ガラス展');
        $this->assertEquals( $datas[2]['tourSpotId'] , 'tourspots[0]');
    }
}

