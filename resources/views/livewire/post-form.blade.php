<div class="container pt-5">
    <div class="row">
        <div class="col-8 m-auto">
            <form wire:submit="savePost">
                <div class="card shadow border-1">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-xl-10">
                                <h5 class="fw-bold">{{ $isView ? 'View' : ($post ? 'Edit ' : 'Create') }} Post</h5>
                            </div>
                            <div class="col-xl-2">
                                <a wire:navigate href="{{ route('posts') }}" class="btn btn-primary btn-sm">Back To
                                    Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Post Title --}}
                        <div class="form-group mb-2">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" wire:model="title" class="form-control" id="title"
                                {{ $isView ? 'disabled' : '' }} placeholder="Post Title">

                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Post Content --}}
                        <div class="form-group mb-2">
                            <label for="content">Post Content<span class="text-danger">*</span></label>
                            <textarea class="form-control" {{ $isView ? 'disabled' : '' }} wire:model="content" id="content" rows="3"
                                placeholder="Post Content"></textarea>

                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Featured Image --}}
                        @if (!$isView)
                            <div class="form-group mb-2">
                                <label for="featuredImage">Featured Image<span class="text-danger">*</span></label>
                                <input type="file" wire:model="featuredImage" class="form-control"
                                    id="featuredImage">

                                @error('featuredImage')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                {{-- Preview Image --}}
                                @if ($featuredImage)
                                    <img src="{{ $featuredImage->temporaryUrl() }}" class="image-fluid"
                                        width="200px" />
                                @endif
                            </div>
                        @endif


                    </div>
                    @if (!$isView)
                        <div class="card-footer">
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-success">{{ $post ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                    @endif

                </div>

            </form>
        </div>
    </div>
</div>
