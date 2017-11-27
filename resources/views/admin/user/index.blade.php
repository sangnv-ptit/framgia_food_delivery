@extends("admin.layouts.master")
@section('title')

    {{ trans('admin_user.List User') }}

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{ trans('admin_user.List User') }} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{ trans('admin_user.create') }}</a>
                        </div>
                        <div class="col-sm-6">
                            <div id="datatable_filter" class="dataTables_filter">
                                <label><input type="search" class="form-control input-sm" placeholder="Search" aria-controls="datatable"></label>
                            </div>
                        </div>
                    </div>                    
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('admin_user.name') }}</th>
                                <th>{{ trans('admin_user.email') }}</th>
                                <th>{{ trans('admin_user.avatar') }}</th>
                                <th>{{ trans('admin_user.phone') }}</th>
                                <th>{{ trans('admin_user.address') }}</th>
                                <th>{{ trans('admin_user.role') }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @if ($users)
                            @foreach($users as $user)
                                <tbody>
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ ($user->avatar) }}" width="60" height="60"></td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->role  }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['admin.user.edit', $user['id']], 
                                                'method' => 'get', 
                                                'id' => 'form-edit'
                                            ]) !!}
                                            {!! Form::button('Edit', [
                                                'type'=>'submit',
                                                'class' => 'btn btn-warning fa fa-edit'
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['admin.user.destroy', $user['id']], 
                                                'method' => 'delete', 
                                                'id' => 'form-delete'
                                            ]) !!}
                                            {!! Form::button('Delete', [
                                                'type'=>'submit',
                                                'class' => 'btn btn-danger fa fa-trash'
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>                                
                                </tbody>
                            @endforeach
                        @endif        
                    </table>
                    {!! $users->render() !!}
                    @stack('scripts')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ Html::script('js/admin.js') }}
@endpush
