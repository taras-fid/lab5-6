@extends('layout')

@section('title')
    home page
@endsection

@section('content')
    <h1>main page</h1>
    @if(isset($worker))
        <table>
            <tr>
                @if($table_num == 3)
                    @foreach($worker as $item)
                        @foreach($item->roles as $role)
                            <td> {{$role->login}} -> {{$item->name}} | </td>
                        @endforeach
                    @endforeach
                @else
                    @foreach($worker->roles as $role)
                        <td> {{$role->login}} -> {{$worker->name}} | </td>
                    @endforeach
                @endif
            </tr>
        </table>
    @endif
@endsection
