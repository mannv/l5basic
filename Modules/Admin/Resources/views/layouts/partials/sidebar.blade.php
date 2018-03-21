<ul class="sidebar-menu">
    <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
    <li class="active"><a href="{{ route('admin.index') }}"><i class='fa fa-user'></i> <span>{{ trans('admin::message.link_admin_management') }}</span></a></li>
    <li><a href="{{ route('admin.create') }}"><i class='fa fa-user-plus'></i> <span>{{ trans('admin::message.link_add_new_admin') }}</span></a></li>
</ul><!-- /.sidebar-menu -->