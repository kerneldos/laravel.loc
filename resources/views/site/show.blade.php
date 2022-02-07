@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Код</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Уровень1</th>
                    <th scope="col">Уровень2</th>
                    <th scope="col">Уровень3</th>
                    <th scope="col">Цена</th>
                    <th scope="col">ЦенаСП</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Поля свойств</th>
                    <th scope="col">Совместные покупки</th>
                    <th scope="col">Единица измерения</th>
                    <th scope="col">Картинка</th>
                    <th scope="col">Выводить на главной</th>
                    <th scope="col">Описание</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['code'] }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['level1'] }}</td>
                        <td>{{ $item['level2'] }}</td>
                        <td>{{ $item['level3'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['price_sp'] }}</td>
                        <td>{{ $item['count'] }}</td>
                        <td>{{ $item['properties'] }}</td>
                        <td>{{ $item['joint_purchases'] }}</td>
                        <td>{{ $item['unit'] }}</td>
                        <td>{{ $item['picture'] }}</td>
                        <td>{{ $item['show_on_home'] }}</td>
                        <td>{{ $item['description'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $items->links('pagination::bootstrap-4') }}
@endsection