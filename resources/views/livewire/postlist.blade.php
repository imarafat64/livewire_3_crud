<div class="container my-3">
    <div class="row border-bottom ">
        <div class="col-xl-10">
            <h4 class="text-center fw-bold">Livewire 3 SPA Crud With Laravel 11</h4>
        </div>
        <div class="col-xl-2 " style="text-align: right">
            <a wire:navigate href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Add Post</a>
        </div>
    </div>
    <div class="my-2">

        {{-- Alert Content --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismisable">
                <button type="buton" class="btn-close" data-bs-dismiss="alert"></button>
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-success alert-dismisable">
                <button type="buton" class="btn-close" data-bs-dismiss="alert"></button>
                {{ session('error') }}
            </div>
        @endif
    </div>
    {{-- Post Listing --}}
    <div class="card card-shadow">
        <div class="table-responsive ">

            {{-- Search Post --}}
            <div class="col-xl-4 ms-auto my-3">
                <input type="text" wire:model.live.debounce.100ms="searchTerm" class="form-control"
                    placeholder="Search Post...">
            </div>

            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Featured Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a wire:navigate href="{{ route('posts.view', $post->id) }}"><img
                                        src=" {{ Storage::url($post->featured_image) }}" class="image-fluid"
                                        width="100px" /></a></td>
                            <td><a style="text-decoration:none" wire:navigate
                                    href=" {{ route('posts.view', $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td>{{ Str::words($post->content, 3, '...') }}</td>
                            <td>
                                <p>
                                    <small>
                                        <strong>
                                            Posted On:
                                        </strong>
                                        {{ $post->created_at->diffForHumans() }}

                                    </small>
                                </p>
                                <p>
                                    <small>
                                        <strong>
                                            Updated On:
                                        </strong>
                                        {{ $post->updated_at->diffForHumans() }}

                                    </small>
                                </p>

                            </td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" wire:navigate
                                    class="btn btn-success btn-sm">Edit</a>
                                <button wire:confirm="Are you ,You want to delete"
                                    wire:click="deletePost({{ $post->id }})" type="button"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {{ $posts->links() }}

        </div>
    </div>

</div>
