{{Form::open(array('url'=>'vender','method'=>'post'))}}
<div class="modal-body">

    <h6 class="sub-title">{{__('Basic Info')}}</h6>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('name',__('Name'),array('class'=>'form-label')) }}
                {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('contact',__('Contact'),['class'=>'form-label'])}}
                {{Form::text('contact',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('email',__('Email'),['class'=>'form-label'])}}
                {{Form::text('email',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('tax_number',__('Tax Number'),['class'=>'form-label'])}}
                {{Form::text('tax_number',null,array('class'=>'form-control'))}}

            </div>
        </div>
        {{-- 2 input added  by ahixel rojas at 22/09/2022 19:00 to add pay_type and account_number--}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('account_number',__('Account Number'),['class'=>'form-label'])}}
                {{Form::text('account_number',null,array('class'=>'form-control'))}}

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('pay_type',__('Pay Type'),['class'=>'form-label'])}}
                {{ Form::select('pay_type', $pay_type,null, array('class' => 'form-control select','required'=>'required')) }}

            </div>
        </div>
        @if(!$customFields->isEmpty())
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="tab-pane fade show" id="tab-2" role="tabpanel">
                    @include('customFields.formBuilder')
                </div>
            </div>
        @endif
    </div>
    <h6 class="sub-title">{{__('Billing Address')}}</h6>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_name',__('Name'),array('class'=>'form-label')) }}
                {{--bugfix billing name not required by ahixel rojas at 22/09/2022 19:50--}}
                {{Form::text('billing_name',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_country',__('Country'),array('class'=>'form-label')) }}
                {{Form::text('billing_country',$country,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_state',__('State'),array('class'=>'form-label')) }}
                {{Form::text('billing_state',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_city',__('City'),array('class'=>'form-label')) }}
                {{Form::text('billing_city',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_phone',__('Phone'),array('class'=>'form-label')) }}
                {{Form::text('billing_phone',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_zip',__('Zip Code'),array('class'=>'form-label')) }}
                {{Form::text('billing_zip',null,array('class'=>'form-control','required'=>'required'))}}

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('billing_address',__('Address'),array('class'=>'form-label')) }}
                {{Form::textarea('billing_address',null,array('class'=>'form-control','rows'=>3,'required'=>'required'))}}
            </div>
        </div>
    </div>
    {{--code commented by ahixel rojas at 22/09/2022 19:00--}}
    {{--@if(App\Models\Utility::getValByName('shipping_display')=='on')--}}
        {{--<div class="col-md-12 text-end">--}}
            {{--<input type="button" id="billing_data" value="{{__('Shipping Same As Billing')}}" class="btn btn-primary">--}}
        {{--</div>--}}
        {{--<h6 class="sub-title">{{__('Shipping Address')}}</h6>--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('shipping_name',__('Name'),array('class'=>'form-label')) }}--}}
                    {{--{{Form::text('shipping_name',null,array('class'=>'form-control'))}}--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('shipping_country',__('Country'),array('class'=>'form-label')) }}--}}
                    {{--{{Form::text('shipping_country',null,array('class'=>'form-control'))}}--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('shipping_state',__('State'),array('class'=>'form-label')) }}--}}
                    {{--{{Form::text('shipping_state',null,array('class'=>'form-control'))}}--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('shipping_city',__('City'),array('class'=>'form-label')) }}--}}
                    {{--{{Form::text('shipping_city',null,array('class'=>'form-control'))}}--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-lg-4 col-md-4 col-sm-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('shipping_phone',__('Phone'),array('class'=>'form-label')) }}--}}
                    {{--{{Form::text('shipping_phone',null,array('class'=>'form-control'))}}--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-6">--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('shipping_zip',__('Zip Code'),array('class'=>'form-label')) }}--}}
                    {{--{{Form::text('shipping_zip',null,array('class'=>'form-control'))}}--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--{{Form::label('shipping_address',__('Address'),array('class'=>'form-label')) }}--}}
                    {{--{{Form::textarea('shipping_address',null,array('class'=>'form-control','rows'=>3))}}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
</div>
{{Form::close()}}
