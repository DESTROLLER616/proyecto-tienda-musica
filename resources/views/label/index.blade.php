@extends('adminlte::page')
@section('content')
<div class="container">

    <div class="row">
        <h2>List of Labels</h2>

        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    Your label has been deleted successfully
                </div>
            @endif

            <livewire:label.table lazy />

        </div>
    </div>
</div>
@endsection

@push('css')
    @vite(['resources/sass/label/index.scss'])
@endpush

@push('js')
<script>
    function closeModal () {
        var modal = document.getElementById('staticBackdrop');
        var modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();
    }

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            const previewImage = document.getElementById('image-preview');
            previewImage.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            var input = document.getElementById('formFileLg');
            if (input && input.files && input.files[0]) {
                previewImage({ target: input });
            }
        });
    });

    function obtainDataDeleteButton(event) {
        const button = event.target;

        const labelId = button.getAttribute('data-id');
        const labelName = button.getAttribute('data-name');

        console.log(labelId, labelName);

        const modalTitle = document.getElementById('delete-modal-title');
        const modalBody = document.getElementById('delete-modal-body');
        const modalInputId = document.getElementById('delete-modal-input-id');

        // $wire('setDeleteData', labelId, labelName);
        Livewire.on('setDeleteData', (labelId, labelName) => {
            console.log('setDeleteData');
            // modalTitle.textContent = `Delete ${labelName}`;
            // modalBody.textContent = `Are you sure you want to delete the label ${labelName}?`;
            // modalInputId.value = labelId;
        });

        modalTitle.textContent = `Delete ${labelName}`;
        modalBody.textContent = `Are you sure you want to delete the label ${labelName}?`;
        modalInputId.value = labelId;
    }
</script>
@endpush
