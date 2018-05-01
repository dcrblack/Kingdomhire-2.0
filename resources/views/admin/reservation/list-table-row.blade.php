@if(!empty($vehicle))
  @foreach($vehicle->reservations as $reservation)
    <tr>
      @if(!empty($vehicles))
        <td><a href="{{ route('vehicle.show', ['make' => $vehicle->make, 'model' => $vehicle->model, 'id' => $vehicle->id]) }}">{{ $vehicle->name() }}</a></td>
      @endif
      <td>{{ $reservation->start_date }}</td>
      <td>{{ $reservation->end_date }}</td>
      <td>
        {{ Form::open(['route' => ['reservation.cancel', $reservation->id], 'method' => 'delete']) }}
        {{ Form::submit('Cancel', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
      </td>
      <td>
        <a href="{{ route('reservation.editForm', ['make' => $vehicle->make, 'model' => $vehicle->model, 'vehicle_id' => $vehicle->id, 'reservation_id' => $reservation->id]) }}"
           class="btn btn-primary" role="button" aria-pressed="true">Re-schedule</a>
      </td>
    </tr>
  @endforeach
@elseif(!empty($reservations))
  @foreach($reservations as $reservation)
    <tr>
      <td><a href="{{ route('vehicle.show', ['make' => $reservation->vehicle->make, 'model' => $reservation->vehicle->model, 'id' => $reservation->vehicle->id]) }}">{{ $reservation->vehicle->name() }}</a></td>
      <td>{{ $reservation->start_date }}</td>
      <td>{{ $reservation->end_date }}</td>
      <td>
        {{ Form::open(['route' => ['reservation.cancel', $reservation->id], 'method' => 'delete']) }}
        {{ Form::submit('Cancel', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
      </td>
      <td>
        <a href="{{ route('reservation.editForm', ['make' => $reservation->vehicle->make, 'model' => $reservation->vehicle->model, 'vehicle_id' => $reservation->vehicle->id, 'reservation_id' => $reservation->id]) }}"
           class="btn btn-primary" role="button" aria-pressed="true">Re-schedule</a>
      </td>
    </tr>
  @endforeach
@endif

