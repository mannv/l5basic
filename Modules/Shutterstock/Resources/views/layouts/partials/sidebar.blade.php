<?php
$routeName = Route::currentRouteName();
$navigation = [
    [
        'icon' => 'user',
        'route' => 'topic.index',
        'name' => 'Topics'
    ]
];
?>
<ul class="sidebar-menu">
    <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
    @foreach($navigation as $item)
        <li @if($routeName == $item['route']) class="active" @endif><a href="{{ route($item['route']) }}"><i class='fa fa-{{$item['icon']}}'></i> <span>{{ $item['name'] }}</span></a></li>
    @endforeach
</ul><!-- /.sidebar-menu -->