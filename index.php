<?php
$is_auth = rand(0, 1);

$user_name = 'Кирилл'; // укажите здесь ваше имя
$posts_array = [
    [
        'title' => 'Цитата',
        'type' => 'post-quote',
        'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'user' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Игра престолов',
        'type' => 'post-text',
        'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
        'user' => 'Владик',
        'avatar' => 'userpic.jpg'
    ],
    [
        'title' => 'Наконец, обработал фотки!',
        'type' => 'post-photo',
        'content' => 'rock-medium.jpg',
        'user' => 'Виктор',
        'avatar' => 'userpic-mark.jpg'
    ],
    [
        'title' => 'Моя мечта',
        'type' => 'post-photo',
        'content' => 'coast-medium.jpg',
        'user' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Лучшие курсы',
        'type' => 'post-link',
        'content' => 'www.htmlacademy.ru',
        'user' => 'Владик',
        'avatar' => 'userpic.jpg'
    ]
];

function cut_text($text, $len = 300)
{
    if (strlen($text) < $len) {
        echo '<p>' . $text . '</p>';
    } else {
        $words = explode(" ", $text);
        $new_text = [];
        $count = 0;
        for ($i = 0; $count < $len; $i++) {
            $count += (strlen($words[$i]));
            $new_text[] = $words[$i];
        };
        echo '<p>' . implode(" ", $new_text) . " ..." . '</p>
              <a class="post-text__more-link" href="#">Читать далее</a>';
    };
}

;

require_once('helpers.php');

$page_content = include_template('/main.php', ['posts' => $posts_array]);

$layout_content = include_template('/layout.php', ['content' => $page_content, 'title' => 'readme: популярное', 'user_name' => 'Кирилл', 'is_auth' => $is_auth]);

print($layout_content);

date_default_timezone_set('Europe/Moscow');

function check_time($some_date)
{
    $current_date = date_create("now");
    $publication_date = date_create($some_date);
    $diff = date_diff($current_date, $publication_date);

    switch ($diff) {
        case $diff->m > 0:
            print($diff->m . ' ' . get_noun_plural_form($diff->m, 'месяц', 'месяца', 'месяцев') . ' назад');
            break;
        case $diff->d >= 7 && $diff->d <= 35:
            $week = floor(($diff->d) / 7);
            print($week . ' ' . get_noun_plural_form($week, 'неделю', 'недели', 'недель') . ' назад');
            break;
        case $diff->d > 0:
            print($diff->d . ' ' . get_noun_plural_form($diff->m, 'день', 'дня', 'дней') . ' назад');
            break;
        case $diff->h > 0:
            print($diff->h . ' ' . get_noun_plural_form($diff->m, 'час', 'часа', 'часов') . ' назад');
            break;
        case $diff->i > 0:
            print($diff->i . ' ' . get_noun_plural_form($diff->m, 'минуту', 'минуты', 'минут') . ' назад');
            break;
    };

}

;


