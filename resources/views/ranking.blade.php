@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ranking Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- @component('components.who')
                    @endcomponent --}}
                    <?php $i = 1; ?>
                    <table class="table table-hover table-striped text-center">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">CC points</th>
                        </thead>
                        <tbody>
                            <form id="analyse-from" action="{{ route('analyse.show') }}" method="POST">
                                @csrf
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $i }}</th><?php $i++ ?>
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <td><a href="/profile/{{ $user->id }}" style="font-weight: bold"><?= $user->name;?> </a></td>
                                    <td><span style="font-weight: bold"><?= $user->CCpoints; ?><span></td>
                                </tr>
                                @endforeach
                            </form>

                            <form id="analyse-from" action="{{ route('analyse.show') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
