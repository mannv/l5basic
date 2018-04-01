<?php
$routeName = Route::currentRouteName();
$navigation = [
    [
        'icon' => 'align-justify',
        'route' => 'topic.index',
        'name' => 'Chủ đề'
    ],
    [
        'icon' => 'image',
        'route' => 'review.index',
        'name' => 'Duyệt ảnh'
    ]
];
?>
<ul class="sidebar-menu">
    <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
    @foreach($navigation as $item)
        <li @if($routeName == $item['route']) class="active" @endif><a href="{{ route($item['route']) }}"><i class='fa fa-{{$item['icon']}}'></i> <span>{{ $item['name'] }}</span></a></li>
    @endforeach
</ul><!-- /.sidebar-menu -->