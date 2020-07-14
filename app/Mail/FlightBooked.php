<?php

namespace App\Mail;

use App\Itinerary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FlightBooked extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Itinerary
     */
    public $itinerary;

    /**
     * The order instance.
     *
     * @var mixed
     */
    public $price;

    /**
     * The order instance.
     *
     * @var integer
     */
    public $passengers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Itinerary $itinerary, $price, $passengers)
    {
        $this->itinerary = $itinerary;
        $this->price = $price;
        $this->passengers =  $passengers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $introLines=['Boletos Comprados Correctamente!'];

        array_push($introLines, 'Desde '.$this->itinerary->origin.' hacia '.$this->itinerary->destination);
        array_push($introLines, 'Saliendo '.$this->itinerary->departure_date.' y Llegando '.$this->itinerary->arrival_date);
        array_push($introLines, 'Se compraron: '.count($this->itinerary->flights )* $this->passengers.' boletos para: '.$this->passengers.' pasajeros');
        array_push($introLines, 'Con un total de: $'.$this->price);

        return $this->markdown('vendor.notifications.email2')->with(['level'=> 'success', 'introLines'=>$introLines, 'outroLines'=>['Disfruta!']]);
    }
}
