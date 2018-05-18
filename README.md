# What is this
Simple CSV parser for PHP.
Return characters will be converted into
```
<br />
```

# How to install it

add 
```
    "require": {
        ...
        "hikarine3/csv-parser": "*",
        ...
    }
```
to composer.json

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
