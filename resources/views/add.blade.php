@include( 'templates/header')

<div class="main-content login-panel">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/images/logo-black.png" alt="Logo">
            </div>
            <a href="/"><i class="fa-duotone fa-house-chimney"></i></a>
        </div>
        <div class="bottom">
            
            <h3 class="panel-title">Tambah Activity</h3>
            <form method="POST" action="{{ Route('add') }}">
                @csrf
                @error('activity_name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-25">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input 
                    type="text" 
                    class="form-control" 
                    placeholder="Activity"
                    name="activity_name"
                    value="{{ @old('activity_name') }}"
                    >
                </div>
                <button class="btn btn-primary w-100 login-btn" type="submit">Tambah Activity</button>
            </form>
        </div>
    </div>
</div>

@include( 'templates/footer')
