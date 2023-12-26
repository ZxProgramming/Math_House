

<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? '' : 'here show' }}">
	<!--begin:Menu link-->
	<span class="menu-link">
		<span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
		<span class="menu-title">Dashboard</span>
		<span class="menu-arrow"></span>
	</span>
	<!--end:Menu link-->
	<!--begin:Menu sub-->
	<div class="menu-sub menu-sub-accordion">
		<!--begin:Menu item-->
		<div class="menu-item">
			<!--begin:Menu link-->
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('role_admins_list') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Profile</span>
			</a>
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('student') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">My Courses</span>
			</a>
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('teacher') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Exams</span>
			</a>
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('teacher') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Questions</span>
			</a>
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('teacher') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Diagnostic</span>
			</a>
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('teacher') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Live</span>
			</a>
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('teacher') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Wallet</span>
			</a>
			<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('teacher') }}">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Messages</span>
			</a>
			<!--end:Menu link-->
		</div>
		<!--end:Menu item-->
	</div>
	<!--end:Menu sub-->
</div>
