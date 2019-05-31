

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row my-2">
                <div class="col-lg-8 order-lg-2">
                    <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h4 class="mb-3">
                            <font id="Username" class="" href="#" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre>
                                       <span class="caret"> <?php  echo($user[0]->name) ?> </span>
                            </font>
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                            <h5>Country</h5>
                                <p>
                                    @if ($user[0]->country!=null)
                                    <?php  echo($user[0]->country) ?>
                                    
                                    @else
                                    Unknown
                                    @endif
                                </p>
                                <h5>Bio</h5>
                                <p>
                                    Here goes bio...
                                </p>

                            </div>
                            <div class="col-md-6">
                                <h5>Ranking:</h5>
                                <font size="4.5">1500</font>
                                <i class="fas fa-chess-board fa-lg" size="5x"></i>
                                <hr>
                                <span class="badge text-control" role="button"><i class="fas fa-user"></i> 5 Friends</span>
                                <span class="badge text-control"><i class="fas fa-chess-rook"></i> 43 Games</span>
                                <span class="badge text-control"><i class="fas fa-trophy"></i> 55% Wins   </span>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Games</h5>
                                    
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a><strong>OG</strong> 1-0 <strong>Alek</strong></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <a><strong>Alek</strong> 1-0 <strong>OG</strong></a>                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <a><strong>Milos</strong> 0-1 <strong>OG</strong></a>                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <a><strong>OG</strong> 1-0 <strong>Agadmator</strong></a>                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <a><strong>OG</strong> 1-0 <strong>Alek</strong></a>                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if($user[0]->id==auth()->user()->id)
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            @endif
                            <span style="display:inline-block; width: 20px;"></span> 
                            @if($user[0]->id!=auth()->user()->id)
                            <button type="submit" class="btn btn-danger">Report user</button>   
                            @endif
                            <span style="display:inline-block; width: 20px;"></span> 
                            @if($user[0]->id!=auth()->user()->id)
                            <button type="submit" class="btn btn-primary">Add friend</button>
                            @endif
                        </div>
                        <!--/row-->
                    </div>

                    <div class="tab-pane" id="edit">

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">User name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="{{ Auth::user()->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Country</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="" placeholder="Country">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Bio</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" value="Bio goes here" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">

                                    <input type="button" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1 text-center">
                @if (auth()->user()->profile_image)
                <img src="{{ asset(auth()->user()->profile_image) }}" style="width: 150px; height: 150px; background-repeat: no-repeat; object-fit: cover;">
                @else
                <img src="{{ asset('img/defaultimage.jpg    ') }}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                @endif
                {{--  --}}
                <!--<h6 class="mt-2">Upload a different photo</h6>-->
                <label class="custom-file">
                <input type="file" id="profile_image" class="custom-file-input" name="profile_image">
                <span class="badge badge-secondary custom-file-control" >Choose photo</span>
                </label>
            </div>
        </form>
    </div>
</div>
@endsection
