# Example: First line will be used as key

```
$file = "input.csv";
$delimiter = ",";
$parser = new CsvParser();
$data = $parser->parse({"delimiter" => $delimiter, file" => $file});
print_r($data);
```

Default deliiter is ','

# How to test

composer test tests;

# Author

Hajime Kurita

An adminstrator of https://sakuhindb.com/ , http://minakoe.jp/ and so on

https://github.com/hikarine3

https://twitter.com/hikarine3

https://vpsaws.com/
