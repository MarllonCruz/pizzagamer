<header>
    <span>{{  auth()->user()->fullName() }}</span>
    <div class="profile">
        <img src="{{ url('storage/' . auth()->user()->photo) }}" alt="">
    </div>
</header>