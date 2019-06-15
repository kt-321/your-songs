@extends("layouts.app")

@section("content")
<h1 class="mb-4 text-center"><i class="fas fa-users-cog mr-1"></i>ユーザー管理画面</h1>

<div class="users-index mb-3">
    <h4 class="text-center">未削除</h4>
    <table border="1" class="m-auto">
        <tbody>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>Eメール</th>
                <th>年齢</th>
                <th>性別</th>
                <th>プロフィール</th>
                <th>削除</th>
            </tr>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }} </td>
                    <td> 
                        @if($user->gender == 1)
                        男性
                        @else
                        女性 
                        @endif
                    </td>
                    <td>
                         <a class="btn btn-success btn-sm" href="{{ route("users.show", ["id" => $user->id]) }}">プロフィール</a>
                    </td>
                    <td>
                        <a href="/delete/{{ $user->id}}">削除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
    
<div class="deleted-users-index">
    <h4 class="text-center">削除済</h4>
    <table border="1" class="m-auto">
        <tbody>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>Eメール</th>
                <th>年齢</th>
                <th>性別</th>
                <th>復旧</th>
                <th>完全削除</th>
            </tr>
            @forelse ($deleted as $delete)
                <tr>
                    <td>{{ $delete->id }}</td>
                    <td>{{ $delete->name }}</td>
                    <td>{{ $delete->email }}</td>
                    <td>{{ $delete->age }} </td>
                    <td> 
                        @if($user->gender == 1)
                        男性
                        @else
                        女性 
                        @endif
                    </td>
                    <td>
                        <a href="/restore/{{ $delete->id}}">復旧</a>
                    </td>
                    <td>
                        <a href="/force-delete/{{ $delete->id}}">完全削除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection