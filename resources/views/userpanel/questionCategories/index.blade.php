@extends('layouts.master')

@section('content')
<div class="container my-5 ">
    <div class="card shadow">
        <div class="card-header">
            <div class="heading-2 p-0">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSchRC18LkNEmqtEoH-Pj-2yT-vC1hx06fnEQ&usqp=CAU"
                    alt="" class="" height="40">
                All categories
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-row">
                @for ($i = ord('a'); $i <= ord('z'); $i++) @if($questionCategories->filter(
                    fn ($questionCategory, $key) => str_starts_with(strtolower($questionCategory->name),chr($i))
                    )->count() > 0)

                    <div class="col-md-4">
                        <div class="heading">
                            {{ strtoupper(chr($i)) }}
                        </div>
                        <ul class="list-group mt-3">
                            @foreach ($questionCategories->filter(
                            fn ($questionCategory, $key) => str_starts_with(strtolower($questionCategory->name),
                            chr($i))
                            ) as $questionCategory)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <a href="{{ route('userpanel.questionCategory.all-questions', $questionCategory->slug) }}"
                                    class="">
                                    {{ $questionCategory->name }}
                                </a>
                                <span class="badge bg-primary rounded-pill">
                                    {{ $questionCategory->questions()->count() }}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    @endif
                    @endfor
            </div>
        </div>
    </div>
</div> @endsection