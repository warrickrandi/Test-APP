@extends('layouts.app')

@section('content')
<div class="container">
    <section class="bg-secondary p-5">
        <form class="w-100" method="get" action="{{route('search-users')}}">

            <div class="row w-100 m-0 justify-content-center">

                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="search" class="form-control text-center" name="name" value="@isset($name) {{$name}} @endisset" placeholder="Search for User"}>
                    </div>
                    
                    <div class="form-group text-center mb-0">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </div>
                </div>

            </div>
        </form>
    </section>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Registered Users</div>

                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">User Type</th>
                                    <th scope="col">Verified</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->category->name}}</td>
                                            <td>{{ $user->verified == 1 ? 'Verified':'Not Verified'}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="7">--No data found--</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row m-0 justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection