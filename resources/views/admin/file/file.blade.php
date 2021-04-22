@extends('admin.layout_admin')
@section('admin_content')
<iframe src="{{url('public/filemanager/dialog.php?type=0')}}" style="width:100%;height:600px;overflow-y:auto;border:none;"></iframe>
@stop