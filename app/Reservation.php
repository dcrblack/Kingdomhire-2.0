<?php

namespace App;

/**
 * App\Reservation
 *
 * @property-read \App\Vehicle $vehicle
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string $start_date
 * @property string $end_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $vehicle_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereName($value)
 */
class Reservation extends ConflictableModel
{
    protected $fillable = ['vehicle_id', 'is_active', 'start_date', 'end_date', 'name'];

    protected $conflict_message = 'conflicts with another reservation';

    /**
     * Get vehicle associated with this reservation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function __toString()
    {
        return "reservation";
    }
}
