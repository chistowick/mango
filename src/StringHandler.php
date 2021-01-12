<?php

namespace Chistowick\Mango;

class StringHandler
{
    /**
     * Инвертирует буквы в словах текста с сохранением пунктуации
     *
     * @param string $input Исходный текст
     * @return string|null Результат или null в случае, если текст не удалось преобразовать
     **/
    public static function revertCharacters(string $input): ?string
    {
        $output = mb_ereg_replace_callback( // находим каждое слово в строке и заменяем его на инвертированное
            "\w+",
            function ($matches) {
                $letters = mb_str_split($matches[0]); // разбиваем на буквы
                if (mb_strtoupper($letters[0]) === $letters[0]) {
                    $last_key = (count($letters) - 1);
                    $letters[$last_key] = mb_strtoupper($letters[$last_key]);
                    $letters[0] = mb_strtolower($letters[0]);
                }
                $output_word = implode('', array_reverse($letters)); // инвертируем порядок и склеиваем
                return $output_word;
            },
            $input
        );
        return $output ?: null;
    }
}
