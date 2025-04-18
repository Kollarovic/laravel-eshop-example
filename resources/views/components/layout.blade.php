@props([
    'title' => $navigation->getCurrentItem()?->getLabel(),
    'body_class' => 'hold-transition sidebar-mini layout-fixed'
])
<x-base-layout :title="$title" :body_class="$body_class">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fw fa-user"></i>
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-header bg-primary">
                            <img src="" class="img-circle" alt="User Image"/>
                            <p>
                                {{ Auth::user()->name }}
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="{{ route('admin.profile.edit') }}" class="btn btn-default btn-flat">Profile</a>
                            <form method="POST" action="{{ route('admin.logout') }}" class="float-right">
                                @csrf
                                <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('admin.dashboard.index') }}" class="brand-link">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <x-menu :items="$navigation->getItems()" />
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <x-breadcrumb :items="$navigation->getPath()" />
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <x-flash-messages />
                    {{ $slot }}
                </div>
            </section>

        </div>

        <footer class="main-footer">
            Copyright {{ date('Y') }} © {{ config('app.name') }} -
            <a href="{{ route('shop.home.index') }}">Shop</a>
        </footer>

    </div>
</x-base-layout>
