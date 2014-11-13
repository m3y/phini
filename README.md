phini
=====
[![Build Status](https://travis-ci.org/m3y/phini.svg?branch=master)](https://travis-ci.org/m3y/phini)
[![Coverage Status](https://coveralls.io/repos/m3y/phini/badge.png?branch=master)](https://coveralls.io/r/m3y/phini?branch=master)

概要
----
phiniは、ini設定ファイルの値をアプリケーションから利用しやすくするためのユーティリティクラスです。

利用方法
--------

サンプルiniファイル
```ini
key3[] = value31
key3[] = value32
key3[] = value33

[section_one]
key11 = value11
key12 = value12
key13 = value13

[section_two]
key21 = value21
key22 = value22
key23 = value23
```

セクションを考慮する場合
```php
<?php

require 'vendor/autoload.php';

$ini = new M3y\Phini\Phini('/path/to/inifile.ini', true);

print $ini->section_two->key21; // value21
print $ini->key3[0]; // value31
```

セクションを考慮しない場合
```php
<?php

require 'vendor/autoload.php';

$ini = new M3y\Phini\Phini('/path/to/inifile.ini');
print $ini->key11; // value11
print $ini->key3[0]; // value31
```

テスト実行
----------
```
$ phpunit
```
