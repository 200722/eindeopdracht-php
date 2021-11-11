# Profanity Filter

A simple class to test if a string has a profanity in it.

## Usage

```php

    $word_found = $row['woord'];
    $new_word = preg_replace('/(?!^.?).(?!.{0}$)/', '*', $word);
    $key = array_search($word_found, $string_to_array);
    $length = strlen($word_found) - 1;
    $replace = array($key => $new_word);
    $string_to_array = array_replace($string_to_array, $replace);
    // print_r($replace);

```

## Kudos

Have to mention the following project as it gave me a good foundation for the regex and a list of swear words.

https://github.com/Profanity-Filter

### License

ProfanityFilter is open-sourced

### CRUD

select
Greate
delete
update

### filter swearword

$new_word = preg_replace('/(?!^.?).(?!.{0}$)/', '\*', $word);
