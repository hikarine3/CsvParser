# What is this
Simple CSV parser for PHP.
Return characters will be converted into
```
<br />
```

# How to install it

```
composer require hikarine3/csv-parser;
```
at the directory where composer.json exists

# Example: First line will be used as key

Let's consider csv file whose column name is id and name

```
$file = "input.csv";
$delimiter = ",";
$parser = new CsvParser();
$datas = $parser->parse({"delimiter" => $delimiter, file" => $file});
foreach ($datas as $data) {
    if(isset($data['id']) && isset($data['name']) ) {
/* ... */
    }
}

```

Default deliiter is ','

# Example of using this library for Laravel's seeder
```
<?php

use Illuminate\Database\Seeder;
use Hikarine3\CsvParser;
use Carbon\Carbon;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit','1024M');
        $file = __DIR__ .'/data/locations/countries.tsv';
        $parser = new CsvParser();
        $datas = $parser->parse(['delimiter' => "\t", 'file' => $file]);

        foreach ($datas as $data) {
            if(isset($data['id']) && isset($data['name']) ) {
                DB::table('countries')->insert([
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
```

# License / ライセンス / 执照

MIT

# Author / 作者

## Name / 名前 / 全名
Hajime Kurita

## Twitter
- EN: https://twitter.com/hajimekurita
- JP: https://twitter.com/hikarine3

## Blog
- EN: https://en.sakuhindb.com/pe/Administrator/
- JP: https://sakuhindb.com/pj/6_B4C9CDFDBFCDA4B5A4F3/

## Technical web services / 提供してる技術関連Webサービス / 技术网络服务
### VPS & Infra comparison / VPS比較 / VPS比较
- EN: https://vpsranking.com/en/
- CN: https://vpsranking.com/zh/
- JP: https://vpshikaku.com/

### Programming Language Comparison / プログラミング言語比較 / 编程语言比较
- EN: https://programminglang.com/en/
- CN: https://programminglang.com/zh/
- JP: https://programminglang.com/ja/

### OSS
- Docker: https://hub.docker.com/u/1stclass/
- Github: https://github.com/hikarine3
- NPM: https://www.npmjs.com/~hikarine3
- Perl: http://search.cpan.org/~hikarine/
- PHP: https://packagist.org/packages/hikarine3/
- Python: https://pypi.org/user/hikarine3/
