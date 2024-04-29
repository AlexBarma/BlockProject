<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Главное меню</li>
                <li class="nav-item">
                    <a href="{{ route('person.main') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        Личный кабинет
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('person.comment') }}" class="nav-link">
                        <i class="nav-icon far fa-comment"></i>
                        <p>
                            Комментарии
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('person.post') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Мои посты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('person.liked_post') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-hand-holding-heart"></i>
                        <p>
                            Понравивиеся посты
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
