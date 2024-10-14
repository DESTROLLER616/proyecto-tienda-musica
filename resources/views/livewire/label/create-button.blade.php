<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-12 d-flex justify-content-end">
            <button wire:click="openModal" class="btn btn-primary">Create label</button>
        </div>
    </div>

    <div>
        <!-- Modal -->
        <div class="modal fade @if($isOpen) show d-block @endif" tabindex="-1" role="dialog" @if($isOpen) style="display: block;" @endif aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create new Label</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="w-100 d-flex justify-content-center" wire:ignore>
                            <img id="image-preview" src="" alt="Image preview" style="overflow: auto;">
                        </div>

                        <form wire:submit.prevent="create" class="" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="formFileLg" class="form-label">Label image</label>
                                <input type="file" class="form-control d-none" id="formFileLg" wire:model="avatar" onchange="previewImage(event)">
                            </div>

                            <button type="button" class="w-100 btn btn-primary" onclick="document.getElementById('formFileLg').click();">Add</button>

                            <div>
                                <label for="formFileLg" class="form-label">Name label</label>
                                <input type="text" class="form-control" id="name" wire:model="name">
                            </div>

                            <div>
                                <label for="formFileLg" class="form-label">Description label</label>
                                <input type="text" class="form-control" id="description" wire:model="description">
                            </div>

                            <div class="w-100 d-flex justify-content-center">
                                <button class="w-75 mt-3 btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Backdrop del modal -->
        @if($isOpen)
            <div class="modal-backdrop fade show"></div>
        @endif
    </div>
</div>
