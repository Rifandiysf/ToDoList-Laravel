@include( 'templates/header')

<div class="main-content login-panel">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/images/logo-black.png" alt="Logo">
            </div>
            <a href="{{ Route('add') }}"><i class="fa-duotone fa-plus"></i></a>
        </div>
        <div class="bottom">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h3 class="panel-title">ToDoList</h3>
            <ul class="bg-light px-2 rounded-3">
                @foreach($data as $d)
                    <li class="d-flex justify-content-between my-2">
                        <span>{{ $d->activity_name }}</span>
                        <div class="d-flex gap-2">
                            <a href="/todo-list-update/{{ $d->id }}" class="btn btn-warning">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ Route('delete', ['id' => $d->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@include( 'templates/footer')
