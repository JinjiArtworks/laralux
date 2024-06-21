@extends('layouts.index')
@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Daftar room </h4>
                            </div>
                            <div class="header-action">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target=".modal-room">Tambah room</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Images in Bootstrap are made responsive to the image so that it scales
                                with the parent element.</p>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No Reff</th>
                                            <th>Nama Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Akun room</th>
                                            <th class="text-right">Saldo</th>
                                            <th>Saldo Normal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($room as $item)
                                            <tr>
                                                <th>
                                                    <img src="{{ asset('img/' . $item->image) }}" width="50px"
                                                        alt="">
                                                </th>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->facilities->name }} </td>
                                                <td> {{ $item->room_type->name }} </td>
                                                <td> {{ $item->hotels->name }} </td>
                                                <td> @currency($item->price) </td>
                                                <td> {{ $item->status }} </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button class="btn btn-primary btn-sm mr-1" type="button"
                                                            data-toggle="tooltip" data-placement="top" title="Detail room">
                                                            <i class="fa-solid fa-book"></i>
                                                        </button>
                                                        <button class="btn btn-warning btn-sm mr-1" type="button"
                                                            data-toggle="modal" data-target=".modal-edit-room"
                                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                            data-image="{{ $item->image }}"
                                                            data-price="{{ $item->price }}"
                                                            data-rating="{{ $item->rating }}"
                                                            data-facilities="{{ $item->facilities_id }}"
                                                            data-rooms_type="{{ $item->room_type_id }}"
                                                            data-hotels="{{ $item->hotels_id }}"
                                                            data-status="{{ $item->status }}" data-placement="top"
                                                            title="Edit room">
                                                            <i class="fa-solid fa-pencil"></i>
                                                        </button>
                                                        {{-- <form method="GET" action="{{ route('room.delete', ['id' => $item->id]) }}">
                                                            <button type="submit"
                                                                class="confirmDelete btn btn-sm btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No Reff</th>
                                            <th>Nama Akun</th>
                                            <th>Tipe room</th>
                                            <th class="text-right">Saldo</th>
                                            <th>Saldo Normal</th>
                                            <th>Aksi</th>
                                            <th>Aksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-room" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah room</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Kamar</label>
                                <input class="form-control" id="name" name="name" type="text" required
                                    placeholder="Nama Kamar" aria-label="Name">
                            </div>
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <select class="form-control" name="facilities">
                                    <option value="">-- Pilih Fasilitas --</option>
                                    @foreach ($facilities as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tipe Room</label>
                                <select class="form-control" name="room_type" id="">
                                    <option value="">-- Pilih Tipe Room --</option>
                                    @foreach ($room_type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hotel</label>
                                <select class="form-control" name="hotels" id="">
                                    <option value="">-- Pilih Hotel --</option>
                                    @foreach ($hotel as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="">
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" id="price" name="price" required type="number"
                                    placeholder="Harga Kamar" aria-label="price">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('img/no-profile.png') }}" id="setImages" width="150px"
                                    height="150px">
                                <input class="form-control" accept="image/*" id="image" type="file"
                                    name="image" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm close-modal">Close</button>
                            <button type="button" class="btn btn-primary btn-sm confirm-add">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit room Modal -->
        <div class="modal fade modal-edit-room" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="editroomForm" method="POST" action="{{ route('room.update') }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="editRoomId" name="id">
                            <div class="form-group">
                                <label>Nama Kamar</label>
                                <input class="form-control" id="editRoomName" name="name" type="text" required
                                    placeholder="Nama Kamar" aria-label="Name">
                            </div>

                            <div class="form-group">
                                <label>Fasilitas</label>
                                <select class="form-control" id="editFacilities" name="facilities">
                                    <option value="">-- Pilih Fasilitas --</option>
                                    @foreach ($facilities as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tipe Room</label>
                                <select class="form-control" name="room_type" id="editRoomsType">
                                    <option value="">-- Pilih Tipe Room --</option>
                                    @foreach ($room_type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hotel</label>
                                <select class="form-control" name="hotels" id="editHotels">
                                    <option value="">-- Pilih Hotel --</option>
                                    @foreach ($hotel as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="editStatus">
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" id="editPrice" name="price" required type="number"
                                    placeholder="Harga Kamar" aria-label="price">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('img/no-profile.png') }}" id="setImagesEdit" width="150px"
                                    height="150px">
                                <input class="form-control" accept="image/*" id="image" type="file"
                                    name="image" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm close-modal-edit">Close</button>
                            <button type="button" class="btn btn-primary btn-sm confirm-update">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        image.onchange = evt => {
            const [file] = image.files
            if (file) {
                setImages.src = URL.createObjectURL(file)
            }
        }
        $(document).ready(function() {
            // Add click event listener to all buttons with the class "close-modal"
            $('.close-modal').click(function() {
                $('.modal-room').modal('hide')
            })
            $('.close-modal-edit').click(function() {
                $('.modal-edit-room').modal('hide')
            })
            // Modal edit
            $('.modal-edit-room').on('show.bs.modal', function(event) {
                console.log('asdasd');
                var target = $(event.relatedTarget)
                var id = target.data('id')
                var name = target.data('name')
                var image = target.data('image')
                var price = target.data('price')
                var rating = target.data('rating')
                var facilities = target.data('facilities')
                var hotels = target.data('hotels')
                var rooms_type = target.data('rooms_type')

                var modal = $(this)
                modal.find('#editRoomId').val(id)
                modal.find('#editRoomName').val(name)
                modal.find('#setImagesEdit').val(image)
                modal.find('#editPrice').val(price)
                modal.find('#editRating').val(rating)
                // modal.find('#editFacilities').val(facilities)
                modal.find('#editHotels').val(hotels)
                // modal.find('#editRoomsType').val(rooms_type)
                // modal.find('#editTiperoom').val(tipe_room)
                modal.find('#editHotels option[value="' + hotels + '"]').prop('selected', true);
                modal.find('#editRoomsType option[value="' + rooms_type + '"]').prop('selected', true);
                modal.find('#editFacilities option[value="' + facilities + '"]').prop('selected', true);
            })

            // Confirmation Button
            $('.confirmDelete').click(function(event) {
                console.log('asd');
                // event.preventDefault()
                // var form = $(this).closest("form")
                // Swal.fire({
                //     title: 'Hapus Data?',
                //     text: 'Data ini akan terhapus secara permanen',
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Yes'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         form.submit()
                //     }
                // })
            })

            $('.confirm-update').click(function(event) {
                event.preventDefault()
                var form = $(this).closest("form")
                Swal.fire({
                    title: 'Konfirmasi Data?',
                    text: 'Pastikan data yang anda masukkan sudah benar',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                })
            })
            $('.confirm-add').click(function(event) {
                event.preventDefault()
                var form = $(this).closest("form")
                Swal.fire({
                    title: 'Konfirmasi Data?',
                    text: 'Pastikan data yang anda masukkan benar',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                })
            })
        })
    </script>
@endsection
