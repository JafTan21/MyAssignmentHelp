@extends('layouts.admin')

@section('page-header')
Assignment Requests
@endsection

@section('content')

<div class="container">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row mt-2">
                        <div class="col">

                            <table class="table" id="myTable">
                                <thead class="">
                                    <tr class="">
                                        <th class="">#</th>
                                        <th class="">
                                            User
                                        </th>
                                        <th class="">
                                            Email
                                        </th>
                                        <th class="">
                                            Subject code
                                        </th>
                                        <th class="">
                                            Description
                                        </th>
                                        <th class="">
                                            Deadline
                                        </th>
                                        <th class="">
                                            Requested at
                                        </th>
                                        <th class="">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($assignmentRequests as $assignmentRequests)
                                    <tr class="">
                                        <td class="">{{ $assignmentRequests->id }}</td>
                                        <td class="">
                                            {!! $assignmentRequests->user->name ?? "<span
                                                class='text-warning'>unknown</span>" !!}
                                        </td>
                                        <td class="">{{ $assignmentRequests->email }}</td>
                                        <td class="">{{ $assignmentRequests->subject_code }}</td>
                                        <td class="">{{ $assignmentRequests->description }}</td>
                                        <td class="">{{ $assignmentRequests->deadline }}</td>
                                        <td class="">{{ $assignmentRequests->created_at }}</td>
                                        <td class="">
                                            actions will be added here
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection