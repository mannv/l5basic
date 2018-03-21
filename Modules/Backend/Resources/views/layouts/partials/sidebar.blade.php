<ul class="sidebar-menu">
    <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
    <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
    <li class="treeview">
        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
            <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
        </ul>
    </li>
</ul><!-- /.sidebar-menu -->