@extends('layouts.admin')

@section('page-header')
All users
@endsection

@section('content')

<div class="container">

    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead class="">
                            <tr class="">
                                <th class="">#</th>
                                <th class="">
                                    Name
                                </th>
                                <th class="">
                                    Email
                                </th>
                                <th class="">
                                    Joined at
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @forelse ($users as $user)
                            <tr class="">
                                <td class="">
                                    {{ $user->id }}
                                </td>
                                <td class="">
                                    {{ $user->name }}
                                </td>
                                <td class="">
                                    {{ $user->email }}
                                </td>
                                <td class="">
                                    {{ $user->created_at }}
                                </td>
                            </tr>
                            @empty
                            <tr colspan="3">
                                no users found
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection