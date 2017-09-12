<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = [
      'variation_id',
      'model_number',
      'description',
      'contact_full_name',
      'contact_email',
      'contact_phone_number',
      'contact_address',
      'quote_id',
      'country_id',
      'phone_id',
      'city_id',
      'payment_method',
      'contact_postal_code'
    ];

    public function fault()
    {
      return $this->belongsTo('\App\Fault');
    }

    public function trackings()
    {
      return $this->hasMany('\App\Tracking', 'repair_id');
    }

    public function variation()
    {
      return $this->belongsTo('\App\Variation', 'variation_id');
    }

    public function quote()
    {
      return $this->belongsTo('\App\Quote', 'quote_id');
    }

    public function country()
    {
      return $this->belongsTo("\App\Country", 'country_id');
    }

    public function readableTime($arrays)
    {

      foreach($arrays as $array)
      {

        $array->formatted_created_at = $array->created_at->diffForHumans();
        $array->formatted_updated_at =  $array->updated_at->diffForHumans();

      }

      return $arrays;

    }

    public static function getPendingRepairs($repairs_array)
    {

      return array_filter(iterator_to_array($repairs_array), function($repair)
      {
        return static::isRepairPending($repair);
      });

    }

    public static function getAwaitingRepairs($repairs_array)
    {

      return array_filter(iterator_to_array($repairs_array), function($repair)
      {
        return static::isRepairAwaiting($repair);
      });

    }

    public static function getAcceptedRepairs($repairs_array)
    {

      return array_filter(iterator_to_array($repairs_array), function($repair)
      {
        return static::isRepairAccepted($repair);
      });

    }

    public static function getCompletedRepairs($repairs_array)
    {

      return array_filter(iterator_to_array($repairs_array), function($repair)
      {
        return static::isRepairCompleted($repair);
      });

    }

    public static function getRejectedRepairs($repairs_array)
    {

      return array_filter(iterator_to_array($repairs_array), function($repair)
      {
        return static::isRepairRejected($repair);
      });

    }

    public static function isRepairPending($repair)
    {

      if( !$repair->is_accepted )
      {
        return true;
      }

    }

    public static function isRepairAwaiting($repair)
    {
      if( static::isRepairAccepted($repair) )
      {
        return Tracking::isRepairAwaiting($repair);
      }
    }

    public static function isRepairAccepted($repair)
    {

      if( $repair->is_accepted == 1 && !$repair->is_completed )
      {
        return true;
      }

    }

    public static function isRepairCompleted($repair)
    {

      if( $repair->is_completed )
      {
        return true;
      }

    }

    public static function isRepairRejected($repair)
    {

      if( $repair->is_accepted == 2 )
      {
        return true;
      }

    }

    public static function getRepairStatus($repair)
    {

      $status = false;

      if( static::isRepairPending($repair) )
      {
        $status = "Pending Approval";
      }

      if( static::isRepairAccepted($repair) )
      {
        $status = "In Progress";
      }

      if( static::isRepairRejected($repair) )
      {
        $status = "Rejected";
      }

      if( static::isRepairCompleted($repair) )
      {
        $status = "Completed";
      }

      return $status;

    }

    public function getTrackingStatus()
    {
      return Tracking::status( $this->trackings->last() );
    }

    public function checkIfExist($var)
    {
      if(isset($var))
      {
        return $var;
      } else {
        return "Not provided.";
      }
    }

    public function getModelNo()
    {
      return $this->checkIfExist($this->model_number);
    }

    public function getDescription()
    {
      return $this->checkIfExist($this->description);
    }

    public function getPaymentAmount()
    {
      return Quote::formatQuote($this->quote->country_code, $this->quote->price);
    }

    public function isPaid()
    {

      if($this->payment_method == "paypal")
      {
        if( isset($this->payment_id) )
        {
          return "Paid!";
        } else {
          return "Not yet paid.";
        }
      } else {
        return "Payment will be manually collected";
      }

    }

    public function isPaymentDue()
    {
      if($this->is_completed)
      {
        if($this->payment_method="paypal")
        {
          return true;
        }
      }
    }

    public static function generateBookingReference($repair)
    {
      //RC44001 (RC for repair center website, 44 for country and than 001 is job id ) so its easy to recoginise.
      //MR971001 (MR for mobilerepair.ae website, 971 for country and than 001 is job id )
      $reference = "";

      if($repair->country_id==1)
      {
        $reference = "RC4400" . $repair->id;
      }

      if($repair->country_id==2)
      {
        $reference = "MR97100" . $repair->id;
      }

      return $reference;

    }

    public static function processPhoneNumber($num)
    {
      $num = str_replace("-","", $num );
      $num = str_replace(" ","", $num );

      if( $num[0] == 0 )
      {
        $num = substr($num, 1);
      }

      return $num;
    }

    public function getIMEI()
    {
      if(isset($this->phone_imei))
      {
        return $this->phone_imei;
      } else {
        return "Not set";
      }
    }

    public function getComments()
    {
      if(isset($this->comments))
      {
        return $this->comments;
      } else {
        return "Not set";
      }
    }

    public function isDispatch()
    {
      return $this->trackings->where('status', '=', 8)->last();
    }

    public function isShipped()
    {
      if($this->isDispatch())
      {
        if($this->getTrackingNum()){
          return true;
        }
      }
    }

    public function getTrackingNum()
    {

      if( $this->isDispatch() )
      {

        if( isset($this->tracking_num) )
        {
          return $this->tracking_num;
        }

      } else {

        return false;

      }

    }

    public function getTrackingCarrier()
    {

      if( $this->isDispatch() )
      {
        if( isset($this->tracking_carrier) )
        {
          return $this->tracking_carrier;
        }
      } else {
        return false;
      }

    }

    public function getFault()
    {
      return strtoupper($this->fault->name);
    }

    public function getPostalCode()
    {
      return strtoupper($this->contact_postal_code);
    }
}
