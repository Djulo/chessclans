
    @extends('layouts.app')
    @section('content')
    <head>
    <script src="https://kit.fontawesome.com/c3f33bd535.js"></script>
    </head>
    <div class="container">
            @csrf
            <div class="row my-2">
            <div class="col-lg-4 order-lg-1 text-center">
<!--                 <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
 -->                    
                    <img src="{{ asset('img/defaultimage.jpg    ') }}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                    
                   
                    <!--<h6 class="mt-2">Upload a different photo</h6>-->
<!--                     <label class="custom-file">
 --><!--                     <input type="file" id="profile_image" class="custom-file-input" name="profile_image">
 -->                    <!-- <span class="badge badge-secondary custom-file-control">Choose photo</span> -->
                </label>
                {{ csrf_field() }}
<!--                 <input type="submit" class="btn btn-primary" value="Save Changes">
 --><!--             </form>
 -->
        </div>
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                
                @if (Auth::guard('admin')->check())
                <li class="nav-item">
                    <a href="" data-target="#admin" data-toggle="tab" class="nav-link">Admin</a>
                </li>
                @endif

            </ul>
            
                
                <div class="tab-pane" id="admin">

                    Users:

                    <table class="table table-sm table-hover table-striped">
                        <tbody>
                            @foreach ($users as $user)

                           
                            <tr>
                                <td>

                                    <a href="profile/{{ $user->id }}"
                                        style="text-decoration:none; color:blue"><?php echo $user->name;?></a>
                                    __status:
                                    {{$user->status}}
                                    __rating:
                                    {{$user->CCpoints}}
                                    __e-mail:
                                    {{$user->email}}
                                    __country:
                                    {{$user->country}}
                                <td>
                            </tr>
                            
                            @endforeach

                        </tbody>
                    </table>

                    Reports:

                    <table class="table table-sm table-hover table-striped">
                        <tbody>
                            @foreach ($reports as $report)

                            <?php //dd($report->reported()) ?>
                            
                            <tr>
                                <td>
                                    user:
                                    <a href="profile/{{ $report->idReporter }}"
                                        style="text-decoration:none; color:blue">
                                        <?php 
                                        
                                        foreach($users as $user){
                                            if($user->id==$report->idReporter){
                                                echo $user->name;
                                                break;
                                            }
                                        }
                                        //echo $report->idReporter;
                                        
                                        ?>
                                    </a>
                                    @if($report->idReporter!=$report->idReported)
                                    reported user:
                                    <a href="profile/{{ $report->idReported }}"
                                        style="text-decoration:none; color:blue">
                                        <?php 
                                        foreach($users as $user){
                                            if($user->id==$report->idReported){
                                                echo $user->name;
                                                break;
                                            }
                                        }
                                        ?>
                                        
                                    </a>

                                    reason: <?php echo($report->message)?>
                                    @else
                                        reported bug:
                                        {{$report->message}}
                                    @endif
                                    
                                <td>
                            </tr>
                            
                            @endforeach

                        </tbody>
                    </table>

                </div>
                
            </div>

        </div>
    </div>
</div>

@endsection
