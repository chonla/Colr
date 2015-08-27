# Colr

Command line colorizer

## API

```php
$colr = new Colr;  // or
$colr = new Colr(array(
    "ok" => array("fg" => Colr::BLACK, "bg" => Colr::GREEN)
));
```

Use `fg()` to set foreground color:
```php
$colr->fg(Colr::GREEN);
```

Use `bg()` to set background color:
```php
$colr->bg(Colr::GREEN);
```

Use `set()` to select predefined preset:
```php
$colr = new Colr(array(
    "ok" => array("fg" => Colr::BLACK, "bg" => Colr::GREEN)
));
$colr->set("ok");
```

Use `write()` to echo some text:
```php
$colr->write("hello");
```

Use `writeln()` to echo some text with new line:
```php
$colr->writeln("hello");
```

Method chaining:
```php
$colr->fg(Color::GREEN)->write("hello");
```

## license
MIT: <http://chonla.mit-license.org/>