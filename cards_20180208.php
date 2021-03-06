<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 06.02.2018
 * Time: 11:28
 */

function fib($n)
{
    $a = 0;
    $b = 1;

    $fibArr = [$a, $b];

    for ($i = 1; $i <= $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;

        $fibArr[] = $c;
    }

    return $fibArr;
}

function generateCards()
{
    $count = 13;

    //Статически заданные значение.
    $nameForCards = [0, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, '?', ['c', "\u{2615}"]];

    //Динамическая генерация
    /*$nameForCards = fib($count - 4);
    array_push($nameForCards, '?', ['c', "\u{2615}"]);*/

    $cardsString = '';

    for ($i = 0; $i < $count; $i++) {
        $dataValue = is_array($nameForCards[$i]) ? $nameForCards[$i][0] : $nameForCards[$i];
        $value = is_array($nameForCards[$i]) ? $nameForCards[$i][1] : $nameForCards[$i];

        $cardsString .= '<input type="checkbox" id="card-' . $i . '"/>';
        $cardsString .= '
            <label for="card-' . $i . '" data-value="' . $dataValue . '">
            <span>' . $value . '</span>
            </label>'
        ;
    }

    return $cardsString;
}

?>

<html>
    <head>
        <style>
            .wrapper {
                display: flex;
            }
            .cards {
                font-size: 10px;
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
            }
            .cards label {
                border: .1rem solid #333;
                border-radius: .4rem;
                box-sizing: border-box;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                width: 8rem;
                height: 12rem;
                font-size: 3rem;
                padding: 1rem;
                margin: .4rem;
            }
            .cards label::before {
                position: absolute;
                left: .4rem;
                top: .4rem;
                font-size: 1rem;
                content: attr(data-value);
            }
            .cards label::after {
                position: absolute;
                bottom: .4rem;
                right: .4rem;
                content: attr(data-value);
                font-size: 1rem;
                transform: rotate(180deg);
            }
            .cards label:hover {
                background: #f0f0f0;
            }
            .cards span {
                box-sizing: border-box;
                border: .1rem solid #999;
                border-radius: .4rem;
                display: inline-block;
                width: 4rem;
                line-height: 9rem;
                text-align: center;
            }
            .cards input[type=checkbox] {
                display: none;
            }
            .cards input[type=checkbox]:checked + label {
                background: #f0f0ff;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="cards">
                <?= generateCards(); ?>
            </div>
        </div>
    </body>
</html>