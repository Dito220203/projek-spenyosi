<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/logo smpyosi.jpeg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Sistem Kebiasaan Anak</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa-solid fa-landmark"></i>
                      <p>
                        KELAS VII
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="/VIIA" class="nav-link ">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII A</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index2.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII B</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII C</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII D</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII E</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII F</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII G</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII H</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VII I</p>
                          </a>
                        </li>
                      </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa-solid fa-landmark"></i>
                      <p>
                        KELAS VIII
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="./index.html" class="nav-link ">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII A</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index2.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII B</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII C</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII D</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII E</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII F</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII G</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII H</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa-solid fa-house-user nav-icon"></i>
                            <p>VIII I</p>
                          </a>
                        </li>
                      </ul>
                </li>

                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>


                {{-- <li class="nav-item "> --}}
                    {{-- <a href="#" class="nav-link  {{ $activeMenu == 'master' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">7</span>
                        </p>
                    </a> --}}
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/guru" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dataadmin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/siswa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mapel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tahun Ajar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ujian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kuis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Latihan</p>
                            </a>
                        </li>
                    </ul> --}}
                {{-- </li> --}}


                {{-- <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Management Kelas
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Modul Ajar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Management Soal
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Pengaturan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
