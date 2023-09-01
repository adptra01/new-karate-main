<x-layout>
    <x-slot name="title">Events</x-slot>
    @include('layouts.table')

    <div class="card">
        <div class="card-header">
            @include('event.add')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>thumbnail</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $no => $event)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td><img src="{{ $event->thumbnail }}" alt=""
                                        class="avatar avatar-sm rounded-circle">
                                </td>
                                <td>{{ $event->name }}</td>
                                <td><span
                                        class="badge bg-label-{{ $event->status == 0 ? 'danger' : 'success' }}">{{ $event->status == 0 ? 'Tutup' : 'Buka' }}</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-3 justify-content-center">
                                        <a class="btn btn-info btn-sm" href="{{ route('events.show', $event->id) }}"
                                            role="button">Detail</a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
