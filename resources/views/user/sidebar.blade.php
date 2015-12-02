            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/user/dashboard"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>
                    @if( Auth::user()->role==='admin' )
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="glyphicon glyphicon-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="user" class="collapse">
                                <li>
                                    <a href="/user/show/approved">Approved</a>
                                </li>
                                <li>
                                    <a href="/user/pending">Pending</a>
                                </li>
                                
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#playlist"><i class="glyphicon glyphicon-headphones"></i> Playlist <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="playlist" class="collapse">
                            <li class="active">
                                <a href="#">Create Playlist</a>
                            </li>
                            <li>
                                <a href="#">View Playlists</a>
                            </li>
                            <li>
                                <a href="#">Edit Playlist</a>
                            </li>
                            <li>
                                <a href="#">Delete Playlist</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#music"><i class="glyphicon glyphicon-music"></i> Music <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="music" class="collapse">
                            <li>
                                <a href="#">Upload Music</a>
                            </li>
                            <li>
                                <a href="#">Recommend Music</a>
                            </li>
                            <li>
                                <a href="#">Delete Music</a>
                            </li>
                        </ul>
                    </li>
            </div>
            <!-- /.navbar-collapse -->