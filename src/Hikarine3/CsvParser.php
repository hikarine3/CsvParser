<?php
/*
Official URL: https://github.com/hikarine3/CsvParser
Author: Hajime Kurita
*/
namespace Hikarine3;

class CsvParser
{
	private $file = "";
	private $delimiter = "";

	public function show_help() {
		print 'Showing Usage becaused this program is executed as a stand alone script: 
# First line will be used as key
$file = "input.csv";
$delimiter = ",";
$parser = new CsvParser();
$data = $parser->parse({"delimiter" => $delimiter, file" => $file});
print_r($data);
';
	}

	public function __construct($op = null) {
		if(isset($op['delimiter'])) {
			$this->delimiter = $op['delimiter'];
		}
		if(isset($op['file'])) {
			$this->file = $op['file'];
		}
	}

	public function parse($op = null) {
		if(isset($op['delimiter'])) {
			$this->delimiter = $op['delimiter'];
		}
		if(isset($op['file'])) {
			$this->file = $op['file'];
			print($this->file);
        }
        if( !defined($this->delimiter) ) {
            $this->delimiter = ',';
        }
        if( empty($this->file) ) {
            error_log("Please specify file as a parameter");
            exit;
        }
        
		$lines = array_filter(
			explode( "\n", file_get_contents( $this->file ) ),
			function($line) {
				if(preg_match('/^#/', $line)) {
					return false;
				}
				else {
					return true;
				}
			}
		);
		$headers = str_getcsv( array_shift( $lines ), $this->delimiter );
		$data = [];
		foreach ( $lines as $line ) {
		$row = [];
		foreach ( str_getcsv( $line, $this->delimiter ) as $key => $field )
			$row[ $headers[ $key ] ] = $field;
			$row = array_filter( $row );
			$data[] = $row;
		}
		return $data;
	}
}

if(empty(debug_backtrace())){
	// This part is executed when this PHP is executed directly
    $parser = new CsvParser();
    $parser->show_help();
}
