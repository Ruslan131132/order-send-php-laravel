<!DOCTYPE html>
<html>
    <head>
        <title>Тестовое задание</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/css/order.css">
    </head>
    <body>
        <div class="col">
            <form id="new-deal" action="{{ route('create-order') }}" method="post">
                @csrf
                <p id="FIO">*&nbsp;ФИО</p>
                <input type="text" name="FIO" placeholder="ФИО.." id="FIO-input" />
                <p id="comment">*&nbsp;Комментарий клиента</p>
                <textarea type="text" name="comment" placeholder="Комментарий..." id="text-input" maxlength="200"></textarea>
                <p id="vendor">*&nbsp;Артикул товара</p>
                <input type="text" name="article" placeholder="00000000-0000" id="vendor-input" />
                <p id="brand">*&nbsp;Бренд товара</p>
                <input type="text" name="brand" placeholder="Бренд.." id="brand-input" />
                <button class="btn" type="submit">Создать заказ</button>
            </form>
        </div>
    </body>
</html>
