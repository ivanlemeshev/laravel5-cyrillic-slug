<?php namespace IvanLemeshev\Laravel5CyrillicSlug;

class Slug
{
    /**
     * Generate a URL friendly "slug" from a given Cyrillic string.
     * Supports: Russian, Kazakh, Ukrainian.
     *
     * @param string $title
     * @param string $separator
     * @return string
     */
    public function make($title, $separator = '-')
    {
        $matrix = [
            'й' => 'i',    'ц' => 'c',  'у' => 'u',  'к' => 'k',    'е' => 'e',
            'н' => 'n',    'г' => 'g',  'ш' => 'sh', 'щ' => 'shch', 'з' => 'z',
            'х' => 'h',    'ъ' => '',   'ф' => 'f',  'ы' => 'y',    'в' => 'v',
            'а' => 'a',    'п' => 'p',  'р' => 'r',  'о' => 'o',    'л' => 'l',
            'д' => 'd',    'ж' => 'zh', 'э' => 'e',  'ё' => 'e',    'я' => 'ya',
            'ч' => 'ch',   'с' => 's',  'м' => 'm',  'и' => 'i',    'т' => 't',
            'ь' => '',     'б' => 'b',  'ю' => 'yu', 'ү' => 'u',    'қ' => 'k',
            'ғ' => 'g',    'ә' => 'e',  'ң' => 'n',  'ұ' => 'u',    'ө' => 'o',
            'Һ' => 'h',    'һ' => 'h',  'і' => 'i',  'ї' => 'ji',   'є' => 'je',
            'ґ' => 'g',    'Й' => 'I',  'Ц' => 'C',  'У' => 'U',    'Ұ' => 'U',
            'Ө' => 'O',    'К' => 'K',  'Е' => 'E',  'Н' => 'N',    'Г' => 'G',
            'Ш' => 'SH',   'Ә' => 'E',  'Ң '=> 'N',  'З' => 'Z',    'Х' => 'H',
            'Ъ' => '',     'Ф' => 'F',  'Ы' => 'Y',  'В' => 'V',    'А' => 'A',
            'П' => 'P',    'Р' => 'R',  'О' => 'O',  'Л' => 'L',    'Д' => 'D',
            'Ж' => 'ZH',   'Э' => 'E',  'Ё' => 'E',  'Я' => 'YA',   'Ч' => 'CH',
            'С' => 'S',    'М' => 'M',  'И' => 'I',  'Т' => 'T',    'Ь' => '',
            'Б' => 'B',    'Ю' => 'YU', 'Ү' => 'U',  'Қ' => 'K',    'Ғ' => 'G',
            'Щ' => 'SHCH', 'І' => 'I',  'Ї' => 'YI', 'Є' => 'YE',   'Ґ' => 'G',
        ];

        foreach ($matrix as $from => $to)  {
            $title = mb_eregi_replace($from, $to, $title);
        }

        $pattern = '![^'.preg_quote($separator).'\pL\pN\s]+!u';
        $title = preg_replace($pattern, '', mb_strtolower($title));

        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}
