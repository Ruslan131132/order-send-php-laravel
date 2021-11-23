<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{



    public function create(Request $request) {
        $FIO = $request->input('FIO');
        $article = $request->input('article');
        $manufacturer = $request->input('brand');
        $customerComment = $request->input('comment');
        list ($lastName, $firstName, $patronymic) = mb_split('\s', $FIO);

        $productInfo = query('https://superposuda.retailcrm.ru/api/v5/store/products?apiKey='
            .'QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb'
            .'&'
            .'filter[name]='
            .$article
            .'&'
            .'filter[manufacturer]='
            .$manufacturer
        );

        $productID = $productInfo['products'] == 0 ? false : $productInfo['products'][0]['offers'][0]['id'];

        $task_data = array(
            'order' => json_encode(array(
                'lastName' => $lastName,
                'firstName' => $firstName,
                'patronymic' => $patronymic,
                'customerComment' => $customerComment,
                'items' => [
                    [
                        'offer' => [
                            'id' => $productID
                        ]
                    ]
                ],
                'status' => 'trouble',
                'orderType' => 'fizik',
                'site' => 'test',
                'orderMethod' => 'test',
                'number' => '13122001',
            ))
        );

        $result = query('https://superposuda.retailcrm.ru/api/v5/orders/create?apiKey=QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb', $task_data);
        if ($result != null) {
            return dd($result);
        } else {
            return 'Ошибка запроса';
        }
    }


}
