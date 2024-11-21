@include( 'templates/header')

<div class="container mt-4">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/images/logo-black.png" alt="Logo">
            </div>
            <a href="/"><i class="fa-duotone fa-house-chimney"></i></a>
        </div>
        <div class="bottom">
            <h3 class="panel-title">Add Student</h3>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" method="{{ Route('list-siswa.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-person"></i></span>
                            <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Name"
                            name="name"
                            value="{{ @old('name') }}"
                            >
                        </div>
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-home"></i></span>
                            <select name="class" class="form-control" value="{{ @old('class') }}">
                                <option value="">Choose Class</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        @error('class')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-building"></i></span>
                            <select name="major" class="form-control" value="{{ @old('major') }}">
                                <option value="">Choose Major</option>
                                <option value="PPLG">PPLG</option>
                                <option value="TJKT">TJKT</option>
                                <option value="MPLB">MPLB</option>
                                <option value="TBSM">TBSM</option>
                                <option value="HOTEL">HOTEL</option>
                                <option value="TKRO">TKRO</option>
                                <option value="DKV">DKV</option>
                                <option value="TMP">TMP</option>
                            </select>
                        </div>
                        @error('major')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-person"></i></span>
                            <input 
                            type="date" 
                            class="form-control" 
                            name="birth_date"
                            value="{{ @old('birth_date') }}"
                            >
                        </div>
                        @error('birth_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-image"></i></span>
                            <input 
                            type="file" 
                            class="form-control"
                            name="profile_picture"
                            >
                        </div>
                        @error('profile_picture')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary w-100 login-btn mb-3" type="submit">Submit</button>
            </form>
        </div>
        <div class="table table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>class</th>
                        <th>Major</th>
                        <th>Profile Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->class }}</td>
                        <td>{{ $d->major }}</td>
                        <td>
                            <img width="100" class="img-thumnail" src="{{ $d->profile_picture }}">
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('list-siswa.show', $d->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <form>
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include( 'templates/footer')
