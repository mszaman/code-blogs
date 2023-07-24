<div class="card card--wrapper dashboard-nav-section">
    <nav class="dashboard-nav">
        <ul class="nav-lists">
        <li class="nav-list">
            <a class="nav-link" href="{{ route('admin.dashboard') }}"
            >summary</a
            >
        </li>
        <!-- <li class="nav-list">
            <a
            class="nav-link"
            href="../../pages/dashboard/create-user.html"
            >create user</a
            >
        </li> -->
        <li class="nav-list">
            <a
            class="nav-link"
            href="{{ route('user.index') }}"
            >manage user</a
            >
        </li>
        <li class="nav-list">
            <a
            class="nav-link"
            href="../../pages/dashboard/create-role.html"
            >create role</a
            >
        </li>
        <li class="nav-list">
            <a class="nav-link" href="{{ route('tag.create') }}"
            >create tag</a
            >
        </li>
        <li class="nav-list">
            <a class="nav-link" href="{{ route('tag.index') }}"
            >tags</a
            >
        </li>
        <li class="nav-list">
            <a class="nav-link" href="../../pages/dashboard/index-post.html"
            >posts</a
            >
        </li>
        </ul>
    </nav>
</div>
