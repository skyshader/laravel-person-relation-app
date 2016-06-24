@foreach ($users as $user)
    <tr>
        <td class="table-text">
            <div>{{ $user->name }}</div>
        </td>

        <td class="text-right">
            <button data-user="{{ $user->id }}" class="btn btn-success btn-sm edit-user" data-toggle="modal" data-target="#user-modal">
                <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit
            </button>
        </td>
    </tr>
@endforeach