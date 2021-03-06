@extends('layouts.app')
@section('content')

<div class="container">
    @csrf
    <div class="row my-2">
        <div class="col-lg-4 order-lg-1 text-center">
            <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                @if ($user[0]->profile_image!=null)
                <img src="<?php


echo ($user[0]->profile_image) ?>"
                    style="width: 150px; height: 150px; background-repeat: no-repeat; object-fit: cover;">
                @else
                <img src="{{ asset('img/defaultimage.jpg    ') }}" class="mx-auto img-fluid img-circle d-block"
                    alt="avatar">
                @endif
                {{-- --}}
                <!--<h6 class="mt-2">Upload a different photo</h6>-->
                <label class="custom-file">
                    <input type="file" id="profile_image" class="custom-file-input" name="profile_image">
                    <span class="badge badge-secondary custom-file-control">Choose photo</span>
                </label>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="Save Changes">
            </form>

        </div>
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                @if($user[0]->id==auth()->user()->id)
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
                @endif
                @if($user[0]->id==auth()->user()->id)
                <li class="nav-item">
                    <a href="" data-target="#requests" data-toggle="tab" class="nav-link">Requests</a>
                </li>
                @endif


            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h4 class="mb-3">
                        <font id="Username" class="" href="#" role="button" data-toggle="" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            <span class="caret"> <?php echo ($user[0]->name) ?> </span>
                        </font>
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Country</h5>
                            <p>
                                @if ($user[0]->country!=null)
                                <?php echo ($user[0]->country) ?>
                                @else
                                Unknown
                                @endif
                            </p>
                            <h5>Bio</h5>
                            <p>
                                <?php echo ($user[0]->bio); ?>
                            </p>

                        </div>
                        <div class="col-md-6">
                            <h5>CCpoints:</h5>
                            <font size="4.5"><?php echo ($user[0]->CCpoints) ?></font>
                            <i class="fas fa-chess-board fa-lg" size="5x"></i>
                            <hr>
                            <span class="badge text-control" role="button"><i class="fas fa-user"></i> {{$numfriends}}
                                Friends</span>
                            <span class="badge text-control"><i class="fas fa-chess-rook"></i>
                                {{$user[0]->wins+$user[0]->loses}} Games</span>
                            <span class="badge text-control"><i class="fas fa-trophy"></i> {{$user[0]->wins}} Wins
                            </span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Games
                            </h5>

                            <table class="table table-sm table-hover table-striped">
                                <tbody>
                                    <?php
                                    $i=0;
                                ?>

                                    @foreach($games as $game)
                                    <tr>
                                        <td>

                                            <form action="{{ route('analyse.show') }}" method="POST" id='my_form'
                                                name='my_form' role="form" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <a href="profile/{{ $game->white }}"
                                                    style=" font-size: 1.1rem; text-decoration:none; color:black;"><?php echo $whiteUsers[$i]->name; ?><?php //use App\Game; echo Game::find(1)->white->name; ?></a>
                                                <span style="color: lightgrey; font-size: 1.1rem;">
                                                    <i class="fas fa-chess" color="Mediumslateblue"></i>
                                                </span>
                                                <span style="display:inline-block; width: 20px;"></span>
                                                <font style=" font-size: 1.1rem;"><a href="javascript:{}"
                                                        onclick="document.getElementById('my_form').submit(); return false;">
                                                        {{$game->winner}} </a></font>
                                                <input type="hidden" name="id" value='{{$game->id}}'>
                                                <span style="display:inline-block; width: 20px;"></span>
                                                <a href="profile/{{ $game->black }}"
                                                    style=" font-size: 1.1rem; text-decoration:none; color:black;"><?php echo $blackUsers[$i]->name; ?></a>
                                                <span style="color: black; font-size: 1.1rem;">
                                                    <i class="fas fa-chess"></i>
                                                </span>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php
                                    $i=$i+1;
                                    ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <span style="display:inline-block; width: 20px;"></span>
                        @if($user[0]->id!=auth()->user()->id&&!Auth::guard('admin')->check())
                        <form action="{{ route('profile.report') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            <input href='' type="submit" class="btn btn-danger" value="Report">
                            <input type='hidden' name='userid' value='{{$user[0]->id}}'>

                            {{ csrf_field() }}
                            <input type='hidden' name='userid' value='{{$user[0]->id}}'>


                        </form>

                        @endif
                        <span style="display:inline-block; width: 20px;"></span>


                        @if (Auth::guard('admin')->check())
                        <form action="{{ route('admin.delete.profile') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Delete account">
                            <input type='hidden' name='userid' value='{{$user[0]->id}}'>
                        </form>
                        <span style="display:inline-block; width: 20px;"></span>
                        <form action="{{ route('admin.mute.profile') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Mute account">
                            <input type='hidden' name='userid' value='{{$user[0]->id}}'>
                        </form>
                        @elseif(strval($are_friends)=='no'&&$user[0]->id!=auth()->user()->id)
                        <form action="{{ route('profile.add') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Add friend">
                            <input type='hidden' name='userid' value='{{$user[0]->id}}'>
                        </form>
                        @elseif($user[0]->id!=auth()->user()->id)

                        <form action="{{ route('profile.unfriend') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Unfriend">
                            <input type='hidden' name='userid' value='{{$user[0]->id}}'>
                        </form>

                        @endif

                    </div>
                    <!--/row-->
                </div>
                @if($user[0]->id==auth()->user()->id)

                <div class="tab-pane" id="edit">
                    <form action="{{ route('profile.update') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">User name</label>
                            <div class="col-lg-9">
                                <input class="form-control" readonly type="text" value="{{ Auth::user()->name }}"
                                    name='username'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" readonly type="email" value="{{ Auth::user()->email }}"
                                    name='email'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Country</label>
                            <div class="col-lg-9">
                                <select id="country" name="country" class="form-control">
                                    <option selected='selected' value="Choose">Choose</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                    </option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                                        Republic
                                        of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                        Islands
                                    </option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                    </option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                        People's
                                        Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic
                                        Republic
                                    </option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                                        Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of
                                    </option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
                                    </option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                        Grenadines
                                    </option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and
                                        The
                                        South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                    </option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor
                                        Outlying
                                        Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>

                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Bio</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" value="" rows="3" name='bio'></textarea>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">

                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>

                </div>
                @endif

                @if($user[0]->id==auth()->user()->id)
                <div class="tab-pane" id="requests">

                    {{ csrf_field() }}

                    <table class="table table-sm table-hover table-striped">
                        <tbody>
                            @foreach ($frequests as $user)

                            @if(auth()->user()->id!=$user->id)
                            <tr>
                                <td>

                                    <a href="profile/{{ $user->id }}"
                                        style="text-decoration:none; color:blue"><?php echo $user->name; ?></a>
                                    requested to be your friend
                                    <a href="profile/accept/{{$user->id}}" type="button" class="btn btn-success"
                                        value="Accept">Accept</a>
                                    <a href="profile/decline/{{$user->id}}" type="button" class="btn btn-danger"
                                        value="Decline">Decline</a>
                                <td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>


                </div>
                @endif

            </div>

        </div>
    </div>
</div>

@endsection
