<!-- Modal -->
<div class="modal fade" id="edit-city-modal-{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-city-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-city-modal-title">Edit city</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('edit-city', $city->id)}}">

        {{method_field("PATCH")}}

        {{csrf_field()}}

        <div class="modal-body">

          <label for="name">City name</label>
          <input type="text" name="name" class="form-control" required style="margin-bottom:20px;" value="{{$city->name}}"/>

          <input type="hidden" name="supports_paypal" value="0" />

          <label class="custom-control custom-checkbox">
          @if($city->supports_paypal)
          <input type="checkbox" class="custom-control-input" value='1' name="supports_paypal" checked>
          @else
          <input type="checkbox" class="custom-control-input" value='1' name="supports_paypal">
          @endif
          
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Support for Paypal Payments</span>`
          </label>

          <input type="hidden" name="supports_cod" value="0" />

          <label class="custom-control custom-checkbox">

          @if($city->supports_cod)
          <input type="checkbox" class="custom-control-input" value='1' name="supports_cod" checked>
          @else
          <input type="checkbox" class="custom-control-input" value='1' name="supports_cod">
          @endif

          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Support for Cash on delivery</span>`
          </label>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>

    </div>
  </div>
</div>
